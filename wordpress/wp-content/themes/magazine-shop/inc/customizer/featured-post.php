<?php
/**
 * slider section
 *
 * @package magazine-shop
 */

$default = magazine_shop_get_default_theme_options();

// Featured News Section.
$wp_customize->add_section( 'featured_news_section_settings',
	array(
		'title'      => esc_html__( 'Featured News Section', 'magazine-shop' ),
		'priority'   => 70,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);


// Setting - show_featured_news_section.
$wp_customize->add_setting( 'show_featured_news_section',
	array(
		'default'           => $default['show_featured_news_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazine_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_featured_news_section',
	array(
		'label'    => esc_html__( 'Enable Featured News', 'magazine-shop' ),
		'section'  => 'featured_news_section_settings',
		'type'     => 'checkbox',
		'priority' => 10,
	)
);


// Setting - featured_news_title.
$wp_customize->add_setting( 'featured_news_title',
	array(
		'default'           => $default['featured_news_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'featured_news_title',
	array(
		'label'    => esc_html__( 'Section Title', 'magazine-shop' ),
		'section'  => 'featured_news_section_settings',
		'type'     => 'text',
		'priority' => 15,

	)
);

// Setting - drop down category for Featured Newssection.
$wp_customize->add_setting( 'select_category_for_featured_news',
	array(
		'default'           => $default['select_category_for_featured_news'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Magazine_Shop_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_featured_news',
	array(
        'label'           => esc_html__( 'Category for Featured News', 'magazine-shop' ),
        'description'     => esc_html__( 'Select category to be shown on tab ', 'magazine-shop' ),
        'section'         => 'featured_news_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 20,
    ) ) );

