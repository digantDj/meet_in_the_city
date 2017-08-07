<?php

namespace Drupal\meetupdrupal8\Plugin\Block;
use Drupal\meetupdrupal8\Http\GuzzleDrupalHttp;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a cities block from Meetup API.
 *
 * @Block(
 *   id = "cities_block",
 *   admin_label = @Translation("Cities Block"),
 *   category = @Translation("MeetupAPI"),
 * )
 */
class CitiesBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $check = new GuzzleDrupalHttp();
    // Function call to retrieve cities
    $response = $check->performRequest("https://api.meetup.com/2/cities");
    
    return array(
     // '#markup' => $this->t('Hello, World!'),
      '#markup' => $response,
    );
  }

}