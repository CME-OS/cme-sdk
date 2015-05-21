<?php
/**
 * @author  oke.ugwu
 */

namespace Cme\Sdk;

use CmeData\CampaignData;
use CmeData\ListImportQueueData;
use CmeData\ListData;
use CmeData\SubscriberData;

class CmeList
{
  public static function exists($id)
  {
    return CmeClient::makeRequest('list/exists', ['id' => $id]);
  }

  /**
   * @param $id
   *
   * @return bool| ListData
   */
  public static function get($id)
  {
    $result = CmeClient::makeRequest('list/get', ['id' => $id]);
    return ListData::hydrate((array)$result->list);
  }

  /**
   * @param bool $includeDeleted
   *
   * @return ListData[];
   */
  public static function all($includeDeleted = false)
  {
    $result = CmeClient::makeRequest(
      'list/all',
      ['include_deleted' => $includeDeleted]
    );

    $return = [];
    foreach($result->lists as $list)
    {
      $return[] = ListData::hydrate((array)$list);
    }
    return $return;
  }

  /**
   * @param ListData $data
   *
   * @return bool|int $id
   */
  public static function create(ListData $data)
  {
    $result = CmeClient::makeRequest('list/create', $data->toArray());
    return $result->listId;
  }

  /**
   * @param ListData $data
   *
   * @return bool
   */
  public static function update(ListData $data)
  {
    return CmeClient::makeRequest('list/update', $data->toArray());
  }

  /**
   * @param int $id
   *
   * @return bool
   */
  public static function delete($id)
  {
    return CmeClient::makeRequest('list/delete', ['id' => $id]);
  }

  /**
   * @param int $listId
   * @param int $offset
   * @param int $limit
   *
   * @return SubscriberData[]
   */
  public static function getSubscribers($listId, $offset = 0, $limit = 1000)
  {
    $data   = ['id' => $listId, 'offset' => $offset, 'limit' => $limit];
    $result = CmeClient::makeRequest('list/get_subscribers', $data);
    $return = [];
    foreach($result->subscribers as $subscriber)
    {
      $return[] = SubscriberData::hydrate((array)$subscriber);
    }
    return $return;
  }

  /**
   * @param $subscriberId
   * @param $listId
   *
   * @return bool|SubscriberData
   */
  public static function getSubscriber($subscriberId, $listId)
  {
    $data   = ['subscriber_id' => $subscriberId, 'id' => $listId];
    $result = CmeClient::makeRequest('list/get_subscriber', $data);
    return SubscriberData::hydrate((array)$result->subscriber);
  }

  /**
   * @param SubscriberData $data
   * @param int            $listId
   *
   * @return bool
   */
  public static function addSubscriber(SubscriberData $data, $listId)
  {
    $data       = $data->toArray();
    $data['id'] = $listId;
    return CmeClient::makeRequest('list/add_subscriber', $data);
  }

  /**
   * @param int $subscriberId
   * @param int $listId
   *
   * @return mixed
   */
  public static function deleteSubscriber($subscriberId, $listId)
  {
    $data = ['subscriber_id' => $subscriberId, 'id' => $listId];
    return CmeClient::makeRequest('list/delete_subscriber', $data);
  }

  /**
   * @param ListImportQueueData $data
   */
  public static function import(ListImportQueueData $data)
  {
    //TODO NOT SUPPORTED BY API YET
  }


  /**
   * @param int $id - List ID
   *
   * @return CampaignData[]
   */
  public static function campaigns($id)
  {
    $result = CmeClient::makeRequest(
      'list/get_campaigns',
      ['id' => $id]
    );

    $return = [];
    foreach($result->campaigns as $campaign)
    {
      $return[] = CampaignData::hydrate((array)$campaign);
    }
    return $return;
  }
}
