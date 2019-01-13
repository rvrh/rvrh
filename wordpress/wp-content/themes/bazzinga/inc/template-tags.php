<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bazzinga
 */

if ( ! function_exists( 'bazzinga_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function bazzinga_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'bazzinga' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'bazzinga' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'bazzinga_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bazzinga_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bazzinga' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<i class="fas fa-folder-open"></i> <span class="cat-links">' . esc_html__( 'Posted in %1$s', 'bazzinga' ) . '</span> ', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bazzinga' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( ' <i class="fas fa-tag"></i><span class="tags-links">' . esc_html__( 'Tagged %1$s', 'bazzinga' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"><i class="fas fa-comment"></i> ';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bazzinga' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bazzinga' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'bazzinga_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function bazzinga_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</a>

	<?php endif; // End is_singular().
}
endif;

// for preloader
add_action('bazzinga_pre_loader_sec', 'bazzinga_pre_loader_sec_fnc');

// for top header
add_action('bazzinga_top_header_social_sec', 'bazzinga_top_header_social_sec_fnc');

// for navigation
add_action('bazzinga_navigation_header_sec', 'bazzinga_navigation_header_fnc');

// for banner header
add_action( 'bazzinga_header_banner_sec', 'bazzinga_header_banner_sec_fnc' );

// for banner header homepage one
add_action( 'bazzinga_home_banner_sec_creative', 'bazzinga_home_banner_sec_creative_fnc' );

// for banner header homepage two
add_action( 'bazzinga_home_banner_sec_business', 'bazzinga_home_banner_sec_business_fnc' );

// for home page banner section
add_action('bazzinga_home_banner_sec_classic','bazzinga_home_banner_sec_classic_fnc');

// for homepage design develop section
add_action('bazzinga_home_design_develop_sec','bazzinga_home_design_develop_sec_fnc');

// for homepage services section
add_action('bazzinga_home_services_sec', 'bazzinga_home_services_sec_fnc');

// for homepage portfolio section
add_action('bazzinga_home_porfolio_sec', 'bazzinga_home_porfolio_sec_fnc');

// for homepage cta section
add_action('bazzinga_home_workwithus_sec', 'bazzinga_home_workwithus_sec_fnc');

// for homepage our approach section
add_action('bazzinga_home_approach_sec', 'bazzinga_home_approach_sec_fnc');

// for homepage team section
add_action('bazzinga_home_team_sec', 'bazzinga_home_team_sec_fnc');

//for homepage cta section
add_action('bazzinga_home_cta_sec', 'bazzinga_home_cta_sec_fnc');

// for testimonial section
add_action('bazzinga_home_testimonial_sec', 'bazzinga_home_testimonial_sec_fnc');

// for blog section
add_action('bazzinga_home_blog_sec', 'bazzinga_home_blog_sec_fnc');

// for subscription section
add_action('bazzinga_home_newsletter_sec', 'bazzinga_home_newsletter_sec_fnc');

//for footer top section
add_action('bazzinga_footer_top_sec', 'bazzinga_footer_top_sec_fnc');

//for footer bottom section
add_action('bazzinga_footer_bottom_sec', 'bazzinga_footer_bottom_sec_fnc');


// for innerpage services
add_action('bazzinga_innerpage_services_sec', 'bazzinga_innerpage_services_sec_fnc');

// for innerpage team
add_action('bazzinga_inner_team_sec', 'bazzinga_inner_team_sec_fnc');

// for about page inner page section
add_action('bazzinga_inner_about_sec', 'bazzinga_inner_about_sec_fnc');
