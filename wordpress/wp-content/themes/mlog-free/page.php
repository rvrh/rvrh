<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div id="main-content" class="<?php echo esc_attr( mlogfree_main_class() ); ?>">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title_attribute(); ?></h1>
                    <?php the_content(); ?>
                    <?php 
                        if ( comments_open() || get_comments_number() ) :
                            echo '<div id="comments" class="post-comment">';
                                comments_template();
                            echo '</div>';
                        endif; 
                    ?>
                <?php endwhile; endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>