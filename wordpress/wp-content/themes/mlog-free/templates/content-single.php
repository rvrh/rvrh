<article id="post-<?php the_ID(); ?>" <?php post_class('col col-12'); ?>>
    <h1 class="post-title">
        <?php the_title_attribute(); ?>
    </h1>
    <div class="post-meta">
        <?php mlogfree_post_meta_single(); ?>
    </div>
    <div class="post-content">
        <?php the_content(); ?>
        <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
    </div>
    <div class="post-info">
        <?php mlogfree_post_info(); ?>
    </div>
    <div class="post-related">
        <?php mlogfree_related_post(); ?>
    </div>
    <?php 
        if ( comments_open() || get_comments_number() ) :
            echo '<div id="comments" class="post-comment">';
				comments_template();
            echo '</div>';
		endif; 
	?>
</article>