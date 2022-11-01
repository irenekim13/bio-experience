<?php
/**
 * Add the theme configuration
 */
if (class_exists ('kirki')) { 

    Kirki::add_config( 'pathsoft', array(
        'option_type' => 'theme_mod',
        'capability'  => 'edit_theme_options',
    ) );

}
function pathsoft_kirki_sections( $wp_customize ) {
    
	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'global', array(
		'priority'    => 10,
		'title'       => __( 'PathSoft Settings', 'pathsoft' ),
	) );
    
	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'typography', array(
 		'title'       => __( 'Typography', 'pathsoft' ),
 		'priority'    => 10,
 		'panel'       => 'global',
 	) );

    $wp_customize->add_section( 'colors', array(
 		'title'       => __( 'Colors', 'pathsoft' ),
 		'priority'    => 20,
 		'panel'       => 'global',
    ) );

    $wp_customize->add_section( 'header', array(
        'title'       => __( 'Header', 'pathsoft' ),
        'priority'    => 30,
        'panel'       => 'global',
    ) );

    $wp_customize->add_section( 'footer', array(
        'title'       => __( 'Footer', 'pathsoft' ),
        'priority'    => 40,
        'panel'       => 'global',
    ) );

    $wp_customize->add_section( 'elements', array(
        'title'       => __( 'Elements', 'pathsoft' ),
        'priority'    => 50,
        'panel'       => 'global',
    ) );

    $wp_customize->add_section( 'google_maps', array(
        'title'       => __( 'Google Maps', 'pathsoft' ),
        'priority'    => 60,
        'panel'       => 'global',
    ) );

}
add_action( 'customize_register', 'pathsoft_kirki_sections' );

