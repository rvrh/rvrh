<?php 

/**
 * Theme Options Panel.
 *
 * @package magazine-shop
 */

$default = magazine_shop_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_front_page_section',
	array(
		'title'      => esc_html__( 'Home/Front Page Settings', 'magazine-shop' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

//banner add section
$wp_customize->add_section( 'banner_add_section_settings',
    array(
        'title'      => esc_html__( 'Banner Advertisement Section', 'magazine-shop' ),
        'priority'   => 60,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_front_page_section',
    )
);
// Setting top_section_advertisement.
$wp_customize->add_setting( 'top_section_advertisement',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'magazine_shop_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize, 'top_section_advertisement',
        array(
            'label'           => esc_html__( 'Top Section Advertisement', 'magazine-shop' ),
            'description'	  => sprintf( esc_html__( 'Recommended Size %1$s px X %2$s px', 'magazine-shop' ), 728, 90 ),
            'section'         => 'banner_add_section_settings',
            'priority'        => 120,
        )
    )
);

/*top_section_advertisement_url*/
$wp_customize->add_setting( 'top_section_advertisement_url',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'top_section_advertisement_url',
    array(
        'label'    		=> esc_html__( 'URL Link', 'magazine-shop' ),
        'section'  		=> 'banner_add_section_settings',
        'type'     		=> 'text',
        'priority' 		=> 130,
    )
);
	/*homepage section*/
	require get_template_directory() . '/inc/customizer/slider.php';
	require get_template_directory() . '/inc/customizer/ecommerce-cat.php';
	require get_template_directory() . '/inc/customizer/featured-post.php';