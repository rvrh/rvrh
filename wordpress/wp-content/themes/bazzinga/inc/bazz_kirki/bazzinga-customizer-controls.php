<?php
/*****************************************************/
	// Bazzinga Theme Customizer All CONTROLS  //
/*****************************************************/


/**** Bazzinga Homepage Panel ****/
/*
 *
 * All controls customization
 *
 *	1. Homepage banner section
 *	2. Homepage design and develop section	
 *	3. Homepage Services Section
 *  4. Homepage Portfolio Section
 *  5. Homepage Work With us Section 
 *	6. Homepage Our Approach Section
 *	7. Homepage Our Team Section
 *	8. Homepage Get In Touch Section
 *	9. Homepage Testimonials Section
 *	10. Homepage Blog Section
 *	11.Homepage Newsletter Section
 */




/********* 1. Homepage banner section ************/

// 1.0 Banner Slider Display Option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_banner_display_setting',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_banner_section',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) ); 

// 1.1 Banner Post Selector
	Kirki::add_field( 'bazzinga_config', array(
			'type'        => 'select',
	        'settings'    => 'homepage_banner_post_display_setting',
	        'label'       => esc_html__('Select the Category to display Posts', 'bazzinga' ),
	        'section'     => 'homepage_banner_section',
	        'choices'	  => Kirki_Helper::get_terms( 'category' ),
	        'priority'    => 10,
	    ) );



/******** 2. Homepage design and develop section *************/
	
	// 2.0 Display Option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_design_and_develop_post_setting',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_design_and_develop_section',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );

	// 2.1 Post selector Custom Text
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'custom',
		'settings'    => 'design_and_develop_post_select_custom_text',
		'section'     => 'homepage_design_and_develop_section',
		'default'     => '<div style="padding: 20px;background-color: #333; color: #fff;">' . esc_html__( 'Left Side Section', 'bazzinga' ) . '</div>',
		'priority'    => 10,
	) );

	// 2.2 Page selector
	Kirki::add_field( 'bazzinga_config', array(
	        'type'        => 'dropdown-pages',
	        'settings'    => 'homepage_design_and_develop_post_display_setting',
	        'label'       => esc_html__('Select the Page to display', 'bazzinga' ),
	        'section'     => 'homepage_design_and_develop_section',
	        'priority'    => 10,
	    ) );
	 
	// 2.3 Right Side Content Custom Text
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'custom',
		'settings'    => 'design_and_develop_side_content_custom_text',
		'section'     => 'homepage_design_and_develop_section',
		'default'     => '<div style="padding: 20px;background-color: #333; color: #fff;">' . esc_html__( 'Right Side Section', 'bazzinga' ) . '</div>',
		'priority'    => 10,
	) );

	// 2.4 Post selector
	Kirki::add_field( 'bazzinga_config', array(
	        'type'        => 'dropdown-pages',
	        'settings'    => 'homepage_design_and_develop_right_post_display_setting',
	        'label'       => esc_html__('Select the Page to display', 'bazzinga' ),
	        'section'     => 'homepage_design_and_develop_section',
	        'priority'    => 10,
	    ) );



/*************** 3. Homepage Services Section ******************/

	// 3.0 Display Option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_services_post_display',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_services_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );

	// 3.1 Left Side Content Custom Text
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'custom',
		'settings'    => 'homepage_service_left_text_label',
		'section'     => 'homepage_services_section',
		'default'     => '<div style="padding: 20px;background-color: #333; color: #fff;">' . esc_html__( 'Left Side Section', 'bazzinga' ) . '</div>',
		'priority'    => 10,
	) );

	// 3.2 Left Text
	Kirki::add_field( 'bazzinga_config', array(
	        'type'        => 'dropdown-pages',
	        'settings'    => 'homepage_service_left_text',
	        'label'       => esc_html__('Select the Page to display Left Text', 'bazzinga' ),
	        'section'     => 'homepage_services_section',
	        'priority'    => 10,
	    ) );

	// 3.3 Right Side Content Custom Text
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'custom',
		'settings'    => 'homepage_service_right_text_label',
		'section'     => 'homepage_services_section',
		'default'     => '<div style="padding: 20px;background-color: #333; color: #fff;">' . esc_html__( 'Right Side Section', 'bazzinga' ) . '</div>',
		'priority'    => 10,
	) );

	// 3.4 Service Services category
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'select',
			'settings' => 'homepage_service_category_setting',
			'label'    => esc_html__( 'Select the Services Category', 'bazzinga'),
			'section'  => 'homepage_services_section',
			'choices'	  => Kirki_Helper::get_terms( 'category' ),
	        'priority'    => 10,
		) );


/**************** 4. Homepage Portfolio Section ***************/

	// 4.0 Display Option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_portfolio_section_display',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_portfolio_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );

	// 4.1 portfolio category selector
		Kirki::add_field( 'bazzinga_config', array(
				'type'     => 'select',
				'settings' => 'homepage_portfolio_cat',
				'label'    => esc_html__( 'Select the Portfolio Category', 'bazzinga'),
				'section'  => 'homepage_portfolio_section',
				'choices'	  => Kirki_Helper::get_terms( 'category' ),
		        'priority'    => 10,
			) );


