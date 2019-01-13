<?php
/**
 * Custom Header feature.
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Bazzinga
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @since 1.0.0
 */
function bazzinga_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bazzinga_custom_header_args', array(
			'default-image' => get_template_directory_uri() . '/inc/images/cropped-inner-bg.jpg',
			'width'         => 1920,
			'height'        => 500,
			'flex-height'   => true,
			'header-text'   => false,
	) ) );

	// Register default headers.
	register_default_headers( array(
		'real-estate' => array(
			'url'           => '%s/inc/images/header-banner.jpg',
			'thumbnail_url' => '%s/inc/images/header-banner.jpg',
			'description'   => esc_html_x( 'Bazzinga', 'header image description', 'bazzinga' ),
		),

	) );

}

add_action( 'after_setup_theme', 'bazzinga_custom_header_setup' );
