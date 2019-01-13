<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bazzinga
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row ">
					<div class="col-md-8">
						<div class="row bazz_page_detail">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

							<?php
							endif;

							$bazz_archive_count = 0;
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>

								<div class="col-md-6">
									<div class="article-post blog_wrap_single grid-layout <?php bazzinga_no_img_class(); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($bazz_archive_count); ?>">
											<?php 

										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
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
