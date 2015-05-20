<?php
/**
 * @author  oke.ugwu
 */

namespace Cme\Sdk;

//use CmeKernel\Data\CampaignData;
//use CmeKernel\Data\ListImportQueueData;
//use CmeKernel\Data\ListData;
//use CmeKernel\Data\SubscriberData;

class CmeList
{

  public function exists($id)
  {
  }

  /**
   * @param $id
   *
   * @return bool| ListData
   */
  public function get($id)
  {
    return CmeClient::makeRequest('list/get', ['id' => $id]);
  }

  /**
   * @param bool $includeDeleted
   *
   * @return ListData[];
   */
  public function all($includeDeleted = false)
  {
  }

  /**
   * @return ListData;
   * @throws \Exception
   */
  public function any()
  {
  }

  /**
   * @param ListData $data
   *
   * @return bool|int $id
   */
  public function create(ListData $data)
  {
  }

  /**
   * @param ListData $data
   *
   * @return bool
   */
  public function update(ListData $data)
  {
  }

  /**
   * @param int $id
   *
   * @return bool
   */
  public function delete($id)
  {
  }

  /**
   * @param int $listId
   * @param int $offset
   * @param int $limit
   *
   * @return SubscriberData[]
   */
  public function getSubscribers($listId, $offset = 0, $limit = 1000)
  {
  }

  /**
   * @param $subscriberId
   * @param $listId
   *
   * @return bool|SubscriberData
   */
  public function getSubscriber($subscriberId, $listId)
  {
  }

  /**
   * @param SubscriberData $data
   * @param int            $listId
   *
   * @return bool
   */
  public function addSubscriber(SubscriberData $data, $listId)
  {
  }

  /**
   * @param int $subscriberId
   * @param int $listId
   *
   * @return mixed
   */
  public function deleteSubscriber($subscriberId, $listId)
  {
  }

  public function getColumns($listId)
  {
  }

  public function import(ListImportQueueData $data)
  {
  }


  /**
   * @param int $id - List ID
   *
   * @return CampaignData[]
   */
  public function campaigns($id)
  {
  }
}
