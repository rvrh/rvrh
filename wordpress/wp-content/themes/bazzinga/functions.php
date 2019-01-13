<?php
/**
 * Bazzinga Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bazzinga
 */

if ( ! function_exists( 'bazzinga_setup' ) ) :

	function bazzinga_setup() {

		load_theme_textdomain('bazzinga', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('bazzinga_post_image1', 350,340,true);
		add_image_size('bazzinga_post_image2', 460,460,true);
		add_image_size('bazzinga_services_image', 67,56,true);
		add_image_size('bazzinga_our_approach_image', 51,41,true);
		add_image_size('bazzinga_our_team_image', 196,211,true);
		add_image_size('bazzinga_testimonials_image', 273,304,true);
		add_image_size('bazzinga_blog_image', 400,300,true);
		add_image_size('bazzinga_widget_post_img', 64,64,true);
		add_image_size('bazzinga_about_team_img', 384,420,true);
		add_image_size('bazzinga_about_subpage', 330,330,true);
		add_image_size('bazzinga_about_innerimage', 487,487,true);



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'bazzinga' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bazzinga_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add post format supports
		 */
		 add_theme_support( 'post-formats', array( 'video','audio', 'gallery','quote' ) );

		/**
		 * Changing excerpt length for bcorporate theme
		 */
		function bazzinga_excerpt_length( $length ) {
			if ( ! is_admin() ) {
				return 25;
			} else {
				return $length;
			}
		}
		add_filter( 'excerpt_length', 'bazzinga_excerpt_length', 999 );

	}
endif;
add_action( 'after_setup_theme', 'bazzinga_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bazzinga_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bazzinga_content_width', 640 );
}
add_action( 'after_setup_theme', 'bazzinga_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bazzinga_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bazzinga' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Top', 'bazzinga' ),
		'id'            => 'header-top-widget',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One Top Heading', 'bazzinga' ),
		'id'            => 'footer-top-heading',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top One', 'bazzinga' ),
		'id'            => 'footer-top-one',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Two', 'bazzinga' ),
		'id'            => 'footer-top-two',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer bottom one', 'bazzinga' ),
		'id'            => 'footer-bottom-one',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer bottom two', 'bazzinga' ),
		'id'            => 'footer-bottom-two',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer bottom three', 'bazzinga' ),
		'id'            => 'footer-bottom-three',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'bazzinga' ),
		'id'            => 'bazzinga_shop_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'bazzinga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'bazzinga_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bazzinga_scripts() {

	//google fonts
	wp_enqueue_style('bazzinga-fonts',bazzinga_fonts_url(),array(),null);

	//bootstrap css
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/library/bootstrap/css/bootstrap.min.css', array(), '4.0.0' );

	//font awesome css
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/library/font-awesome/css/fontawesome-all.min.css', false, '5.0.12' );

	// light slider css
	wp_enqueue_style( 'lightslider-css', get_template_directory_uri() . '/inc/library/lightslider/lightslider.min.css', array(), '1.1.3' );

	// smartmenu core css
	wp_enqueue_style( 'smartmenu-core-css', get_template_directory_uri() . '/inc/library/smart-menu/sm-core-css.css', array(), '1.0.0' );

	// smartmenu main css
	wp_enqueue_style( 'smartmenu-clean-css', get_template_directory_uri() . '/inc/library/smart-menu/sm-clean.css', array(), '1.0.0' );

	// aos animation css
	wp_enqueue_style( 'aos-css', get_template_directory_uri() . '/inc/library/aos-animation/aos.min.css', array(), '1.0.1' );

	// main theme css
	wp_enqueue_style( 'bazzinga-style', get_stylesheet_uri() );

	// lightslider js
	wp_enqueue_script('lightslider-js', get_template_directory_uri() . '/inc/library/lightslider/lightslider.min.js', array(), '1.1.6' );

	wp_enqueue_script('imagesloaded');

	// bootstrap js
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/library/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

	//isotope js
	wp_enqueue_script( 'isotope-master-js', get_template_directory_uri() . '/inc/library/isotope/isotope-min.js', array('jquery'), '3.0.6', true );

	//smartmenu js
	wp_enqueue_script( 'smartmenus-js', get_template_directory_uri() . '/inc/library/smart-menu/jquery.smartmenus.min.js', array('jquery'), '1.1.0', true );

	// skip link focus js
	wp_enqueue_script( 'bazzinga-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

	// stickey kit js
	wp_enqueue_script( 'sticky-kit-js', get_template_directory_uri() . '/inc/library/sticky-kit/sticky-kit.min.js', array('jquery'), '1.10.0', true );

	// waypoint js
	wp_enqueue_script( 'waypoint-js', get_template_directory_uri() . '/inc/library/waypoint/jquery.waypoint.min.js', array('jquery'), '4.0.1', true );

	// counter js
	wp_enqueue_script( 'countup-js', get_template_directory_uri() . '/inc/library/counter-up/jquery.counterup.min.js', array('jquery'), '1.0', true );

	// aos js
	wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/inc/library/aos-animation/aos.min.js', array('jquery'), '1.0.1', true );

	// main theme js
	wp_enqueue_script( 'bazzinga-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bazzinga_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

 /*------------------------------
 	 Customizer
------------------------------*/
	 
if ( ! class_exists( 'Kirki' ) ) {
	        require get_template_directory() . '/inc/bazz_kirki/bazz-kirki-installer.php'; // installer
}

// kirki configuration
if ( class_exists( 'Kirki' ) ) {
require get_template_directory() . '/inc/bazz_kirki/bazz-kirki-config.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

//google fonts
function bazzinga_fonts_url(){
	$fonts_url = '';

	$bazzinga_open_sans = _x( 'on', 'Open Sans: on or off', 'bazzinga' );
	$bazzinga_playfair_display = _x( 'on', 'Playfair Display: on or off', 'bazzinga' );


	if ( 'off' !== $bazzinga_open_sans || 'off' !== $bazzinga_playfair_display ) {

		$font_families = array();

		if ( 'off' !== $bazzinga_open_sans ) {
				$font_families[] = 'Open Sans:300,400,400i,700,700i,800';
		}

		if ( 'off' !== $bazzinga_playfair_display ) {
				$font_families[] = 'Playfair Display:400,400i,700,700i,900';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}

/**
* Load custom widgets
**/
require get_template_directory(). '/inc/widgets/widgets.php';

/**
 * Load TGM Plgin to recommended plugins
 */
require get_template_directory() . '/inc/library/tgm-plugin-activation/bazzinga-plugin-activation.php';
