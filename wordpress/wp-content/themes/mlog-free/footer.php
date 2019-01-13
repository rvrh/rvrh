</div>
<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <?php if ( is_active_sidebar('footer-1') ) { ?>
                    <div class="col col-<?php echo esc_attr( mlogfree_footer_class() ); ?> col-mb-12 col-mb-top">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                <?php } ?>
                <?php if ( is_active_sidebar('footer-2') ) { ?>
                    <div class="col col-<?php echo esc_attr( mlogfree_footer_class() ); ?> col-mb-12 col-mb-top">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div>
                <?php } ?>
                <?php if ( is_active_sidebar('footer-3') ) { ?>
                    <div class="col col-<?php echo esc_attr( mlogfree_footer_class() ); ?> col-mb-12">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>