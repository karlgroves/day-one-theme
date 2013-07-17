<div id="nav-above" class="navigation">
    <div class="nav-previous">
        <?php 
            previous_post_link( '%link', '<span class="meta-nav previous">&larr;</span> %title' );
        ?>
    </div>
    <div class="nav-next">
        <?php 
            next_post_link( '%link', '%title <span class="meta-nav next">&rarr;</span>' ); 
        ?>
    </div>
</div>