function pathsoft_customize( $wp_customize ) {
    
    //Heading Fonts
    Kirki::add_field( 'pathsoft', [
        'type'        => 'typography',
        'settings'    => 'heading_typography_settings',
        'label'       => esc_html__( 'Heading Fonts', 'pathsoft' ),
        'section'     => 'typography',
        'choices' => [
            'fonts' => [
                'google'   => [],
            ],
        ],
        'default'     => [
            'font-family'    => 'Montserrat',
            'variant'        => '700',
            'line-height'    => '1.3'
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1, h2, h3, h4, h5, h6',
            ],
        ],
    ] );
    //Body fonts
    Kirki::add_field( 'pathsoft', [
        'type'        => 'typography',
        'settings'    => 'body_typography_settings',
        'label'       => __( 'Body', 'pathsoft' ),
        'section'     => 'typography',
        'choices' => [
            'fonts' => [
                'google'   => [],
            ],
        ],
        'default'     => [
            'font-family'    => 'Istok Web',
            'variant'        => 'regular',
            'font-size'      => '16px',
            'line-height'    => '1.5'
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ] );

    //Colors
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_main',
        'label'       => __( 'Main Color', 'pathsoft' ),
        'description' => esc_html__( 'Theme color, links, buttons, etc', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#2c7ae7',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_primary1',
        'label'       => __( 'Primary 1', 'pathsoft' ),
        'description' => esc_html__( 'Colors Primary 1 and Primary 2 should be opposite. This is usually black and white.', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#ffffff',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_primary2',
        'label'       => __( 'Primary 2', 'pathsoft' ),
        
        'section'     => 'colors',
        'default'     => '#000000',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_primary1_bg',
        'label'       => __( 'Primary 1 background', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#f0f4f8',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'multicolor',
        'settings'    => 'gradient_color',
        'label'       => esc_html__( 'Gradient Settings', 'pathsoft' ),
        'description' => esc_html__( 'This will affect all element with the gradient', 'pathsoft' ),
        'section'     => 'colors',
        'choices'     => [
            'gradient_color_1'    => esc_html__( 'Gradient Color 1', 'pathsoft' ),
            'gradient_color_2'    => esc_html__( 'Gradient Color 2', 'pathsoft' ),
        ],
        'default'     => [
            'gradient_color_1'    => '#2876e2',
            'gradient_color_2'   => '#3f8efc',
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_text1',
        'label'       => __( 'Main text color', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#303036',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_text2',
        'label'       => __( 'Secondary text color', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#63636b',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_border1',
        'label'       => __( 'Main border color', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#EEEEEE',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_border2',
        'label'       => __( 'Secondary border color', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#D4D4E1',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_placeholder',
        'label'       => __( 'Placeholder', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#B7B7BA',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'color_error',
        'label'       => __( 'Error', 'pathsoft' ),
        'section'     => 'colors',
        'default'     => '#ff3d0d',
    ] );

    //Header
    Kirki::add_field( 'pathsoft', [
        'type'        => 'radio-buttonset',
        'settings'    => 'header_style',
        'label'       => esc_html__( 'Header style', 'pathsoft' ),
        'section'     => 'header',
        'default'     => 'default',
        'priority'    => 10,
        'choices'     => [
            'default'   => esc_html__( 'Default', 'pathsoft' ),
            'minimal' => esc_html__( 'Minimal', 'pathsoft' ),
            'center'  => esc_html__( 'Center', 'pathsoft' ),
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'     => 'text',
        'settings' => 'header_box_shadow',
        'label'    => esc_html__( 'Box shadow (css code)', 'pathsoft' ),
        'section'  => 'header',
        'priority' => 10,
        'default'     => '0px 0px 13px 0px rgba(77, 82, 94, 0.13)',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'repeater',
        'label'       => esc_attr__( 'Header top menu', 'pathsoft' ),
        'section'     => 'header',
        'priority'    => 10,
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__( 'Row', 'pathsoft' ),
            'field' => 'style',
        ],
        'settings'    => 'header_top_mnu',
        'fields' => [
            'icon' => [
                'type'        => 'text',
                'label'       => esc_attr__( 'Icon', 'pathsoft' ),
                'description' => esc_attr__( 'Material Design Icons (name)', 'pathsoft' ),
            ],
            'value' => [
                'type'        => 'text',
                'label'       => esc_attr__( 'Value', 'pathsoft' ),
            ],
            'style' => [
                'type'        => 'select',
                'label'       => esc_attr__( 'Style', 'pathsoft' ),
                'default'     => 'text',
                'choices'     => [
                    'text' => esc_html__( 'Text', 'pathsoft' ),
                    'email' => esc_html__( 'Email', 'pathsoft' ),
                    'phone' => esc_html__( 'Phone', 'pathsoft' ),
                ],
            ],
        ],
        'choices' => [
            'limit' => 3
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'repeater',
        'label'       => esc_attr__( 'Social', 'pathsoft' ),
        'section'     => 'header',
        'priority'    => 10,
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__( 'Row', 'pathsoft' ),
            'field' => 'select',
        ],
        'settings'    => 'header_social',
        'fields' => [
            'select' => [
                'type'        => 'select',
                'label'       => esc_attr__( 'Select', 'pathsoft' ),
                'default'     => 'facebook-ico',
                'choices'     => [
                    'facebook-ico' => 'Facebook',
                    'google-plus-ico' => 'Google+',
                    'instagram-ico' => 'Instagram',
                    'linkedin-in-ico' => 'LinkedIn',
                    'twitter-ico' => 'Twitter',
                    'youtube-ico' => 'YouTube',
                    'vimeo-ico' => 'Vimeo',
                    'vk-ico' => 'Vkontakte',
                    'dribbble-ico' => 'Dribbble',
                    'github-ico' => 'Github',
                    'kickstarter-ico' => 'Kickstarter',
                    'pinterest-ico' => 'Pinterest',
                    'slack-ico' => 'Slack',
                    'skype-ico' => 'Skype',
                ],
            ],
            'link' => [
                'type'        => 'link',
                'label'       => esc_attr__( 'Link', 'pathsoft' ),
                'default'     => 'https://example.com/',
            ],
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'switch',
        'settings'    => 'popup_switch',
        'label'       => esc_html__( 'Switch popup', 'pathsoft' ),
        'section'     => 'header',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'pathsoft' ),
            'off' => esc_html__( 'Disable', 'pathsoft' ),
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'     => 'text',
        'settings' => 'popup_icon',
        'label'    => esc_html__( 'Icon', 'pathsoft' ),
        'description' => esc_attr__( 'Material Design Icons (name)', 'pathsoft' ),
        'section'  => 'header',
        'default'  => 'ring_volume',
        'priority' => 10,
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'     => 'text',
        'settings' => 'popup_title_link',
        'label'    => esc_html__( 'Title link', 'pathsoft' ),
        'section'  => 'header',
        'default'  => 'Callback',
        'priority' => 10,
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'     => 'text',
        'settings' => 'popup_title',
        'label'    => esc_html__( 'Title popup', 'pathsoft' ),
        'section'  => 'header',
        'default'  => 'We will call you',
        'priority' => 10,
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'     => 'text',
        'settings' => 'popup_form',
        'label'    => esc_html__( 'Form', 'pathsoft' ),
        'description' => esc_html__( 'Add shortcode "Contact Form 7" plugin', 'pathsoft' ),
        'section'  => 'header',
        'priority' => 10,
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'background',
        'settings'    => 'header_bg',
        'label'       => esc_html__( 'Background', 'pathsoft' ),
        'section'     => 'header',
        'default'     => [
            'background-color'      => '#ffffff',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'choices'     => [
            'alpha' => false,
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.header-fixed',
            ],
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'header_color',
        'label'       => __( 'Color', 'pathsoft' ),
        'section'     => 'header',
        'default'     => '#303036',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'multicolor',
        'settings'    => 'header_top_color',
        'label'       => esc_html__( 'Header top ( colors )', 'pathsoft' ),
        'section'     => 'header',
        'priority'    => 10,
        'choices'     => [
            'bg'      => esc_html__( 'Background', 'pathsoft' ),
            'link'    => esc_html__( 'Link', 'pathsoft' ),
            'hover'   => esc_html__( 'Hover', 'pathsoft' ),
        ],
        'default'     => [
            'bg'     => '#303036',
            'link'   => 'rgba(255, 255, 255, 0.8)',
            'hover'  => '#ffffff',
        ],
    ] );

    //Footer
    Kirki::add_field( 'pathsoft', [
        'type'     => 'text',
        'settings' => 'copyright',
        'label'    => esc_html__( 'Copyright', 'pathsoft' ),
        'section'  => 'footer',
        'priority' => 9,
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'repeater',
        'label'       => esc_attr__( 'Menu', 'pathsoft' ),
        'section'     => 'footer',
        'priority'    => 10,
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__( 'Row', 'pathsoft' ),
            'field' => 'title',
        ],
        'settings'    => 'footer_menu',
        'fields' => [
            'title' => [
                'type'        => 'text',
                'label'       => esc_attr__( 'Title', 'pathsoft' ),
            ],
            'link' => [
                'type'        => 'link',
                'label'       => esc_attr__( 'Link', 'pathsoft' ),
            ],
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'background',
        'settings'    => 'footer_bg',
        'label'       => esc_html__( 'Background', 'pathsoft' ),
        'section'     => 'footer',
        'default'     => [
            'background-color'      => '#303036',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.footer',
            ],
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'multicolor',
        'settings'    => 'footer_multicolor',
        'label'       => esc_html__( 'Color', 'pathsoft' ),
        'section'     => 'footer',
        'priority'    => 10,
        'choices'     => [
            'text'   => esc_html__( 'Text', 'pathsoft' ),
            'link'    => esc_html__( 'Link', 'pathsoft' ),
            'hover'   => esc_html__( 'Link hover', 'pathsoft' ),
        ],
        'default'     => [
            'text'    => 'rgba(255, 255, 255, 0.8)',
            'link'    => 'rgba(255, 255, 255, 0.8)',
            'hover'   => 'rgba(255, 255, 255, 1)',
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'color',
        'settings'    => 'footer_separator',
        'label'       => __( 'Separator', 'pathsoft' ),
        'section'     => 'footer',
        'default'     => 'rgba(255, 255, 255, 0.2)',
        'choices'     => [
            'alpha' => true,
        ],
    ] );

    //Elements
    Kirki::add_field( 'pathsoft', [
        'type'        => 'number',
        'settings'    => 'elements_border_width',
        'label'       => esc_html__( 'Border width', 'pathsoft' ),
        'section'     => 'elements',
        'default'     => 1,
        'choices'     => [
            'min'  => 1,
            'max'  => 3,
            'step' => 1,
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'slider',
        'settings'    => 'elements_border_radius',
        'label'       => esc_html__( 'Border radius', 'pathsoft' ),
        'description' => esc_html__( 'Large elements', 'pathsoft' ),
        'section'     => 'elements',
        'default'     => 10,
        'choices'     => [
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'slider',
        'settings'    => 'elements_border_radius_min',
        'label'       => esc_html__( 'Border radius', 'pathsoft' ),
        'description' => esc_html__( 'Small elements', 'pathsoft' ),
        'section'     => 'elements',
        'default'     => 6,
        'choices'     => [
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'     => 'text',
        'settings' => 'elements_box_shadow',
        'label'    => esc_html__( 'Box shadow (css code)', 'pathsoft' ),
        'section'  => 'elements',
        'priority' => 10,
        'default'     => '2px 4px 20px 1.4px rgba(45, 45, 45, 0.13)',
    ] );

    //Google Maps
    Kirki::add_field( 'pathsoft', [
        'type'        => 'text',
        'settings'    => 'gm_key',
        'label'       => 'Google API Key',
        'description' => esc_html__( 'If you want to use the map in the Contacts section, you need to add the Google API Key', 'pathsoft' ),
        'section'     => 'google_maps',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'number',
        'settings'    => 'gm_zoom',
        'label'       => esc_html__( 'Map zoom', 'pathsoft' ),
        'section'     => 'google_maps',
        'default'     => 15,
        'choices'     => [
            'min'  => 1,
            'max'  => 20,
            'step' => 1,
        ],
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'image',
        'settings'    => 'gm_image',
        'label'       => esc_html__( 'Map icon', 'pathsoft' ),
        'section'     => 'google_maps',
        'default'     => '',
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'number',
        'settings'    => 'gm_image_width',
        'label'       => esc_html__( 'Map icon width', 'pathsoft' ),
        'section'     => 'google_maps',
        'default'     => 47,
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'        => 'number',
        'settings'    => 'gm_image_height',
        'label'       => esc_html__( 'Map icon height', 'pathsoft' ),
        'section'     => 'google_maps',
        'default'     => 71,
    ] );
    Kirki::add_field( 'pathsoft', [
        'type'     => 'textarea',
        'settings' => 'gm_style',
        'label'    => esc_html__( 'Map style', 'pathsoft' ),
        'description' => esc_html__( 'Using the Google Map API, you can use any style of Snazzy Maps. You need to go to the Snazzy Maps website, select the map you need, copy "JAVASCRIPT STYLE ARRAY" and paste it into this field.', 'pathsoft' ),
        'section'  => 'google_maps',
    ] );


}
add_filter( 'kirki/fields', 'pathsoft_customize' );