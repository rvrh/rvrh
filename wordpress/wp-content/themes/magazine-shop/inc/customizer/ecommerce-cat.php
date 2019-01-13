<?php
/**
 * ecommerce category section
 *
 * @package magazine-shop
 */

$default = magazine_shop_get_default_theme_options();
if (!class_exists('WooCommerce')) {
    return;
}
// ecomerce Main Section.
$wp_customize->add_section( 'ecommerce_cat_section_settings',
    array(
        'title'      => esc_html__( 'eCommerce Category Section', 'magazine-shop' ),
        'priority'   => 60,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_front_page_section',
    )
);


// Setting - show_ecommerce_cat_section.
$wp_customize->add_setting( 'show_ecommerce_cat_section',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'magazine_shop_sanitize_checkbox',
    )
);
$wp_customize->add_control( 'show_ecommerce_cat_section',
    array(
        'label'    => esc_html__( 'Enable eCommerce Category Section', 'magazine-shop' ),
        'section'  => 'ecommerce_cat_section_settings',
        'type'     => 'checkbox',
        'priority' => 100,
    )
);

// Setting - drop down category for eCommerce.
for ($i = 1; $i <= 3; $i++) {
$wp_customize->add_setting( 'drop_down_category_ecommerce_'.$i,
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( new Magazine_Shop_Dropdown_Taxonomies_Control( $wp_customize, 'drop_down_category_ecommerce_'.$i,
    array(
        'label'           => esc_html__( 'Category for eCommerce', 'magazine-shop' ).' - '.$i,
        'description'     => esc_html__( 'Select category to be shown on eCommerce section ', 'magazine-shop' ),
        'section'         => 'ecommerce_cat_section_settings',
        'type'            => 'dropdown-taxonomies',
        'priority'    	  => 130,
        'taxonomy'        => 'product_cat',
    ) ) );
}