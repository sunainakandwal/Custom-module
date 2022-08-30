<?php

namespace Drupal\custom_location\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Location block' Block.
 *
 * @Block(
 *   id = "location_block",
 *   admin_label = @Translation("Location block"),
 *   category = @Translation("Location block"),
 * )
 */
class LocationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
	
	$config = \Drupal::config('custom_location_configuration_form.settings');
	$country = $config->get("custom_country");
    $city = $config->get("custom_city");
	$service =  \Drupal::service('custom_location.find_location');
    $time = $service->getUserLocation();
    return [
      '#theme' => 'location_display',
	  '#country' => $country,
	  '#city' => $city,
	  '#time' => $time,
	  '#cache' => array(
        'max-age' => 0,
      ),
    ];
  }

}