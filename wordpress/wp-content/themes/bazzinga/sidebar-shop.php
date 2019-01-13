<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bcorporate
 */

if ( ! is_active_sidebar( 'bazzinga_shop_sidebar' ) ) {
	return;
}
?>
<div class="col-md-4">
	<aside id="bazzinga_shop_sidebar" class="bazzinga_shop_sidebar bazz_sidebar">
		<?php dynamic_sidebar( 'bazzinga_shop_sidebar' ); ?>
	</aside><!-- #secondary -->
</div>
</div> <!-- row wrap -->