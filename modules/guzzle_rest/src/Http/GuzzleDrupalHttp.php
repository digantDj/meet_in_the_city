<?php

namespace Drupal\meetupdrupal8\Http;

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
 * use Drupal\guzzle_rest\Http\MeetupGuzzleHttp;
 * 
 * In the area you want to return the result, using any URL for $url:
 *
 * $check = new GuzzleDrupalHttp();
 * $response = $check->performRequest($url);
 *  
 **/

class GuzzleDrupalHttp {
  use StringTranslationTrait;
  
  public function performRequest($siteUrl) {
    $client = new \GuzzleHttp\Client();
    try {
      $res = $client->get($siteUrl, ['http_errors' => false]);
      return($res->getBody());
    } catch (RequestException $e) {
      return($this->t('Error'));
    }

  }
}