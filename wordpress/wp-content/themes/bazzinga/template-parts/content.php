<?php
/**
 * Template part for displaying Standard Posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bazzinga
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ): if( ! is_single() ): ?>
			<div class="entry-meta">
				<?php if( has_tag() ){ ?>
					<div class="blog-cat">
						<i class="fas fa-tag"></i>
						<?php the_tags( '', ', ', '' ); ?>
					</div>
				<?php } ?>
				<div class="blog_date_author">
					<span class="blog_date"><i class="far fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?> </span>
					<span class="blog_author"><i class="fas fa-user"></i> <?php the_author(); ?> </span>
				</div>
			</div><!-- .entry-meta -->
		<?php endif; endif;?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if (! is_single() ) { ?>
			<figure>
				<?php if(has_post_thumbnail()){ ?>
					<img src="<?php echo esc_url(get_the_post_thumbnail_url( get_the_ID() ,'bazzinga_blog_image' )); ?>">
				<?php } ?>
				<?php the_category(); ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
			</figure>
			<div class="blog_excerpt">
				<?php the_excerpt(); ?>
			</div>
			<div class="readmore_blog">
				<a href="<?php the_permalink(); ?>" class="links bz-blue"><?php esc_html_e('Read More', 'bazzinga'); ?></a>
			</div>
		<?php }else{ ?>
			<figure>
				<?php if(has_post_thumbnail()){ ?>
					<img src="<?php echo esc_url(get_the_post_thumbnail_url( get_the_ID() ,'full' )); ?>">
				<?php } ?>					
			</figure>

			<div class="bazz_single_content row">
					<header class="bazz_single_meta entry-header col-md-12 col-lg-3 bazz_single_content__1">
						<div class="entry-meta">
						<?php the_category(); ?>
						<?php if( has_tag() ){ ?>
							<div class="blog-cat">
								<i class="fas fa-tag"></i>
								<?php the_tags( '', ', ', '' ); ?>
							</div>
						<?php } ?>
						<span class="blog_date">
							<i class="far fa-calendar"></i>
							<?php echo esc_html( get_the_date() ); ?>
						</span>
						<span class="blog_author">
							<i class="fas fa-user"></i>
							<?php the_author(); ?>
						</span>
						<?php
							if ( comments_open() ) {
						?>
						<span class="blog_comment_num">
							<i class="fas fa-comment"></i>
							<?php comments_number( 'no Comments', 'one Comment', '% Comments' ); ?>.
						</span>
						<?php } ?>
						<?php 
							if( function_exists ( '_simple_share_buttons_adder_add_action_links' ) ) : ?>
								<span class="social-share"> <?php echo do_shortcode( '[ssba-buttons]' ); ?></span>
						<?php endif; ?>
					</div>
					</header>
					<div class="blog_excerpt col-md-12 col-lg-9">
						<?php the_content(); ?>
					</div>
				</div>
		<?php }
		if( is_single() ): ?>
			<div class="bazz_author_wrap">
				<div class="author_img"><?php echo get_avatar(74); ?></div>
				<div class="author_content">
					<span class="written-by">Written by</span>
					<div class="author_name"><?php the_author(); ?></div>
					<div class="author_desc"><?php the_author_meta('description'); ?></div>
				</div>
			</div>

		<?php endif;

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'bazzinga' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->