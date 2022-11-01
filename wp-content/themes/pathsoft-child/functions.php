<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


/**
 * Loads parent and child themes' style.css
 * 
 */
function pathsoft_child_theme_enqueue_styles() {
    $parent_style = 'style';
    $parent_base_dir = 'pathsoft';

    wp_enqueue_style( $parent_style,
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( $parent_base_dir ) ? wp_get_theme( $parent_base_dir )->get('Version') : ''
    );

    wp_enqueue_style( $parent_style . '_child',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_print_styles', 'pathsoft_child_theme_enqueue_styles' );


/**
  * Set up Child Theme's textdomain.
  *
  * Declare textdomain for this child theme.
  * Translations can be added to the /languages/ directory.
  */
function pathSoft_theme_setup() {
    load_child_theme_textdomain( 'pathsoft', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'pathSoft_theme_setup' );


/**
 * Kirki installer helper
 */
include_once get_theme_file_path( 'customize.php' );


/**
 * Build a background-gradient style for CSS
 *
 * @param $color_1      hex color value
 * @param $color_2      hex color value
 *
 * @return string       CSS definition
 */
if( ! function_exists('pathsoft_btn_gradients') ) {

	function pathsoft_btn_gradients( $color_1, $color_2 ) {

		$styles  = 'background:'.$color_1.';';
		$styles .= 'background:-webkit-gradient(linear,left top,right top,from('.$color_1.'), to('.$color_2.'));';
		$styles .= 'background:-o-linear-gradient(left,'.$color_1.' 0%,'.$color_2.' 100%);';
		$styles .= 'background:linear-gradient(to right,'.$color_1.' 0%,'.$color_2.' 100%);';

		return $styles;

	}

}


/**
 * SVG init viewBox
 *
 * @param $id      	    svg id
 *
 * @return string       definition
 */
if( ! function_exists('pathsoft_svg_viewBox') ) {

	function pathsoft_svg_viewBox( $id ) {

		$viewBox = '0 0 512 512';

		if($id == 'facebook-ico') {
			$viewBox = '0 0 320 512';
		} else if($id == 'google-plus-ico') {
			$viewBox = '0 0 640 512';
		} else if($id == 'instagram-ico') {
			$viewBox = '0 0 448 512';
		} else if($id == 'linkedin-in-ico') {
			$viewBox = '0 0 448 512';
		} else if($id == 'twitter-ico') {
			$viewBox = '0 0 512 512';
		} else if($id == 'youtube-ico') {
			$viewBox = '0 0 576 512';
		} else if($id == 'vk-ico') {
			$viewBox = '0 0 576 512';
		} else if($id == 'vimeo-ico') {
			$viewBox = '0 0 448 512';
		} else if($id == 'dribbble-ico') {
			$viewBox = '0 0 512 512';
		} else if($id == 'github-ico') {
			$viewBox = '0 0 496 512';
		} else if($id == 'kickstarter-ico') {
			$viewBox = '0 0 384 512';
		} else if($id == 'pinterest-ico') {
			$viewBox = '0 0 384 512';
		} else if($id == 'slack-ico') {
			$viewBox = '0 0 448 512';
		} else if($id == '0 0 448 512') {
			$viewBox = '0 0 448 512';
		}

		return $viewBox;

	}

}


/**
 * pathSoft Settings
 * 
 */
function pathSoftSettings() {

	/**
	 * ACF PRO Settings
	 * 
	 */

	// Include the ACF settins.
	include_once get_theme_file_path( 'inc/acf-pro-settings.php' );
	

	/**
	 * Post Type: Services.
	 */

	$labels = [
		"name" => __( "Services", "pathsoft" ),
		"singular_name" => __( "Service", "pathsoft" ),
	];

	$args = [
		"label" => __( "Services", "pathsoft" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "service", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "thumbnail" ],
	];

	register_post_type( "service", $args );

	/**
	 * Post Type: Projects.
	 */

	$labels = [
		"name" => __( "Projects", "pathsoft" ),
		"singular_name" => __( "Project", "pathsoft" ),
	];

	$args = [
		"label" => __( "Projects", "pathsoft" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "project", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "thumbnail" ],
		"taxonomies" => [ "category" ],
	];

	register_post_type( "project", $args );


}
add_action( 'init', 'pathSoftSettings' );


/**
 * Custom widgets
 * 
 */
include_once get_theme_file_path( 'inc/custom-widgets.php' );


/**
 * TGM Class
 * 
 */
include_once get_theme_file_path( 'inc/tgm-plugins.php' );


/**
 * Import Demo Data
 * 
 */
if( ! function_exists('pathdoft_import_files') ) {

	function pathdoft_import_files() {
		return array(
			array(
				'import_file_name'           => 'PathSoft Default',
				'import_file_url'            => 'https://template-wp.wbs-dvp.pro/demo-data/default/demo-content.xml',
				'import_widget_file_url'     => 'https://template-wp.wbs-dvp.pro/demo-data/default/widgets.json',
				'import_customizer_file_url' => 'https://template-wp.wbs-dvp.pro/demo-data/default/demo.dat',
				'import_preview_image_url'   => 'https://template-wp.wbs-dvp.pro/demo-data/default/preview_import_image.png',
				'preview_url'                => 'https://template-wp-1.wbs-dvp.pro/',
			),
			array(
				'import_file_name'           => 'PathSoft Dark',
				'import_file_url'            => 'https://template-wp.wbs-dvp.pro/demo-data/dark/demo-content.xml',
				'import_widget_file_url'     => 'https://template-wp.wbs-dvp.pro/demo-data/dark/widgets.json',
				'import_customizer_file_url' => 'https://template-wp.wbs-dvp.pro/demo-data/dark/demo.dat',
				'import_preview_image_url'   => 'https://template-wp.wbs-dvp.pro/demo-data/dark/preview_import_image.png',
				'preview_url'                => 'https://template-wp-2.wbs-dvp.pro/',
			),
		);
	}
	
	add_filter( 'pt-ocdi/import_files', 'pathdoft_import_files' );

}

function ocdi_after_import_setup() {

	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'main', 'nav_menu' );
	$footer_widget_1 = get_term_by( 'name', 'Footer widget 1', 'nav_menu' );
	$footer_widget_2 = get_term_by( 'name', 'Footer widget 2', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
			'footer1' => $footer_widget_1->term_id,
			'footer2' => $footer_widget_2->term_id,
		)
	);

	// Assign front page
	$front_page_id = get_page_by_title( 'Home' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


/**
 * Register Google API key.
 *
 */
if( ! function_exists('my_acf_init') ) {

	function my_acf_init() {
		$google_api_key = get_field('google_api_key', 'option');
		acf_update_setting('google_api_key', $google_api_key);
	}

	add_action('acf/init', 'my_acf_init');

}

/**
 * Remove type attribute for style and scripts
 * 
 */
if( ! function_exists('sj_remove_type_attr') ) {

	function sj_remove_type_attr($tag) {
		return preg_replace( "/type=['\"]text\/(css|javascript)['\"]/", '', $tag );
	}

	add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
	add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);

}