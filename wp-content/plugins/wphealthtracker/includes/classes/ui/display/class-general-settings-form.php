<?php
/**
 * WPHEALTHTRACKER Create Pop-Up Form Class
 *
 * @author   Jake Evans
 * @category Display
 * @package  Includes/Classes/UI/Display
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPHEALTHTRACKER_Create_General_Settings_Form', false ) ) :
	/**
	 * WPHEALTHTRACKER_Create_General_Settings_Form.
	 */
	class WPHEALTHTRACKER_Create_General_Settings_Form {


		public function __construct() {

			$this->output_create_general_settings_form();

		}


		private function output_create_general_settings_form() {

			$string1 = '<div id="wphealthtracker-create-popup-container">
					
					</div>';

			$this->initial_output = $string1;

		}




	}

endif;