/**************** 5. Homepage Work With Us Section ***************/

	// 5.0 Display option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_workwithus_section_display',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_work_with_us_section',
		'default'     => 'off',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );

	// 5.1 Work with us Top Title
		Kirki::add_field( 'bazzinga_config', array(
				'type'     => 'text',
				'settings' => 'homepage_portfolio_bottom_title',
				'label'    => esc_html__( 'Portfolio Bottom Title', 'bazzinga'),
				'section'  => 'homepage_work_with_us_section',
				'priority' => 10,
			) );

	// 5.2 Work with us Main Title
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'text',
			'settings' => 'homepage_portfolio_bottom_subtitle',
			'label'    => esc_html__( 'Portfolio Bottom Sub Text', 'bazzinga'),
			'section'  => 'homepage_work_with_us_section',
			'priority' => 10,
		) );

	// 5.3 Work with us Link Text
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'text',
			'settings' => 'homepage_portfolio_link_text',
			'label'    => esc_html__( 'Request a Quote url', 'bazzinga'),
			'section'  => 'homepage_work_with_us_section',
			'priority' => 10,
		) );




/************* 6. Homepage Our Approach Section **************/

	// 6.0 Disable Options
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_our_approach_display_setting',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_our_approach_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );


	//6.1 Our Approach category
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'select',
			'settings' => 'our_approach_category_setting',
			'label'    => esc_html__( 'Select the Category', 'bazzinga'),
			'section'  => 'homepage_our_approach_section',
			'choices'	  => Kirki_Helper::get_terms( 'category' ),
	        'priority'    => 10,
		) );



/************* 7. Homepage Our Team Section ****************/
	// 7.0 Display option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_team_section_display',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_our_team_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );

	//7.1 Our Team category
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'select',
			'settings' => 'our_team_category_setting',
			'label'    => esc_html__( 'Select the Category', 'bazzinga'),
			'section'  => 'homepage_our_team_section',
			'choices'	  => Kirki_Helper::get_terms( 'category' ),
	        'priority'    => 10,
		) );


/************ 8. Homepage Get In touch Section ***************/
	
	// 8.0 Display option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_getintouch_section_display',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_calltoaction_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Display', 'bazzinga' ),
			'off' => esc_attr__( 'Hide', 'bazzinga' ),
		),
	) );

	//8.1 Twitter left section Custom Text
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'custom',
		'settings'    => 'calltoaction_twitter_post_setting_custom_text',
		'section'     => 'homepage_calltoaction_section',
		'default'     => '<div style="padding: 20px;background-color: #333; color: 
							#fff;">' . esc_html__( 'Twitter Tweet Setting', 'bazzinga' ) . '</div>',
		'priority'    => 10,
	) );

	// 8.2 Twitter Left section
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'text',
			'settings' => 'homepage_calltoaction_twitter_shortcode',
			'label'    => esc_html__( 'Add shortcode for Instagram feeds', 'bazzinga' ),
			'section'  => 'homepage_calltoaction_section',
			'priority' => 10,
		) );

	//8.3 Contact form Custom Text
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'custom',
		'settings'    => 'calltoaction_contact_form_setting_custom_text',
		'section'     => 'homepage_calltoaction_section',
		'default'     => '<div style="padding: 20px;background-color: #333; color: 
							#fff;">' . esc_html__( 'Contact Form Setting', 'bazzinga' ) . '</div>',
		'priority'    => 10,
	) );

	// 8.4 Contact form right 
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'number',
			'settings' => 'homepage_calltoaction_contact_form_shortcode',
			'label'    => esc_html__( 'Enter contact form 7 id', 'bazzinga' ),
			'section'  => 'homepage_calltoaction_section',
			'priority' => 10,
		) );




/************* 9. Homepage Testimonials Section *********************/

	// 9.0 Display option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_testimonials_section_display',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_testimonials_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );

	//9.1 Testimonial category selector
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'select',
			'settings' => 'testimonial_category_setting',
			'label'    => esc_html__( 'Select the Category', 'bazzinga'),
			'section'  => 'homepage_testimonials_section',
			'choices'	  => Kirki_Helper::get_terms( 'category' ),
	        'priority'    => 10,
		) );



/************** 10. Homepage Blog Section *********************/
	// 10.0 Display option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_blog_section_display',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_blog_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Display', 'bazzinga' ),
			'off' => esc_attr__( 'Hide', 'bazzinga' ),
		),
	) );

	// 10.1 Blog Section category selector
	Kirki::add_field( 'bazzinga_config', array(
	        'type'        => 'select',
	        'settings'    => 'homepage_blog_post1_display_setting',
	        'label'       => esc_html__('Select the Blog Category to display posts', 'bazzinga' ),
	        'section'     => 'homepage_blog_section',
	        'choices'	  => Kirki_Helper::get_terms( 'category' ),
	        'priority'    => 10,
	    ) );


/*************** 11.Homepage Newsletter Section ******************/

	// 11.0 Disable Option
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'switch',
		'settings'    => 'homepage_newsletter_display_setting',
		'label'       => esc_html__('Choose whether to display this section', 'bazzinga' ),
		'section'     => 'homepage_newsletter_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'bazzinga' ),
			'off' => esc_html__( 'Hide', 'bazzinga' ),
		),
	) );

	//11.1 Newsletter section text setting Custom Text
	Kirki::add_field( 'bazzinga_config', array(
		'type'        => 'custom',
		'settings'    => 'newsletter_text_setting_custom_text',
		'section'     => 'homepage_newsletter_section',
		'default'     => '<div style="padding: 20px;background-color: #333; color: 
							#fff;">' . esc_html__( 'Newsletter Text Setting', 'bazzinga' ) . '</div>',
		'priority'    => 10,
	) );

	// 11.2 Newsletter shortcode
	Kirki::add_field( 'bazzinga_config', array(
			'type'     => 'textarea',
			'settings' => 'homepage_newsletter_shortcode',
			'label'    => esc_html__( 'Enter shorcode for your NEWSLETTER', 'bazzinga' ),
			'section'  => 'homepage_newsletter_section',
			'priority' => 10,
		) );