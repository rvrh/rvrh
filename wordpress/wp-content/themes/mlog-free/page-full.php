<?php
/**
 * Template Name: Full Width Page
 */
 ?>
 
 <?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div id="main-content" class="col col-12">
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
        </div>
    </div>
<?php get_footer(); ?>