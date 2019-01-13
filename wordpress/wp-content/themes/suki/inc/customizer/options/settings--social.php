<?php
/**
 * Customizer settings: Global Settings > Social Media URLs
 *
 * @package Suki
 **/

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

$section = 'suki_section_social';

/**
 * ====================================================
 * Links
 * ====================================================
 */

$links = suki_get_social_media_types();
ksort( $links );
	
foreach ( $links as $slug => $label ) {
	// Social media link
	$id = 'social_' . $slug;
	$wp_customize->add_setting( $id, array(
		'default'     => suki_array_value( $defaults, $id ),
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( $id, array(
		'section'     => $section,
		'label'       => $label,
		'priority'    => 10,
	) );
}