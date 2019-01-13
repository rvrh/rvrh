<?php
/**
 * slider section
 *
 * @package magazine-shop
 */

$default = magazine_shop_get_default_theme_options();

// Slider Main Section.
$wp_customize->add_section( 'slider_section_settings',
	array(
		'title'      => esc_html__( 'Slider Section', 'magazine-shop' ),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);


// Setting - show_slider_section.
$wp_customize->add_setting( 'show_slider_section',
	array(
		'default'           => $default['show_slider_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazine_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_slider_section',
	array(
		'label'    => esc_html__( 'Enable Slider', 'magazine-shop' ),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting( 'slider_layout_option',
	array(
		'default'           => $default['slider_layout_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazine_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'slider_layout_option',
	array(
		'label'    => esc_html__( 'Slider Layout', 'magazine-shop' ),
		'section'  => 'slider_section_settings',
		'choices'  => array(
                'full-width' => esc_html__( 'Full Width', 'magazine-shop' ),
                'boxed' => esc_html__( 'Boxed', 'magazine-shop' ),
		    ),
		'type'     => 'select',
		'priority' => 100,
	)
);

// Setting - drop down category for slider.
$wp_customize->add_setting( 'select_category_for_slider',
	array(
		'default'           => $default['select_category_for_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Magazine_Shop_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_slider',
	array(
        'label'           => esc_html__( 'Category for slider', 'magazine-shop' ),
        'description'     => esc_html__( 'Select category to be shown on tab ', 'magazine-shop' ),
        'section'         => 'slider_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
    ) ) );


