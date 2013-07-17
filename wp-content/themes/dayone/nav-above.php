<?php 
    if ( is_paged() ) { 
?>
<div id="nav-above" class="navigation">
    <div class="nav-previous">
        <?php 
            next_posts_link(sprintf(__( '%s older articles', 'dayone' ),'<span class="meta-nav previous">&larr;</span>')); 
        ?>
    </div>
    <div class="nav-next">
        <?php 
            previous_posts_link(sprintf(__( 'newer articles %s', 'dayone' ),'<span class="meta-nav next">&rarr;</span>')); 
        ?>
    </div>
</div>
<?php 
    } 
?>