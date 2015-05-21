<?php

/**
 * Created by PhpStorm.
 * User: Okechukwu
 * Date: 5/18/2015
 * Time: 7:58 PM
 */
namespace Cme\Sdk;

use CmeData\CampaignData;

class CmeCampaign
{

  /**
   * @param $id
   *
   * @return mixed
   * @throws \Exception
   */
  public static function exists($id)
  {
    return CmeClient::makeRequest('campaign/exists', ['id' => $id]);
  }

  /**
   * @param $id
   *
   * @return CampaignData | bool
   */
  public static function get($id)
  {
    $result = CmeClient::makeRequest('campaign/get', ['id' => $id]);
    return CampaignData::hydrate((array)$result->campaign);
  }

  /**
   * @param bool $includeDeleted
   *
   * @return CampaignData[];
   */
  public static function all($includeDeleted = false)
  {
    $result = CmeClient::makeRequest(
      'campaign/all',
      ['include_deleted' => $includeDeleted]
    );

    $return = [];
    foreach($result->campaigns as $campaign)
    {
      $return[] = CampaignData::hydrate((array)$campaign);
    }
    return $return;
  }

  /**
   * Returns the number of recipients for a given campaign and list combination
   *
   * @param $id
   * @param $listId
   *
   * @return mixed
   */
  public static function getRecipientCount($id, $listId)
  {
    return CmeClient::makeRequest(
      'campaign/recipient_count',
      ['id' => $id, 'list_id' => $listId]
    );
  }

  /**
   * @param CampaignData $data
   *
   * @return bool
   */
  public static function create(CampaignData $data)
  {
    $result = CmeClient::makeRequest('campaign/create', $data->toArray());
    return $result->campaignId;
  }

  /**
   * @param CampaignData $data
   *
   * @return bool
   */
  public static function update(CampaignData $data)
  {
    return CmeClient::makeRequest('campaign/update', $data->toArray());
  }

  /**
   * Duplicates or copies a campaign to ease campaign creation.
   *
   * @param $id
   *
   * @return mixed
   * @throws \Exception
   */
  public static function copy($id)
  {
    return CmeClient::makeRequest('campaign/copy', $id);
  }

  /**
   * @param $id
   *
   * @return bool
   */
  public static function delete($id)
  {
    return CmeClient::makeRequest('campaign/delete', ['id' => $id]);
  }

  /**
   * @param int $id Campaign ID
   *
   * @return bool
   */
  public static function queue($id)
  {
    return CmeClient::makeRequest('campaign/queue', ['id' => $id]);
  }

  /**
   * @param int $id Campaign ID
   *
   * @return bool
   */
  public static function pause($id)
  {
    return CmeClient::makeRequest('campaign/pause', ['id' => $id]);
  }

  /**
   * @param int $id Campaign ID
   *
   * @return bool
   */
  public static function resume($id)
  {
    return CmeClient::makeRequest('campaign/resume', ['id' => $id]);
  }

  /**
   * @param int $id - Campaign ID
   *
   * @return bool
   */
  public static function abort($id)
  {
    return CmeClient::makeRequest('campaign/abort', ['id' => $id]);
  }
}
