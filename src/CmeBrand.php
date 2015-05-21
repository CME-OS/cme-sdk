<?php
/**
 * @author  oke.ugwu
 */

namespace Cme\Sdk;

use CmeData\BrandData;

class CmeBrand
{
  /**
   * @param int $id
   *
   * @return mixed
   * @throws \Exception
   */
  public static function exists($id)
  {
    return CmeClient::makeRequest('brand/exists', ['id' => $id]);
  }

  /**
   * @param int $id
   *
   * @return bool| BrandData
   */
  public static function get($id)
  {
    $result = CmeClient::makeRequest('brand/get', ['id' => $id]);
    return BrandData::hydrate((array)$result->brand);
  }

  /**
   * @param bool $includeDeleted
   *
   * @return BrandData[];
   */
  public static function all($includeDeleted = false)
  {
    $result = CmeClient::makeRequest(
      'brand/all',
      ['include_deleted' => $includeDeleted]
    );

    $return = [];
    foreach($result->brands as $brand)
    {
      $return[] = BrandData::hydrate((array)$brand);
    }
    return $return;
  }

  /**
   * @param BrandData $data
   *
   * @return bool|int $id
   */
  public static function create(BrandData $data)
  {
    $result = CmeClient::makeRequest('brand/create', $data->toArray());
    return $result->brandId;
  }

  /**
   * @param BrandData $data
   *
   * @return bool
   */
  public static function update(BrandData $data)
  {
    return CmeClient::makeRequest('brand/update', $data->toArray());
  }

  /**
   * @param int $id
   *
   * @return bool
   */
  public static function delete($id)
  {
    return CmeClient::makeRequest('brand/delete', ['id' => $id]);
  }


  /**
   * @param int $id - Brand ID
   *
   * @return CmeCampaign[]
   */
  public static function campaigns($id)
  {
    $result = CmeClient::makeRequest(
      'brand/get_campaigns',
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
