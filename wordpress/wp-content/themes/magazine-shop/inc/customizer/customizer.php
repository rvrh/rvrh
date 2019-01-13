<?php 

/**
 * magazine-shop Theme Customizer.
 *
 * @package magazine-shop
 */

//customizer core option
require get_template_directory() . '/inc/customizer/core/customizer-core.php';

//customizer 
require get_template_directory() . '/inc/customizer/core/default.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magazine_shop_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/core/control.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/core/sanitize.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Load customize option.
	require get_template_directory() . '/inc/customizer/option-panel.php';
	
	/*theme option panel details*/
	require get_template_directory() . '/inc/customizer/theme-option.php';


	// Register custom section types.
	$wp_customize->register_section_type( 'Magazine_Shop_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Magazine_Shop_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Magazine Shop Pro', 'magazine-shop' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'magazine-shop' ),
				'pro_url'  => 'https://www.themeinwp.com/theme/magazine-shop-pro/',
				'priority'  => 1,
			)
		)
	);

}
add_action( 'customize_register', 'magazine_shop_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function magazine_shop_customize_preview_js() {

	wp_enqueue_script( 'magazine_shop_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'magazine_shop_customize_preview_js' );

function magazine_shop_customizer_css() {
	wp_enqueue_script( 'magazine_shop_customize_controls', get_template_directory_uri() . '/assets/twp/js/customizer-admin.js', array( 'customize-controls' ) );
}
add_action( 'customize_controls_enqueue_scripts', 'magazine_shop_customizer_css',0 );
