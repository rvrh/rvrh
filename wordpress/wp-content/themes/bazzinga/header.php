<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bazzinga
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php do_action( 'bazzinga_pre_loader_sec' ); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bazzinga' ); ?></a>

	<header id="masthead" class="site-header">

		<!-- top header phone and social links -->
		<?php do_action('bazzinga_top_header_social_sec'); ?>

		<!-- homepage-design-and-develop-section  --> 
		<?php do_action('bazzinga_navigation_header_sec'); ?>

		<!-- header-banner-custom-header --> 
		<?php do_action('bazzinga_header_banner_sec'); ?>
		 
	</header><!-- #masthead -->

		<div id="content" class="site-content">
	 
			<div class="search-wrap">
				<a href="javascript:void(0)" class="search-close"><i class="icon ion-ios-close-empty"></i></a>
				<?php echo get_search_form(); ?>
			</div>
