<?php
global $authordata;
?>
<div class="entry-meta">

<span class="meta-prep meta-prep-author">
<?php
_e('By', 'dayone');
?>
</span>

<span class="author vcard">
    <a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
        <?php the_author(); ?>
    </a>
</span>

    <span class="meta-sep">&nbsp;</span>

<span class="meta-prep meta-prep-entry-date">
<?php
_e('Published', 'dayone');
?> 
</span>

<span class="entry-date">
    <?php the_time(get_option('date_format')); ?>
</span>

    <?php
    edit_post_link(__('Edit', 'dayone'), "<span class=\"meta-sep\">&nbsp;</span><span class=\"edit-link\">", "</span>");
    ?>

</div>