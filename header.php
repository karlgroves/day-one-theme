<!DOCTYPE html>

<html <?php
language_attributes();
?>

    dir="<?php bloginfo('text_direction'); ?>">

<head>

    <meta charset="<?php bloginfo('charset'); ?>"/>


    <title>
        <?php
        wp_title(' - ', true, 'right');
        ?>
    </title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>


    <?php
    // prevent bots from indexing search results
    if (is_search()) {
        ?>
        <meta name="robots" content="noindex, nofollow"/>
    <?php
    }
    ?>

    <meta name="description" content="<?php if (is_single()) {
        single_post_title('', true);
    } else {
        bloginfo('name');
        echo " - ";
        bloginfo('description');
    }
    ?>"/>


    <?php if (is_single()) {
        ?>

        <meta name="revised" content="<?php the_date(); ?>"/>

        <meta name="url" content="<?php the_permalink(); ?> "/>

    <?php
    }
    ?>

    <?php
    /**
     * The below call to modernizr includes a modernizr script that includes every feature available
     * In final implementations, you should generate your own custom Modernizr script that has the
     * features you need.  Go to http://modernizr.com/ for more info
     */
    wp_enqueue_script('dayone-modernizer');
    wp_enqueue_script('dayone');
    wp_enqueue_style('dayone-normalize');
    wp_enqueue_style('dayone');
    wp_head();
    ?>

</head>


<body <?php body_class(); ?>>
<a id="skiplink" href="#content">
    <?php
    _e('Skip to content', 'dayone');
    ?>
</a>

<div id="wrapper" class="hfeed">

    <header role="banner">

        <div id="branding">

            <div id="site-title">
                <?php
                if (is_singular()) {
                    //
                } else {
                    echo '<h1>';
                }
                ?>

                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php
                    bloginfo('name');
                    ?>
                </a>

                <?php
                if (is_singular()) {
                    //
                } else {
                    echo '</h1>';
                }
                ?>
            </div>
            <!--// END #site-title //-->


            <?php
            // print the description only if there is one.
            $desc = get_bloginfo('description');
            if (strlen(trim($desc)) > 1) {
                echo '<p id="site-description">' . $desc . '</p>';
            }
            ?>

        </div>
        <!--// END #branding //-->


        <div id="search">

            <?php
            get_search_form();
            ?>

        </div>
        <!--// END #search //-->

        <nav role="navigation" id="header-nav">

            <?php
            wp_nav_menu(array('theme_location' => 'main-menu'));
            ?>

        </nav>

    </header>

    <main id="container" role="main">