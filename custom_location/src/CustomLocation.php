<?php
namespace Drupal\custom_location;

use Symfony\Component\DependencyInjection\ContainerInterface;
//use Drupal\calendar\DateTime;


/**
* Class CustomService
*/
  class CustomLocation {
	  public function getUserLocation() {
		  $config = \Drupal::config('custom_location_configuration_form.settings');
		  $timezone = $config->get("custom_timezone");
		  $t=time();
		 $format = 'dS M Y H:i a';
		 $current_time =  \Drupal::service('date.formatter')
         ->format($t, $type, $format, $timezone, $langcode);
		// print_r($current_time);die();
		  return $current_time;
      }
  }