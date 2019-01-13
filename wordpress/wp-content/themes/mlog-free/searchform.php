<form id="search-form" role="search" method="get" class="col col-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <input autocomplete="off" type="text" name="s" id="search-keyword" class="form-control" placeholder="<?php esc_attr_e('Search ...', 'mlog-free'); ?>" required>
        <button id="search-submit" type="submit" class="search fas"></button>
    </div>
</form>