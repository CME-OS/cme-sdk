<?php
/**
 * @author  oke.ugwu
 */

include_once 'vendor/autoload.php';

use Cme\Sdk\CmeClient;
use Cme\Sdk\CmeClientConfig;

$config = new CmeClientConfig();
$config->apiUrl = 'http://localhost:8080';
$config->key = "296e728a496a71887f53788c040be409";
$config->secret = "a0054e93ef2618be51ce51ffec79558e";

CmeClient::init($config);

var_dump(CmeClient::EmailList()->get(1));
