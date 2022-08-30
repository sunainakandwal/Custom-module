<?php
namespace Drupal\custom_location\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Configure example settings for this site.
 */
class LocationForm extends ConfigFormBase  {

  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_location_configuration_form';
  }
  
   /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      custom_location_configuration_form.settings
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state,$id = 0)  {
	  
     $config = $this->config('custom_location_configuration_form.settings');
     $form['country'] = array(
            '#type' => 'textfield',
            '#title' => 'Country',
          '#default_value' =>  $config->get("custom_country"),
           
        );
     
     $form['city'] = array(
            '#type' => 'textfield',
            '#title' => 'City',
            '#default_value' =>  $config->get("custom_city"),
        );
     $options = ['select' => 'select', 'America/Chicago' => 'America/Chicago', 'America/New_York' => 'America/New_York', 'Asia/Tokyo'=>'Asia/Tokyo', 'Asia/Dubai' => 'Asia/Dubai', 'Asia/Kolkata' => 'Asia/Kolkata', 'Europe/Amsterdam' => 'Europe/Amsterdam', 'Europe/Oslo' => 'Europe/Oslo', 'Europe/London' => 'Europe/London'];
     $form['timezone'] = array(
            '#type' => 'select',
            '#title' => 'Timezone',
			'#options' => $options,
            '#default_value' => $config->get("custom_timezone"),
        );
		
    return parent::buildForm($form, $form_state);
    
}




  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
	 // print_r($form['timezone']);die();
    
    $country = $form_state->getValue('country');
	$city = $form_state->getValue('city');
	$timezone = $form_state->getValue('timezone');
    $config = \Drupal::configFactory()->getEditable('custom_location_configuration_form.settings');
    $config->set("custom_country", $country)->save();
	$config->set("custom_city", $city)->save();
	$config->set("custom_timezone", $timezone)->save();
  }
  
  /*
 * Validate Form
 */
  public function validateForm(array &$form, FormStateInterface $form_state) {
	
    
}


}


