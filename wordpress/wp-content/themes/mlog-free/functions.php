<?php
 
/**
 * MLog functions and definitions
 */

if ( ! isset( $content_width ) ) {
    $content_width = 700;
}

function mlogfree_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'mlogfree_javascript_detection', 0 );


// Theme Setup
if ( ! function_exists( 'mlogfree_theme_setup' ) ) {
    function mlogfree_theme_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            )
        );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        
        /* Register Thumbnail */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'mlogfree-thumbnail', 495, 280, true );
        add_image_size( 'mlogfree-thumbnail-small', 495, 135, true );
        
        /* Register Menu */
        register_nav_menu ( 'menu-primary', __('Primary Menu', 'mlog-free') );
        register_nav_menu ( 'menu-hot', __('HOT Menu', 'mlog-free') );
        
        /* Header custom */
        $header_custom = array(
            'default-image'      => get_template_directory_uri() . '/images/default-cover.jpg',
            'default-text-color' => 'fff',
            'width'              => 1600,
            'height'             => 900,
            'flex-width'         => true,
            'flex-height'        => true,
        );
        add_theme_support( 'custom-header', $header_custom );
    }
    add_action ( 'init', 'mlogfree_theme_setup' );
}


// Register Sidebar
function mlogfree_widgets_init() {
    register_sidebar( array(
		'name'          => __( 'Sidebar', 'mlog-free' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your Sidebar.', 'mlog-free' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer 1', 'mlog-free' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your Footer 1.', 'mlog-free' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer 2', 'mlog-free' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your Footer 2.', 'mlog-free' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer 3', 'mlog-free' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your Footer 3.', 'mlog-free' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mlogfree_widgets_init' );


// Register JS, Font
function mlogfree_css_js() {
    wp_register_style( 'mlogfree-layout', get_template_directory_uri() . '/css/layout.css', 'all' );
    wp_enqueue_style( 'mlogfree-layout' );
    wp_register_style( 'mlogfree-style', get_template_directory_uri() . '/style.css', 'all' );
    wp_enqueue_style( 'mlogfree-style' );
    wp_add_inline_style( 'mlogfree-customize-css', mlogfree_customize_theme() );
    wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome.min.css', 'all' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'mlogfree-js', get_template_directory_uri() . '/js/mlogfree.js', 'all' );
    if(is_singular() && comments_open()) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'mlogfree_css_js' );


// Mlog Function

require_once( get_template_directory() . '/core/mlogfree-bien.php' );
require_once( get_template_directory() . '/core/mlogfree-bien-post.php' );
require_once( get_template_directory() . '/core/mlogfree-functions.php' );


// Customize
require_once( get_template_directory() . '/core/customizes/mlogfree-home.php' );
require_once( get_template_directory() . '/core/customizes/mlogfree-homes.php' );