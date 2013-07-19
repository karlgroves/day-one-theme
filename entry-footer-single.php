<div class="entry-footer">
<?php
    printf(__('This article was posted in %1$s%2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>. 
        Follow comments with the <a href="%4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'dayone'), 
        get_the_category_list(', '), 
        get_the_tag_list(__(' and tagged ', 'dayone'), ', ', ''), 
        get_permalink(), 
        get_post_comments_feed_link());
    
    if (comments_open() && pings_open()) :
        printf(__('<a class="comment-link" href="#respond">Post a Comment</a> or leave a trackback: <a class="trackback-link" href="%s" rel="trackback">Trackback URL</a>.', 'dayone'), get_trackback_url());
    
    elseif (!comments_open() && pings_open()) :
        printf(__('Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" rel="trackback">Trackback URL</a>.', 'dayone'), get_trackback_url());
    
    elseif (comments_open() && !pings_open()) :
        _e('Trackbacks are closed, but you can <a class="comment-link" href="#respond">Post a Comment</a>.', 'dayone');
    
    elseif (!comments_open() && !pings_open()) :
        _e(' Both comments and trackbacks are closed.', 'dayone');
    
    endif;
    
    edit_post_link(__('Edit', 'dayone'), "<span class=\"edit-link\">", "</span>");
?>
</div>
