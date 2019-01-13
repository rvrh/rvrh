<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bazzinga
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row bazz_page_detail">

						<?php
						if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							$bazz_archive_count = 0;
							while ( have_posts() ) : the_post(); ?>
								<div class="col-md-6">
									<div class="article-post blog_wrap_single grid-layout <?php bazzinga_no_img_class(); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($bazz_archive_count); ?>">

									<?php 
									get_template_part( 'template-parts/content', get_post_format() );
									?>
									</div>
								</div>

								<?php 
								$bazz_archive_count = $bazz_archive_count+50;
								endwhile;
								?>
							<div class="col-md-12">
								<?php the_posts_navigation(); ?>
							</div>
						<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
					</div>
					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();