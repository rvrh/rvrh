<?php

function kotta_customize_register( $wp_customize ) {

	global $kottaPostsPagesArray;

	$wp_customize->add_setting( 'kotta_slider_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'kotta_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'kotta_slider_post',
		array(
			'label'      => __( 'Select post', 'kotta' ),
			'description' => __( 'Select a post/page you want to show in slider section', 'kotta' ),
			'settings'   => 'kotta_slider_post',
			'priority'   => 11,
			'section'    => 'business_page_header',
			'type'    => 'select',
			'choices' => $kottaPostsPagesArray,
		)
	) );	
	
	
}
add_action( 'customize_register', 'kotta_customize_register', 99 );	

$kottaPostsPagesArray = array(
	'select' => __('Select a post/page', 'kotta'),
);

$kottaPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$kottaPostsPagesQuery = new WP_Query( $kottaPostsPagesArgs );
	
if ( $kottaPostsPagesQuery->have_posts() ) :
							
	while ( $kottaPostsPagesQuery->have_posts() ) : $kottaPostsPagesQuery->the_post();
			
		$kottaPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$kottaPostsPagesTitle = get_the_title();
		}else{
				$kottaPostsPagesTitle = get_the_ID();
		}
		$kottaPostsPagesArray[$kottaPostsPagesId] = $kottaPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

function kotta_sanitize_post_selection( $value ){
	global $kottaPostsPagesArray;
    if ( ! array_key_exists( $value, $kottaPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}