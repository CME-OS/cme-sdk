<?php
/**
 * @author  oke.ugwu
 */

namespace Cme\Sdk;

use CmeKernel\Data\BrandData;
use CmeKernel\Data\CampaignData;

class CmeBrand
{

  public function exists($id)
  {

  }

  /**
   * @param $id
   *
   * @return bool| BrandData
   */
  public function get($id)
  {

  }

  /**
   * @param bool $includeDeleted
   *
   * @return BrandData[];
   */
  public function all($includeDeleted = false)
  {

  }

  public function getColumns()
  {

  }

  /**
   * @param BrandData $data
   *
   * @return bool|int $id
   */
  public function create(BrandData $data)
  {

  }

  /**
   * @param BrandData $data
   *
   * @return bool
   */
  public function update(BrandData $data)
  {

  }

  /**
   * @param int $id
   *
   * @return bool
   */
  public function delete($id)
  {

    return true;
  }


  /**
   * @param int $id - Brand ID
   *
   * @return CmeCampaign[]
   */
  public function campaigns($id)
  {

  }
}
