<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
    if (is_singular()) {
        echo '<h1 class="entry-title">';
    } 
    else {
        echo '<h2 class="entry-title">';
        // only link the post title if there are multiple post summaries on the page
        echo '<a href="';
        the_permalink();
        echo ' rel="bookmark">';
    }
?>
 

<?php the_title(); ?>

	
<?php
    if (is_singular()) {
        echo '</h1>';
    } 
    else {
        echo '</a></h2>';
    }
 ?>
 
<?php get_template_part('entry', 'meta'); ?>
	
<?php
    if (is_archive() || is_search()) {
        get_template_part('entry', 'summary');
    } 
    else {
        get_template_part('entry', 'content');
    }
?>
<?php
    if (is_single()) {
        get_template_part('entry-footer', 'single');
    } 
    else {
        get_template_part('entry-footer');
    }
?>
</div>
