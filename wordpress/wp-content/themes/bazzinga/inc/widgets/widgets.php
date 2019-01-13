<?php
/**
 * Theme widgets.
 *
 * @package Bazzinga
 */

// Load widget base.
require_once get_template_directory() . '/inc/widgets/class-widget-fields.php';

if ( ! function_exists( 'bazzinga_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function bazzinga_load_widgets() {

		// Recent Posts widget.
		register_widget( 'Bazzinga_Recent_Posts_Widget' );
	}

endif;

add_action( 'widgets_init', 'bazzinga_load_widgets' );

// 1.0 Recent Post Widget
if ( ! class_exists( 'Bazzinga_Recent_Posts_Widget' ) ) :

	/**
	 * Recent posts widget Class.
	 *
	 * @since 1.0.0
	 */
	class Bazzinga_Recent_Posts_Widget extends Bazzinga_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'bazzinga_widget_recent_posts',
				'description'                 => __( 'Displays recent posts.', 'bazzinga' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'bazzinga' ),
					'type'  => 'text',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'bazzinga' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'bazzinga' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'bazzinga' ),
					'type'    => 'number',
					'default' => 4,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'disable_date' => array(
					'label'   => __( 'Disable Date', 'bazzinga' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'bazzinga-recent-posts', __( 'bazz: Recent Posts', 'bazzinga' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
				);
			if ( absint( $params['post_category'] ) > 0 ) {
				$qargs['cat'] = $params['post_category'];
			}
			$all_posts = get_posts( $qargs );

			?>
			<?php if ( ! empty( $all_posts ) ) :  ?>

				<?php global $post; ?>

				<div class="recent-posts-wrapper">

					<?php foreach ( $all_posts as $key => $post ) :  ?>
						<?php setup_postdata( $post ); ?>

						<div class="recent-posts-item">

							<?php if ( has_post_thumbnail() ) :  ?>
								<div class="recent-posts-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php
										$img_attributes = array(
											'class' => 'alignleft',
											);
										the_post_thumbnail('bazzinga_widget_post_img');
										?>
									</a>
								</div><!-- .recent-posts-thumb -->
							<?php endif ?>
							<div class="recent-posts-text-wrap">
								<h3 class="recent-posts-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3><!-- .recent-posts-title -->

								<?php if ( false === $params['disable_date'] ) :  ?>
									<div class="recent-posts-meta">

										<?php if ( false === $params['disable_date'] ) :  ?>
											<span class="recent-posts-date">
												<i class="far fa-calendar-alt"></i> <?php the_time( get_option( 'date_format' ) ); ?></span>
												<!-- .recent-posts-date -->
										<?php endif; ?>

									</div><!-- .recent-posts-meta -->
								<?php endif; ?>

							</div><!-- .recent-posts-text-wrap -->

						</div><!-- .recent-posts-item -->

					<?php endforeach; ?>

				</div><!-- .recent-posts-wrapper -->

				<?php wp_reset_postdata(); // Reset. ?>

			<?php endif; ?>

			<?php
			echo $args['after_widget'];

		}
	}
endif;