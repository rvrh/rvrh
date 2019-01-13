<?php
/**
 * Implement theme metabox.
 *
 * @package Magazine Shop
 */

if ( ! function_exists( 'magazine_shop_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function magazine_shop_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'magazine-shop-theme-settings',
				esc_html__( 'Single Page/Post Settings', 'magazine-shop' ),
				'magazine_shop_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'magazine_shop_add_theme_meta_box' );

if ( ! function_exists( 'magazine_shop_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function magazine_shop_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$magazine_shop_post_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'magazine_shop_meta_box_nonce' );
		// Fetch Options list.
		$page_layout = get_post_meta($post_id,'magazine-shop-meta-select-layout',true);
		$page_image_layout = get_post_meta($post_id,'magazine-shop-meta-image-layout',true);
	?>
	<div id="magazine-shop-settings-metabox-container" class="magazine-shop-settings-metabox-container">
		<div id="magazine-shop-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'magazine-shop' ); ?></h4>
			<div class="magazine-shop-row-content">
			     <!-- Select Field-->
			        <p>
			            <label for="magazine-shop-meta-select-layout" class="magazine-shop-row-title">
			                <?php _e( 'Single Page/Post Layout', 'magazine-shop' )?>
			            </label>
			            <select name="magazine-shop-meta-select-layout" id="magazine-shop-meta-select-layout">
				            <option value="left-sidebar" <?php selected('left-sidebar',$page_layout);?>>
				            	<?php _e( 'Primary Sidebar - Content', 'magazine-shop' )?>
				            </option>
				            <option value="right-sidebar" <?php selected('right-sidebar',$page_layout);?>>
				            	<?php _e( 'Content - Primary Sidebar', 'magazine-shop' )?>
				            </option>
				            <option value="no-sidebar" <?php selected('no-sidebar',$page_layout);?>>
				            	<?php _e( 'No Sidebar', 'magazine-shop' )?>
				            </option>
			            </select>
			        </p>

		         <!-- Select Field-->
		            <p>
		                <label for="magazine-shop-meta-image-layout" class="magazine-shop-row-title">
		                    <?php _e( 'Single Page/Post Image Layout', 'magazine-shop' )?>
		                </label>
                        <select name="magazine-shop-meta-image-layout" id="magazine-shop-meta-image-layout">
            	            <option value="full" <?php selected('full',$page_image_layout);?>>
            	            	<?php _e( 'Full', 'magazine-shop' )?>
            	            </option>
            	            <option value="left" <?php selected('left',$page_image_layout);?>>
            	            	<?php _e( 'Left', 'magazine-shop' )?>
            	            </option>
            	            <option value="right" <?php selected('right',$page_image_layout);?>>
            	            	<?php _e( 'Right', 'magazine-shop' )?>
            	            </option>
            	            <option value="no-image" <?php selected('no-image',$page_image_layout);?>>
            	            	<?php _e( 'No Image', 'magazine-shop' )?>
            	            </option>
                        </select>
		            </p>
			</div><!-- .magazine-shop-row-content -->
		</div><!-- #magazine-shop-settings-metabox-tab-layout -->
	</div><!-- #magazine-shop-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'magazine_shop_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function magazine_shop_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['magazine_shop_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['magazine_shop_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$magazine_shop_meta_select_layout =  isset( $_POST[ 'magazine-shop-meta-select-layout' ] ) ? esc_attr($_POST[ 'magazine-shop-meta-select-layout' ]) : '';
		if(!empty($magazine_shop_meta_select_layout)){
			update_post_meta($post_id, 'magazine-shop-meta-select-layout', sanitize_text_field($magazine_shop_meta_select_layout));
		}
		$magazine_shop_meta_image_layout =  isset( $_POST[ 'magazine-shop-meta-image-layout' ] ) ? esc_attr($_POST[ 'magazine-shop-meta-image-layout' ]) : '';
		if(!empty($magazine_shop_meta_image_layout)){
			update_post_meta($post_id, 'magazine-shop-meta-image-layout', sanitize_text_field($magazine_shop_meta_image_layout));
		}
	}

endif;

add_action( 'save_post', 'magazine_shop_save_theme_settings_meta', 10, 2 );