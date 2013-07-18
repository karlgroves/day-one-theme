<div class="entry-summary">
<?php 
    the_excerpt(sprintf(__('continue reading %s', 'dayone'), '<span class="meta-nav previous">&nbsp;</span>')); 
?>
<?php
    if (is_search()) {
        wp_link_pages('before=<div class="page-link">' . __('Pages:', 'dayone') . '&after=</div>');
    }
?>
</div>
