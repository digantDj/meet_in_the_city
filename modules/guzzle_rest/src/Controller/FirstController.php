<?php
/**
 * @file
 * Contains \Drupal\guzzle_rest\Controller\FirstController.
 */
 
namespace Drupal\guzzle_rest\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class FirstController extends ControllerBase {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello world'),
    );
  }
}