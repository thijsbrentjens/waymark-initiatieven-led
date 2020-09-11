<?php

/*
Plugin Name: Waymark Digitale Overheid
Plugin URI: https://www.joesway.ca/waymark/demo/
Description: Kopie Waymark plugin met extra velden in ACF voor locaties
Version: 1.0.1
Author: Paul van Buuren / Thijs Brentjens
Author URI: https://www.josephhawes.co.uk/
License: GPL2

Text Domain:         waymark
Domain Path:         /languages

*/

if ( ! defined( 'CPT_INITIATIEF' ) ) {
	define( 'CPT_INITIATIEF', 'initiatief' );
}

add_action( 'plugins_loaded', 'waymark_load_plugin_textdomain' );


//Base
require_once( 'inc/Waymark_Config.php' );
require_once( 'inc/Waymark_Types.php' );
require_once( 'inc/Waymark_Taxonomies.php' );
require_once( 'inc/Waymark_Install.php' );

//Objects
require_once( 'inc/Objects/Waymark_Map.php' );
require_once( 'inc/Objects/Waymark_Collection.php' );

//Helpers
require_once( 'inc/Helpers/Waymark_Helper.php' );
require_once( 'inc/Helpers/Waymark_Input.php' );

//Front
require_once( 'inc/Waymark_Front.php' );

//Admin
require_once( 'inc/Waymark_Admin.php' );


//========================================================================================================

/**
 * Initialise translations
 */


function waymark_load_plugin_textdomain() {

	load_plugin_textdomain( "waymark", false, basename( dirname( __FILE__ ) ) . '/languages/' );

}

//========================================================================================================

// Google Maps API key

function my_acf_init() {
	acf_update_setting( 'google_api_key', '' );
}

add_action( 'acf/init', 'my_acf_init' );

//========================================================================================================

// Add the ACF (advanced custom fields) 
/*
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f589cb3955cc',
	'title' => 'Velden voor initiatief',
	'fields' => array(
		array(
			'key' => 'field_5f589cc1c069d',
			'label' => 'Locatie',
			'name' => 'locatie',
			'type' => 'google_map',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => CPT_INITIATIEF,
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
*/
//========================================================================================================
