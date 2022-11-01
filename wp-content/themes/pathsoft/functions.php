<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/breadcrumbs.php',                      // Custom breadcrumbs for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/class-wp-bootstrap-navwalker-mobile.php',    // Load custom WordPress nav mobile walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

/**
 * Convert hex color string to rgb string 
 *
 * @param $color      hex color value
 *
 * @return string       RGB number
 */
if( ! function_exists('pathsoft_hex2rgba') ) {

	function pathsoft_hex2rgba($color) {
	
		$default = 'rgb(0,0,0)';
	
		//Return default if no color provided
		if(empty($color))
			return $default; 
	
		//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
	
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
	
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	
			$output = ''.implode(",",$rgb).'';
	
			//Return color string
			return $output;
	}

}

/**
 * Build & enqueue the complete CSS.
 */
if( ! function_exists('pathsoft_enqueue_custom_style') ) {

	function pathsoft_enqueue_custom_style() {

		wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom_script.css' );
		
		$css = '';

		$heading_typography_settings = get_theme_mod('heading_typography_settings', []);
		$body_typography_settings = get_theme_mod('body_typography_settings', []);
		
		$color_main = get_theme_mod('color_main', '#2c7ae7');
		$color_primary1 = get_theme_mod('color_primary1', '#ffffff');
		$color_primary2 = get_theme_mod('color_primary2', '#000000');
		$color_primary1_bg = get_theme_mod('color_primary1_bg', '#f0f4f8');
		$gradient_color_defaults = array(
			'gradient_color_1'    => '#2876e2',
            'gradient_color_2'   => '#3f8efc',
		);
		$gradient_color = get_theme_mod( 'gradient_color', $gradient_color_defaults );
		$color_text1 = get_theme_mod('color_text1', '#303036');
		$color_text2 = get_theme_mod('color_text2', '#63636b');
		$color_border1 = get_theme_mod('color_border1', '#EEEEEE');
		$color_border2 = get_theme_mod('color_border2', '#D4D4E1');
		$color_placeholder = get_theme_mod('color_placeholder', '#B7B7BA');
		$color_error = get_theme_mod('color_error', '#ff3d0d');

		$elements_border_width = get_theme_mod('elements_border_width', 1);
		$elements_border_radius = get_theme_mod('elements_border_radius', 10);
		$elements_border_radius_min = get_theme_mod('elements_border_radius_min', 6);
		$elements_box_shadow = get_theme_mod('elements_box_shadow', '2px 4px 20px 1.4px rgba(45, 45, 45, 0.13)');

		$header_box_shadow = get_theme_mod('header_box_shadow', '0px 0px 13px 0px rgba(77, 82, 94, 0.13)');

		$css .= ':root {';
			if ( isset( $heading_typography_settings['font-family'] ) ) {
				$css .= '--title-font: "'. $heading_typography_settings['font-family'] .'";';
			} if ( isset( $body_typography_settings['font-family'] ) ) {
				$css .= '--default-font: "'.$body_typography_settings['font-family'].'";';
			} if ( isset( $body_typography_settings['variant'] ) ) {
				$css .= '--default-font-weight: '.$body_typography_settings['variant'].';';
			} if ( isset( $body_typography_settings['line-height'] ) ) {
				$css .= '--default-line-height: '.$body_typography_settings['line-height'].';';
			} if ( isset( $color_main ) ) {
				$css .= '--c-main: '.$color_main.';';
				$css .= '--c-main-rgba: '.pathsoft_hex2rgba($color_main).';';
			} if( isset( $color_primary1 ) ) {
				$css .= '--c-primary1: '.$color_primary1.';';
				$css .= '--c-primary1-rgb: '.pathsoft_hex2rgba($color_primary1).';';
			} if( isset( $color_primary2 ) ) {
				$css .= '--c-primary2: '.$color_primary2.';';
				$css .= '--c-primary2-rgba: '.pathsoft_hex2rgba($color_primary2).';';
			} if( isset( $color_primary1_bg ) ) {
				$css .= '--c-bgc: '.$color_primary1_bg.';';
				$css .= '--c-bgc-rgba: '.pathsoft_hex2rgba($color_primary1_bg).';';
			} if( isset( $gradient_color['gradient_color_1'] ) ) {
				$css .= '--c-gradient1: '.$gradient_color['gradient_color_1'].';';
			} if( isset( $gradient_color['gradient_color_2'] ) ) {
				$css .= '--c-gradient2: '.$gradient_color['gradient_color_2'].';';
			} if( isset( $color_text1 ) ) {
				$css .= '--c-text: '.$color_text1.';';
				$css .= '--c-text-rgba: '.pathsoft_hex2rgba($color_text1).';';
				$css .= '--c-bgc-dark: '.$color_text1.';';
			} if( isset( $color_text2 ) ) {
				$css .= '--c-text2: '.$color_text2.';';
			} if( isset( $color_border1 ) ) {
				$css .= '--c-border: '.$color_border1.';';
			} if( isset( $color_border2 ) ) {
				$css .= '--c-border2: '.$color_border2.';';
			} if( isset( $color_placeholder ) ) {
				$css .= '--c-placeholder: '.$color_placeholder.';';
			} if( isset( $color_error ) ) {
				$css .= '--c-error: '.$color_error.';';
			} if( isset( $elements_border_width ) ) {
				$css .= '--el-border-width: '.$elements_border_width.'px;';
			} if( isset( $elements_border_radius ) ) {
				$css .= '--el-border-radius: '.$elements_border_radius.'px;';
			} if( isset( $elements_border_radius_min ) ) {
				$css .= '--el-border-radius-min: '.$elements_border_radius_min.'px;';
			} if( isset( $elements_box_shadow ) ) {
				$css .= '--el-box-shadow: '.$elements_box_shadow.';';
			} if( isset( $header_box_shadow ) ) {
				$css .= '--header-box-shadow: '.$header_box_shadow.';';
			}
		$css .= '}';

		$footer_color_defaults = array(
			'text'  => 'rgba(255, 255, 255, 0.8)',
			'link'  => 'rgba(255, 255, 255, 0.8)',
			'hover' => 'rgba(255, 255, 255, 1)',
		);
		$footer_color_value = get_theme_mod( 'footer_multicolor', $footer_color_defaults );
		$footer_separator = get_theme_mod( 'footer_separator', 'rgba(255, 255, 255, 0.2)' );
		$footer_bg = get_theme_mod( 'footer_bg' );
		$css .= '.footer { color: '.$footer_color_value['text'].'; }';
		$css .= '.footer a { color: '.$footer_color_value['link'].'; }';
		$css .= '.footer-social-links li a { fill: '.$footer_color_value['link'].'; border-color: '.$footer_color_value['link'].'; }';
		$css .= '.footer-links ul li a { border-bottom-color: '.$footer_color_value['link'].'; }';
		$css .= '.footer-social-links li a:hover { background-color: '.$footer_color_value['link'].'; fill: '.$footer_bg["background-color"].'; }';
		$css .= '.footer a:hover { color: '.$footer_color_value['hover'].'; }';
		$css .= '.footer-links ul li a:hover { border-bottom-color: '.$footer_color_value['hover'].'; }';
		$css .= '.footer-bottom { border-top-color: '.$footer_separator.'; }';

		$header_color = get_theme_mod( 'header_color', '#303036' );
		$header_bg = get_theme_mod( 'header_bg' );
		$css .= '.header-fixed, .header-center, .header-search-btn, .main-mnu-list>li a, .header-navbar-content, .header-navbar-content a, .header-navbar-content i { color: '.$header_color.'; }';
		$css .= '.main-mnu-btn .bar { background-color: '.$header_color.'; }';
		$css .= '.header-navbar-content .social-links li a { fill: '.$header_color.'; }';
		$css .= '.header-navbar-content .header-call-back-link span { border-bottom-color: '.$header_color.'; }';
		$css .= '.main-mnu-list>li>ul, .header-center, .header-navbar-content { background-color: '.$header_bg["background-color"].'; }';

		$header_top_color = array(
			'bg'     => '#303036',
            'link'   => 'rgba(255, 255, 255, 0.8)',
            'hover'  => '#ffffff',
		);
		$header_top_color_value = get_theme_mod( 'header_top_color', $header_top_color );
		$css .= '.header-top { background-color: '.$header_top_color_value['bg'].'; }';
		$css .= '.header-top, .header-top a, .header-top-links .header-call-back-link, .header-top i { color: '.$header_top_color_value['link'].'; }';
		$css .= '.header-top-links .header-call-back-link span { border-bottom-color: '.$header_top_color_value['link'].'; }';
		$css .= '.header-top a:hover, .header-top-links .header-call-back-link:hover { color: '.$header_top_color_value['hover'].'; }';
		$css .= '.social-links li a { fill: '.$header_top_color_value['link'].'; }';
		$css .= '.social-links li a:hover { fill: '.$header_top_color_value['hover'].'; }';

		wp_add_inline_style( 'custom-style', $css );

	}

	add_action( 'wp_enqueue_scripts', 'pathsoft_enqueue_custom_style');

}

/**
 * The excerpt max charlength
 * 
 */
if( ! function_exists('the_excerpt_max_charlength') ) {

	function the_excerpt_max_charlength( $charlength ) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
			echo '[...]';
		} else {
			echo $excerpt;
		}
	}

}

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
	return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
	return false;
}
