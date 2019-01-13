<?php
/**
 * Template Name: Homepage Creative
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bazzinga
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<main role="main">

<!-- homepage-design-and-develop-section  --> 
<?php 
if ( true == get_theme_mod( 'homepage_design_and_develop_post_setting', true ) ) :
	do_action('bazzinga_home_design_develop_sec'); 
endif;
?>

<!-- homepage-services-section  --> 
<?php 
if ( true == get_theme_mod( 'homepage_services_post_display', true ) ) : 
	do_action('bazzinga_home_services_sec');
endif;
?>

<!-- homepage-portfolio-section -->
<?php 
if ( true == get_theme_mod( 'homepage_portfolio_section_display', true ) ) : 
	do_action('bazzinga_home_porfolio_sec');
endif;
?>

<!-- homepage-cta-section -->
<?php
if ( true == get_theme_mod( 'homepage_workwithus_section_display', true ) ) : 
	do_action('bazzinga_home_workwithus_sec');
endif;
?>


<!-- homepage-our-approach-section -->
<?php 
if ( true == get_theme_mod( 'homepage_our_approach_display_setting', true ) ) :
	do_action( 'bazzinga_home_approach_sec' );
endif; ?>

<!-- homepage team section -->
<?php if ( true == get_theme_mod( 'homepage_team_section_display', true )):
	do_action('bazzinga_home_team_sec');
endif; ?>

<!-- homepage-get-in-touch-section -->
<?php if ( true == get_theme_mod( 'homepage_getintouch_section_display', true )):
	do_action('bazzinga_home_cta_sec');
endif; ?>


<!-- homepage-testimonials-section -->
<?php if ( true == get_theme_mod( 'homepage_testimonials_section_display', true )):
	do_action( 'bazzinga_home_testimonial_sec' );
endif; ?>


<!-- homepage-blog-section -->
<?php if ( true == get_theme_mod( 'homepage_blog_section_display', true )):
	do_action( 'bazzinga_home_blog_sec' );
endif; ?>

<!-- homepage-newsletter-section -->
<?php if ( true == get_theme_mod( 'homepage_newsletter_display_setting', true ) ) :
	do_action( 'bazzinga_home_newsletter_sec' );
endif; ?>




<!-- footer top section -->
<?php do_action('bazzinga_footer_top_sec'); ?>

</main> <!-- Main -->

<?php endwhile;	 ?>

<?php get_footer(); ?>
