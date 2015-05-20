<?php

/**
 * @author  oke.ugwu
 */
namespace Cme\Sdk;

class CmeClient
{
  /**
   * @var CmeClientConfig $_config
   */
  private static $_config;

  /**
   * This is a static class, do not instantiate it
   *
   * @codeCoverageIgnore
   */
  private function __construct() { }

  public static function init(CmeClientConfig $config)
  {
    self::$_config = $config;
  }

  public static function Campaign()
  {
    return new CmeCampaign();
  }

  public static function EmailList()
  {
    return new CmeList();
  }

  public static function makeRequest($endPoint, $data)
  {
    //we add to the data array this way so we override any other following
    //keys if they were set for whatever reason. The only place we should trust
    //to get this information from is the config object
    $data['client_key']    = self::$_config->key;
    $data['client_secret'] = self::$_config->secret;
    $data['access_token']  = self::$_config->accessToken;

    $response = \Requests::post(
      CmeClient::config()->apiUrl . '/' . $endPoint,
      [],
      $data
    );

    return json_decode($response->body);
  }
}
