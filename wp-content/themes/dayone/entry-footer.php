<?php 
    global $post; 
    if ( 'post' == $post->post_type ) : 
?>

<div class="entry-footer">

<?php 
    if ( is_category() && $catz = dayone_catz(', ') ) : // 
?>
<span class="cat-links">
<?php 
    printf(__('Also posted in %s', 'dayone'), $catz); 
?>
</span>

<span class="meta-sep"> | </span>

<?php else : ?>
    
<span class="cat-links"><span class="entry-footer-prep entry-footer-prep-cat-links">
<?php 
    _e('Posted in ', 'dayone'); 
?>
</span>

<?php echo get_the_category_list(', '); ?></span>

<span class="meta-sep"> | </span>

<?php endif; ?>


<?php 
    if ( is_tag() && $tag_it = dayone_tag_it(', ') ) : // 
?>
<span class="tag-links">
<?php 
    printf(__('Also tagged %s', 'dayone'), $tag_it); 
?>
</span>

<?php else : ?>

<?php 
    the_tags('<span class="tag-links"><span class="entry-footer-prep entry-footer-prep-tag-links">' . __('Tagged ', 'dayone') . '</span>', ", ", "</span><span class=\"meta-sep\"> | </span>\n"); 
?>

<?php endif; ?>

<span class="comments-link">
<?php 
    comments_popup_link(__('Leave a comment', 'dayone'), __('1 Comment', 'dayone'), __('% Comments', 'dayone')); 
?>
</span>

<?php 
    edit_post_link(__('Edit', 'dayone'), "<span class=\"meta-sep\"> | </span><span class=\"edit-link\">", "</span>"); 
?>
</div>
<?php endif; ?>