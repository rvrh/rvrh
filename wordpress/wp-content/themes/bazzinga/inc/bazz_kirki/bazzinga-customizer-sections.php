<?php

/*****************************************************/
	// Bazzinga Theme Customizer All SECTIONS  //
/*****************************************************/



/**** Bazzinga Homepage Panel ****/
  
/*
 *	All sections customization 
 *	
 *	1. Homepage banner section
 *	2. Homepage design and develop section	
 *	3. Homepage Services Section
 *	4. Homepage Portfolio Section
 *  5. Homepage Work With Us Section 		
 *  6. Homepage Our Approach Section
 *	7. Homepage Our Team Section
 *	8. Homepage Get In Touch Section
 *	9. Homepage Testimonials Section
 *	10.Homepage Blog Section	
 *	11.Homepage Newsletter Section 
 */


/**	1. Homepage banner section **/
	Kirki::add_section( 'homepage_banner_section', array(
	    'title'          => esc_attr__( 'Homepage Banner section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) );



/** 2. Homepage design and develop section **/
	Kirki::add_section( 'homepage_design_and_develop_section', array(
	    'title'          => esc_html__( 'Homepage Design & Develop section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 


/** 3. Homepage Services Section **/
	Kirki::add_section( 'homepage_services_section', array(
	    'title'          => esc_html__( 'Homepage Services section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 


/** 4. Homepage Portfolio Section	 **/
	Kirki::add_section( 'homepage_portfolio_section', array(
	    'title'          => esc_html__( 'Homepage Portfolio section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 

/**	5. Homepage Work With Us Section **/
	Kirki::add_section( 'homepage_work_with_us_section', array(
	    'title'          => esc_html__( 'Homepage Work with us section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 

/**	6. Homepage Our Approach Section **/
	Kirki::add_section( 'homepage_our_approach_section', array(
	    'title'          => esc_html__( 'Homepage Our Approach section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 


/**	7. Homepage Our Team Section **/
	Kirki::add_section( 'homepage_our_team_section', array(
	    'title'          => esc_html__( 'Homepage Our Team section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 


/**	8. Homepage Get In Touch Section **/
	Kirki::add_section( 'homepage_calltoaction_section', array(
	    'title'          => esc_html__( 'Homepage Get In Touch section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 

/**	9. Homepage Testimonials Section **/
	Kirki::add_section( 'homepage_testimonials_section', array(
	    'title'          => esc_html__( 'Homepage Testimonials section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 

/**	10. Homepage Blog Section	**/
	Kirki::add_section( 'homepage_blog_section', array(
	    'title'          => esc_html__( 'Homepage Blog section', 'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 


/**	11.Homepage Newsletter Section 	**/
	Kirki::add_section( 'homepage_newsletter_section', array(
	    'title'          => esc_html__( 'Homepage Newsletter section', 
	    													'bazzinga' ),
	    'panel'          => 'homepage_panel',
	    'priority'       => 160,
	) ); 





/****  Bazzinga Footer Panel ****/
  
/*
 *
 *	All sections customization 
 *
 *	A1. Footer Contact Us Section
 *	A2. Footer Copyright Section
 *
 *
 *
 */


	/**	A1. Footer Contact Us Section	**/
		Kirki::add_section( 'footer_contact_us_section', array(
		    'title'          => esc_html__( 'Footer Contact Us section', 
		    													'bazzinga'),
		    'panel'          => 'footer_panel',
		    'priority'       => 160,
		) ); 

	/**	A2. Footer Copyright Section	**/
		Kirki::add_section( 'footer_copyright_section', array(
		    'title'          => esc_attr__( 'Footer Copyright section', 'bazzinga' ),
		    'panel'          => 'footer_panel',
		    'priority'       => 160,
		) ); 
