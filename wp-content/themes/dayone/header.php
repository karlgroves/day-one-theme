<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset=<?php bloginfo('charset'); ?>" />


<title>
<?php 
    wp_title(' | ', true, 'right'); 
?>
</title>

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

<?php 
    wp_head(); 
?>

</head>


<body <?php body_class(); ?>>
<a href="#container" id="skiplink">Skip to Content</a>

<div id="wrapper" class="hfeed">

<header>

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
    bloginfo( 'name' ); 
?>
</a>

<?php    
    if (is_singular()) {
        //
    } 
    else {
        echo '</h1>';
    }
?>
</div>


<?php 
    // print the description only if there is one.
    $desc = get_bloginfo( 'description' ); 
    if(strlen(trim($desc)) > 1){
        echo '<p id="site-description">' . $desc . '</p>';
    }
?>

</div>

<nav>

<div id="search">

<?php 
    get_search_form(); 
?>

</div>

<?php 
    wp_nav_menu(array('theme_location' => 'main-menu')); 
?>

</nav>

</header>

<main id="container">