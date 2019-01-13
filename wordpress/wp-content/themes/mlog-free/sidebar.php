<?php
    if ( is_active_sidebar('sidebar') ) {
        echo '<div id="sidebar" class="col col-4 col-tb-12">';
            dynamic_sidebar( 'sidebar' );
        echo '</div>';
    }
?>