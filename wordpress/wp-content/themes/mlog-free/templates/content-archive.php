<article id="post-<?php the_ID(); ?>" <?php post_class('col col-6 col-mb-12'); ?>>
    <?php { ?>
        <a href="<?php the_permalink() ;?>">
            <?php the_post_thumbnail("mlogfree-thumbnail",array( "class" => 'items-thumbnail' ));?>
        </a>
    <?php } ?>
    <span class="items-category">
        <?php echo wp_kses_data( get_the_category_list() ); ?>
    </span>
    <h3 class="items-title">
        <a href="<?php the_permalink() ;?>" class="items-title" title="<?php the_title_attribute(); ?>">
            <?php the_title_attribute(); ?>
        </a>
    </h3>
    <div class="items-meta">
        <?php mlogfree_post_meta_archive(); ?>
    </div>
    <span class="items-desc">
        <?php echo the_excerpt(); ?>
    </span>
</article>