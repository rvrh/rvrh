<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bazzinga
 */

?>

<!-- footer bottom section -->
<?php do_action('bazzinga_footer_bottom_sec'); ?>

<div class="bazzinga_move_to_top"> 
	<i class="fa fa-arrow-up"></i>
</div>


<!-- footer-copyright-section -->
<section class="footer_copyright_wrap">
	<div class="container">
		<div class="row">
		
			<div class="col-md-12 text-center">
				<?php 
				esc_html_e( 'Bazzinga WordPress Theme by', 'bazzinga' ); ?>
							<a href="<?php echo esc_url('https://blazethemes.com/'); ?>" target="_blank"><?php esc_html_e( 'Blaze Themes', 'bazzinga' ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php wp_footer(); ?>

</body>
</html>
