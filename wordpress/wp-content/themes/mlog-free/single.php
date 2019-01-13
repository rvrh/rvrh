<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div id="main-content" class="<?php echo esc_attr( mlogfree_main_class() ); ?>">
            <div class="row">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'templates/content', 'single' ); ?>
                <?php endwhile; else : ?>
                    <?php get_template_part( 'templates/content', 'none' ); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>