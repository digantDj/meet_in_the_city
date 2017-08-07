<?php

namespace Drupal\guzzle_rest\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/** 
 * Get a response code from any URL using Guzzle in Drupal 8!
 * 
 * Usage: 
 * In the head of your document:
 * 
 * use Drupal\guzzle_rest\Http\GuzzleDrupalHttp;
 * 
 * In the area you want to return the result, using any URL for $url:
 *
 * $check = new GuzzleDrupalHttp();
 * $response = $check->performRequest($requestUrl, $requestMethod, $requestHeaders, $requestPayloadData);
 *  
 **/

class GuzzleDrupalHttp {
  use StringTranslationTrait;
  
  public function performRequest($requestUrl, $requestMethod = 'GET', $requestHeaders = '', $requestPayloadData = '') {
    $client = new \GuzzleHttp\Client();
    try {
      switch($requestMethod){
        case 'GET':
          $res = $client->get($requestUrl, ['http_errors' => false,
          'headers' => [
            'Accept'     => 'application/json',
            'X-Foo'      => ['Bar', 'Baz']
            ]
          ]);
          break;
        case 'POST':
          $res = $client->post($requestUrl, [
              'http_errors' => false,
              'headers' => [
                'Accept'     => 'application/json',
                'X-Foo'      => ['Bar', 'Baz']
              ],
              'body' => [
                  'field' => 'abc',
                  'other_field' => '123',
                  'file_name' => fopen('/path/to/file', 'r')
              ]
          ]);
          break;
        default:
          throw new Exception('Invalid Request Method');
      }
      return($res);
    } catch (RequestException $e) {
      return($this->t('Error'));
    }
  }
}