<?php

/**
 * Created by PhpStorm.
 * User: Okechukwu
 * Date: 5/18/2015
 * Time: 7:58 PM
 */
namespace Cme\Sdk;

use CmeKernel\Data\CampaignData;

class CmeCampaign
{

  public function exists($id)
  {
  }

  /**
   * @param $id
   *
   * @return CampaignData | bool
   */
  public function get($id)
  {

  }

  /**
   * @param bool $includeDeleted
   *
   * @return CampaignData[];
   */
  public function all($includeDeleted = false)
  {
  }

  /**
   * Returns the number of recipients for a given campaign and list combination
   *
   * @param $id
   * @param $listId
   *
   * @return mixed
   */
  public function getRecipientCount($id, $listId)
  {
  }

  /**
   * @param CampaignData $data
   *
   * @return bool
   */
  public function create(CampaignData $data)
  {
  }

  /**
   * @param CampaignData $data
   *
   * @return bool
   */
  public function update(CampaignData $data)
  {
  }

  /**
   * Duplicate or copies a campaign to ease campaign creation.
   *
   * @param $id
   */
  public function copy($id)
  {
  }

  /**
   * @param $id
   *
   * @return bool
   */
  public function delete($id)
  {
  }

  /**
   * @param int $id Campaign ID
   *
   * @return bool
   */
  public function queue($id)
  {
  }

  /**
   * @param int $id Campaign ID
   *
   * @return bool
   */
  public function pause($id)
  {
  }

  /**
   * @param int $id Campaign ID
   *
   * @return bool
   */
  public function resume($id)
  {
  }

  /**
   * @param int $id - Campaign ID
   *
   * @return bool
   */
  public function abort($id)
  {
  }
}
