<?php
/**
 * kazbe Theme Customizer
 *
 * @package kazbe
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kazbe_customize_register( $wp_customize ) {

	global $kazbePostsPagesArray, $kazbeYesNo, $kazbeSliderType, $kazbeServiceLayouts, $kazbeAvailableCats;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'kazbe_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'kazbe_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'kazbe_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'kazbe'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'kazbe_general';
	$wp_customize->get_section( 'background_image' )->panel = 'kazbe_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'kazbe');
	$wp_customize->get_section( 'header_image' )->panel = 'kazbe_general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'kazbe');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'kazbe' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'kazbe'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'kazbe_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new kazbe_Customize_Control_Upgrade(
		$wp_customize,
		'kazbe_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'kazbe' ),
			'settings'   => 'kazbe_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'kazbe'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'kazbe_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new kazbe_Customize_Control_Guide(
		$wp_customize,
		'kazbe_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'kazbe' ),
			'settings'   => 'kazbe_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'kazbe'),
		'active_callback' => '',
	) );

	/* Header options */	
	$wp_customize->add_section( 'business_page_header', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header Settings', 'kazbe'),
		'active_callback' => 'kazbe_front_page_sections',
		'panel'  => 'business_page',
	) );		
	$wp_customize->add_setting( 'kazbe_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_show_slider',
		array(
			'label'      => __( 'Show header?', 'kazbe' ),
			'settings'   => 'kazbe_show_slider',
			'priority'   => 10,
			'section'    => 'business_page_header',
			'type'    => 'select',
			'choices' => $kazbeYesNo,
		)
	) );
	
	$wp_customize->add_section( 'business_page_welcome', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Welcome Section Settings', 'kazbe'),
		'active_callback' => 'kazbe_front_page_sections',
		'panel'  => 'business_page',
	) );	
	
	$wp_customize->add_setting( 'kazbe_show_welcome',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_show_welcome',
		array(
			'label'      => __( 'Show welcome?', 'kazbe' ),
			'settings'   => 'kazbe_show_welcome',
			'priority'   => 10,
			'section'    => 'business_page_welcome',
			'type'    => 'select',
			'choices' => $kazbeYesNo,
		)
	) );
	$wp_customize->add_setting( 'kazbe_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_welcome_post',
		array(
			'label'      => __( 'Select post', 'kazbe' ),
			'description' => __( 'Select a post/page you want to show in welcome section', 'kazbe' ),
			'settings'   => 'kazbe_welcome_post',
			'priority'   => 11,
			'section'    => 'business_page_welcome',
			'type'    => 'select',
			'choices' => $kazbePostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'business_page_products', array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'title'      => __('Products Section Settings', 'kazbe'),
		'active_callback' => 'kazbe_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'kazbe_products_title',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_products_title',
		array(
			'label'      => __( 'Title for left column?', 'kazbe' ),
			'settings'   => 'kazbe_products_title',
			'priority'   => 15,
			'section'    => 'business_page_products',
			'type'    => 'text',
		)
	) );	
	$wp_customize->add_setting( 'kazbe_products_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_products_cat',
		array(
			'label'      => __( 'Select category for left column?', 'kazbe' ),
			'settings'   => 'kazbe_products_cat',
			'priority'   => 16,
			'section'    => 'business_page_products',
			'type'    => 'select',
			'choices' => $kazbeAvailableCats,
		)
	) );
	$wp_customize->add_section( 'business_page_services', array(
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
		'title'      => __('Services Section Settings', 'kazbe'),
		'active_callback' => 'kazbe_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'kazbe_services_title',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_services_title',
		array(
			'label'      => __( 'Title for middle column?', 'kazbe' ),
			'settings'   => 'kazbe_services_title',
			'priority'   => 20,
			'section'    => 'business_page_services',
			'type'    => 'text',
		)
	) );	
	$wp_customize->add_setting( 'kazbe_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_services_cat',
		array(
			'label'      => __( 'Select category for middle column?', 'kazbe' ),
			'settings'   => 'kazbe_services_cat',
			'priority'   => 21,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $kazbeAvailableCats,
		)
	) );
	
	$wp_customize->add_section( 'business_page_news', array(
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
		'title'      => __('News Section Settings', 'kazbe'),
		'active_callback' => 'kazbe_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'kazbe_news_title',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_news_title',
		array(
			'label'      => __( 'Title for right column?', 'kazbe' ),
			'settings'   => 'kazbe_news_title',
			'priority'   => 30,
			'section'    => 'business_page_news',
			'type'    => 'text',
		)
	) );	

	$wp_customize->add_setting( 'kazbe_news_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_news_cat',
		array(
			'label'      => __( 'Select category for right column?', 'kazbe' ),
			'settings'   => 'kazbe_news_cat',
			'priority'   => 31,
			'section'    => 'business_page_news',
			'type'    => 'select',
			'choices' => $kazbeAvailableCats,
		)
	) );	

	$wp_customize->add_section( 'business_page_quote', array(
		'priority'       => 60,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Section Settings', 'kazbe'),
		'active_callback' => 'kazbe_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'kazbe_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_show_quote',
		array(
			'label'      => __( 'Show quote?', 'kazbe' ),
			'settings'   => 'kazbe_show_quote',
			'priority'   => 50,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $kazbeYesNo,
		)
	) );		
	$wp_customize->add_setting( 'kazbe_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_quote_post',
		array(
			'label'      => __( 'Quote', 'kazbe' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'kazbe' ),
			'settings'   => 'kazbe_quote_post',
			'priority'   => 41,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $kazbePostsPagesArray,
		)
	) );

	$wp_customize->add_section( 'business_page_social', array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'kazbe'),
		'active_callback' => 'kazbe_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'kazbe_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kazbe_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kazbe_show_social',
		array(
			'label'      => __( 'Show social?', 'kazbe' ),
			'settings'   => 'kazbe_show_social',
			'priority'   => 10,
			'section'    => 'business_page_social',
			'type'    => 'select',
			'choices' => $kazbeYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'kazbe' ),
	  'description' => __( 'Enter your facebook url.', 'kazbe' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'kazbe' ),
	  'description' => __( 'Enter your flickr url.', 'kazbe' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'kazbe' ),
	  'description' => __( 'Enter your gplus url.', 'kazbe' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'kazbe' ),
	  'description' => __( 'Enter your linkedin url.', 'kazbe' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'kazbe' ),
	  'description' => __( 'Enter your reddit url.', 'kazbe' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'kazbe' ),
	  'description' => __( 'Enter your stumble url.', 'kazbe' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'kazbe' ),
	  'description' => __( 'Enter your twitter url.', 'kazbe' ),
	) );	
	
}
add_action( 'customize_register', 'kazbe_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kazbe_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kazbe_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kazbe_customize_preview_js() {
	wp_enqueue_script( 'kazbe-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kazbe_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function kazbe_sanitize_yes_no_setting( $value ){
	global $kazbeYesNo;
    if ( ! array_key_exists( $value, $kazbeYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function kazbe_sanitize_post_selection( $value ){
	global $kazbePostsPagesArray;
    if ( ! array_key_exists( $value, $kazbePostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function kazbe_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function kazbe_sanitize_slider_type_setting( $value ){

	global $kazbeSliderType;
    if ( ! array_key_exists( $value, $kazbeSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function kazbe_sanitize_cat_setting( $value ){
	
	global $kazbeAvailableCats;
	
	if( ! array_key_exists( $value, $kazbeAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'kazbe_load_customize_classes', 0 );
function kazbe_load_customize_classes( $wp_customize ) {
	
	class kazbe_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'kazbe-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="kazbe-upgrade-container" class="kazbe-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .kazbe-upgrade-container -->
			
		<?php }	
		
	}
	
	class kazbe_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'kazbe-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="kazbe-upgrade-container" class="kazbe-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .kazbe-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'kazbe_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'kazbe_Customize_Control_Guide' );
	
	
}