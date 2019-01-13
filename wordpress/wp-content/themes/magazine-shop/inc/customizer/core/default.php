<?php
/**
 * Default theme options.
 *
 * @package magazine-shop
 */

if ( ! function_exists( 'magazine_shop_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function magazine_shop_get_default_theme_options() {

		$defaults = array();

		// Slider Section.
		$defaults['show_slider_section']				= 1;
		$defaults['slider_layout_option']				= 'full-width';
		$defaults['select_category_for_slider']			= 1;
		
		/*featured news section*/
		$defaults['show_featured_news_section']			= 0;
		$defaults['select_category_for_featured_news']	= 1;
		$defaults['featured_news_title']				= esc_html__('Featured Now','magazine-shop');

		/*layout*/
		$defaults['home_page_content_status']     	= 1;
		$defaults['enable_overlay_option']			= 1;
		$defaults['global_layout']					= 'right-sidebar';
		$defaults['excerpt_length_global']			= 30;
		$defaults['archive_layout']					= 'excerpt-only';
		$defaults['archive_layout_image']			= 'full';
		$defaults['single_post_image_layout']		= 'full';
        $defaults['read_more_button_text'] = esc_html__( 'Continue Reading', 'magazine-shop' );
		$defaults['pagination_type']				= 'default';
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'magazine-shop' );
		$defaults['number_of_footer_widget']		= 3;
		$defaults['breadcrumb_type']				= 'simple';
		$defaults['enable_preloader_option']		= 0;

		// Pass through filter.
		$defaults = apply_filters( 'magazine_shop_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
