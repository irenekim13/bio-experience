<?php

/*
Plugin Name: ACF: Material Design Icons
Plugin URI: 
Description: An font icon selector field that lets you preview a font icon.
Version: 1.0.0
Author: Oleh Koval

*/




// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf-icon_font', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );




// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_icon_font( $version ) {

	include_once('acf-icon_font-v5.php');

}

add_action('acf/include_field_types', 'include_field_types_icon_font');




// 3. Include field type for ACF4
function register_fields_icon_font() {

	include_once('acf-icon_font-v4.php');

}

add_action('acf/register_fields', 'register_fields_icon_font');




?>