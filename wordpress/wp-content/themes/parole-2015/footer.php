<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the footer text for footer customization.
				 */
				do_action( 'twentyfifteen_credits' );
			?>
			<?php 
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				?><p><?php the_privacy_policy_link(); ?></p><?php
			}
			?>
			<p>&copy; <?php echo date("Y") ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved.', 'parole-2015'); ?></p>
			<p>
			<a href="<?php echo esc_url( __( 'https://wpneon.com/parole-2015-wordpress-child-theme/', 'parole-2015' ) ); ?>" class="imprint">
				<?php printf( __( 'Parole 2015 Theme.', 'parole-2015' ) ); ?>
			</a><span role="separator" aria-hidden="true"></span>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'parole-2015' ) ); ?>" class="imprint">
				<?php printf( __( 'Powered by %s', 'parole-2015' ), 'WordPress.' ); ?>
			</a></p>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
