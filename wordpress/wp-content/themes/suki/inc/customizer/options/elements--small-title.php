<?php
/**
 * Customizer settings: General Elements > Small Title
 *
 * @package Suki
 **/

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

$section = 'suki_section_small_title';

// Typography
$settings = array(
	'font_family'    => 'small_title_font_family',
	'font_weight'    => 'small_title_font_weight',
	'font_style'     => 'small_title_font_style',
	'text_transform' => 'small_title_text_transform',
	'font_size'      => 'small_title_font_size',
	'line_height'    => 'small_title_line_height',
	'letter_spacing' => 'small_title_letter_spacing',

	'font_size__tablet'      => 'small_title_font_size__tablet',
	'line_height__tablet'    => 'small_title_line_height__tablet',
	'letter_spacing__tablet' => 'small_title_letter_spacing__tablet',

	'font_size__mobile'      => 'small_title_font_size__mobile',
	'line_height__mobile'    => 'small_title_line_height__mobile',
	'letter_spacing__mobile' => 'small_title_letter_spacing__mobile',
);
foreach ( $settings as $id ) {
	$wp_customize->add_setting( $id, array(
		'default'     => suki_array_value( $defaults, $id ),
		'transport'   => 'postMessage',
		'sanitize_callback' => array( 'Suki_Customizer_Sanitization', 'typography' ),
	) );
}
$wp_customize->add_control( new Suki_Customize_Control_Typography( $wp_customize, 'small_title_typography', array(
	'settings'    => $settings,
	'section'     => $section,
	'label'       => esc_html__( 'Small Title typography', 'suki' ),
	'priority'    => 10,
) ) );

// ------
$wp_customize->add_control( new Suki_Customize_Control_HR( $wp_customize, 'hr_small_title_colors', array(
	'section'     => $section,
	'settings'    => array(),
	'priority'    => 10,
) ) );

// Colors
$colors = array(
	'small_title_text_color'       => esc_html__( 'Small Title text color', 'suki' ),
	'small_title_hover_text_color' => esc_html__( 'Small Title text color :hover', 'suki' ),
);
foreach ( $colors as $id => $label ) {
	$wp_customize->add_setting( $id, array(
		'default'     => suki_array_value( $defaults, $id ),
		'transport'   => 'postMessage',
		'sanitize_callback' => array( 'Suki_Customizer_Sanitization', 'color' ),
	) );
	$wp_customize->add_control( new Suki_Customize_Control_Color( $wp_customize, $id, array(
		'section'     => $section,
		'label'       => $label,
		'priority'    => 10,
	) ) );
}