<?php
	
/*
Plugin Name: Waymark Digitale Overheid
Plugin URI: https://www.joesway.ca/waymark/demo/
Description: Mapping with WordPress made easy. With Waymark enabled, click on the "Maps" link in the sidebar to create and edit Maps. Once you are happy with your Map, copy the Waymark shortcode and add it to your content.
Version: 1.0.1
Author: Paul van Buuren / Thijs Brentjens
Author URI: https://www.josephhawes.co.uk/
License: GPL2

Text Domain:         waymark
Domain Path:         /languages

*/

add_action( 'plugins_loaded', 'waymark_load_plugin_textdomain' );


//Base
require_once('inc/Waymark_Config.php');
require_once('inc/Waymark_Types.php');
require_once('inc/Waymark_Taxonomies.php');
require_once('inc/Waymark_Install.php');

//Objects
require_once('inc/Objects/Waymark_Map.php');
require_once('inc/Objects/Waymark_Collection.php');

//Helpers
require_once('inc/Helpers/Waymark_Helper.php');
require_once('inc/Helpers/Waymark_Input.php');

//Front
require_once('inc/Waymark_Front.php');

//Admin
require_once('inc/Waymark_Admin.php');

//========================================================================================================

/**
 * Initialise translations
 */



 
function waymark_load_plugin_textdomain() {
	
	load_plugin_textdomain( "waymark", false, basename( dirname( __FILE__ ) ) . '/languages/' );

}

//========================================================================================================

// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyB5vVMUunag3KLrIcsMK9dWhVhHVzj_Ub0');
}

add_action('acf/init', 'my_acf_init');


//========================================================================================================

