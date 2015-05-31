<?php

/**
 * @author  oke.ugwu
 */
namespace Cme\Sdk;

abstract class CmeClient
{
  /**
   * @var CmeClientConfig $_config
   */
  private static $_config;

  /**
   * @var string $_accessToken
   */
  private static $_accessToken;

  /**
   * This is a static class, do not instantiate it
   *
   * @codeCoverageIgnore
   */
  private function __construct() { }

  /**
   * @param CmeClientConfig $config
   */
  public static function init(CmeClientConfig $config)
  {
    self::$_config = $config;
  }

  /**
   * @param string $endPoint
   * @param array  $data
   *
   * @return mixed
   * @throws \Exception
   */
  public static function makeRequest($endPoint, $data)
  {
    //we add to the data array this way so we override any other following
    //keys if they were set for whatever reason. The only place we should trust
    //to get this information from is the config object
    $data['client_key']    = self::$_config->key;
    $data['client_secret'] = self::$_config->secret;
    $data['access_token']  = self::_requestAccessToken();

    $response = \Requests::post(
      self::$_config->apiUrl . '/' . $endPoint,
      [],
      $data
    );
    $response = json_decode($response->body);
    if($response)
    {
      if($response->status == 'success')
      {
        return $response->result;
      }
      else
      {
        if(isset($response->error_code) && $response->error_code == 419)
        {
          self::$_accessToken = null;
          self::makeRequest($endPoint, $data);
        }
        else
        {
          throw new \Exception($response->error);
        }
      }
    }
    else
    {
      throw new \Exception("Invalid Response. API might have thrown a 500");
    }
  }

  private static function _requestAccessToken()
  {
    if(self::$_accessToken == null)
    {
      $data               = [
        'client_key'    => self::$_config->key,
        'client_secret' => self::$_config->secret
      ];
      $result             = self::makeRequest('oauth/access_token', $data);
      self::$_accessToken = $result->access_token;
    }

    return self::$_accessToken;
  }
}
