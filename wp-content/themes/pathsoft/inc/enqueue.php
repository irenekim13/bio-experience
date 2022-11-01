<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		$folder        = '/assets';

		wp_enqueue_style('mdi','//fonts.googleapis.com/css?family=Material+Icons%7CMaterial+Icons+Outlined%7CMaterial+Icons+Two+Tone%7CMaterial+Icons+Round%7CMaterial+Icons+Sharp', array(), '');

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . $folder . '/css/style.min.css' );
		wp_enqueue_style( 'all-styles', get_template_directory_uri() . $folder . '/css/style.min.css', array(), $css_version );
		$css_style = $theme_version . '.' . filemtime( get_template_directory() . '/style.css' );
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), $css_style);

		//wp_enqueue_script( 'jquery' );
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery','//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js','','', array(), '3.4.1', true );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $folder . '/js/script.min.js' );
		wp_enqueue_script( 'all-scripts', get_template_directory_uri() . $folder . '/js/script.min.js', array(), $js_version, true );

		$js_custom_version = $theme_version . '.' . filemtime( get_template_directory() . $folder .  '/js/custom.js' );
		wp_enqueue_script( 'custom-script', get_template_directory_uri() . $folder . '/js/custom.js', array(), $js_custom_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		$js_map = $theme_version . '.' . filemtime( get_template_directory() . $folder .  '/js/google-map.js' );
		wp_enqueue_script( 'google-map', get_template_directory_uri() . $folder . '/js/google-map.js', array(), $js_map, true );

	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
