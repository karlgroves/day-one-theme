<?php
get_header();
?>

    <div id="content">
        <?php
        get_template_part('nav', 'above');
        ?>

        <?php while (have_posts()) : the_post() ?>

            <?php    if ( is_front_page() ) { ?>
                <div class="excerpt">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </div>
            <?php
            } else { ?>
                <h2><?php the_title(); ?></h2>
                <?php
                the_content();
            }
            ?>

        <?php endwhile; ?>

        <?php
        get_template_part('nav', 'below');
        ?>
    </div>

<?php
get_sidebar();
?>

<?php
get_footer();
?>