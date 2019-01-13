<?php get_header(); ?>
    <?php mlogfree_feature_post(); ?>
    <div class="container">
        <div class="row">
            <div id="main-content" class="<?php echo esc_attr( mlogfree_main_class() ); ?>">
                <div class="row small-tb">
                    <div class="col col-12">
                        <h2><?php esc_attr_e( 'Latest New Post', 'mlog-free' ); ?></h2>
                    </div>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'templates/content', 'archive' ); ?>
                    <?php endwhile; else : ?>
                        <?php get_template_part( 'templates/content', 'none' ); ?>
                    <?php endif; ?>
                </div>
                <?php the_posts_pagination( 
                    array(
                        'prev_text' => '<i class="fa fa-arrow-left icon icon-arrow-left" aria-hidden="true"></i>' . '<span class="screen-reader-text">' . __( 'Previous page', 'mlog-free' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'mlog-free' ) . '</span>' . '<i class="fa fa-arrow-right icon icon-arrow-right" aria-hidden="true"></i>',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mlog-free' ) . ' </span>',
                    )
                ); ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>