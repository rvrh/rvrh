<?php
/**
 * Template Name: Aboutus page
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

<!-- Innerpage-services-section --> 
<?php 
//if ( true == get_theme_mod( 'inner_services_post_display', true ) ) : 
	do_action('bazzinga_innerpage_services_sec');
//endif;
?>

<!--- about  sub pages -->
<?php do_action('bazzinga_inner_about_sec'); ?>

<!-- About page content -->
<section class="about_cta_section if-bg text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12" data-aos="fade-up">
			<?php
				the_content();
			?>
			</div>
		</div>
	</div>
</section>

<!-- Innerpage-team-section --> 
<?php 
//if ( true == get_theme_mod( 'inner_team_post_display', true ) ) : 
	do_action('bazzinga_inner_team_sec');
//endif;
?>


<!-- footer top section -->
<?php do_action('bazzinga_footer_top_sec'); ?>

</main> <!-- Main -->

<?php endwhile;	 ?>

<?php get_footer(); ?>