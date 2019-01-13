<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
 return;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
 'bazzinga_config', array(
  'capability'  => 'edit_theme_options',
  'option_type' => 'theme_mod',
 )
);

//*********************************************************//
        //   Bazzinga Theme Customizer All Panels     //
//*********************************************************//


    /****  Bazzinga Homepage Panel ****/
    Kirki::add_panel( 'homepage_panel', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Homepage Panel', 'bazzinga' ),
    'description' => esc_attr__( 'This is homepage panel', 'bazzinga' ),
    ) );


    /**** A. Bazzinga Footer Panel ****/
    Kirki::add_panel( 'footer_panel', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Footer Panel', 'bazzinga' ),
    'description' => esc_attr__( 'This is footer panel', 'bazzinga' ),
    ) );