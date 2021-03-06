<?php

add_editor_style('style.css');

add_action('after_setup_theme', 'dayone_setup');
/**
 * Sets up the theme
 */
function dayone_setup()
{
    load_theme_textdomain('dayone', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 640;
    }
    register_nav_menus(array('main-menu' => __('Main Menu', 'dayone')));
}


add_action('comment_form_before', 'dayone_enqueue_comment_reply_script');
/**
 *
 */
function dayone_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}


add_filter('the_title', 'dayone_title');
/**
 * @param $title
 *
 * @return string
 */
function dayone_title($title)
{
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
}


add_filter('wp_title', 'dayone_filter_wp_title');
/**
 * @param $title
 *
 * @return string
 */
function dayone_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}


add_filter('comment_form_defaults', 'dayone_comment_form_defaults');
/**
 * @param $args
 *
 * @return mixed
 */
function dayone_comment_form_defaults($args)
{
    $req = get_option('require_name_email');
    $required_text = sprintf(' ' . __('Required fields are marked %s', 'dayone'), '<span class="required">*</span>');
    $args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'dayone') . ($req ? $required_text : '') . '</p>';
    $args['title_reply'] = __('Post a Comment', 'dayone');
    $args['title_reply_to'] = __('Post a Reply to %s', 'dayone');
    return $args;
}


add_action('init', 'dayone_add_shortcodes');
/**
 *
 */
function dayone_add_shortcodes()
{
    add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
    add_shortcode('caption', 'fixed_img_caption_shortcode');
    add_filter('img_caption_shortcode', 'dayone_img_caption_shortcode_filter', 10, 3);
    add_filter('widget_text', 'do_shortcode');

    //Register Scripts
    wp_register_script('dayone-modernizer', get_template_directory_uri() . '/js/modernizr.js', array(), 1, false);
    wp_register_script('dayone', get_template_directory_uri() . '/js/dayone.js', array('jquery'), 1, true);

    //Register CSS file
    wp_register_style('dayone-normalize', get_template_directory_uri() . '/normalize.css', array(), 1, 'all');
    wp_register_style('dayone', get_stylesheet_uri(), array(), 1, 'all');
}

/**
 * @param      $val
 * @param      $attr
 * @param null $content
 *
 * @return string
 */
function dayone_img_caption_shortcode_filter($val, $attr, $content = null)
{
    extract(shortcode_atts(array(
            'id' => '',
            'align' => '',
            'width' => '',
            'caption' => ''
        ),
        $attr));

    if (1 > (int)$width || empty($caption)) {
        return $val;
    }

    $capid = '';

    if ($id) {
        $id = esc_attr($id);
        $capid = 'id="figcaption_' . $id . '" ';
        $id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
    }

    return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
    . (10 + (int)$width) . 'px">' . do_shortcode($content) . '<figcaption ' . $capid
    . 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}


add_action('widgets_init', 'dayone_widgets_init');
/**
 *
 */
function dayone_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'dayone'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}


$preset_widgets = array(
    'primary-aside' => array('search', 'pages', 'categories', 'archives'),
);

/**
 *
 */
function dayone_get_page_number()
{
    if (get_query_var('paged')) {
        print ' <span class="meta-sep">&nbsp;</span> ' . __('Page ', 'dayone') . get_query_var('paged');
    }
}

/**
 * @param $glue
 *
 * @return bool|string
 */
function dayone_catz($glue)
{
    $current_cat = single_cat_title('', false);
    $separator = "\n";
    $cats = explode($separator, get_the_category_list($separator));
    foreach ($cats as $i => $str) {
        if (strstr($str, ">$current_cat<")) {
            unset($cats[$i]);
            break;
        }
    }

    if (empty($cats)) {
        return false;
    }

    return trim(join($glue, $cats));
}

/**
 * @param $glue
 *
 * @return bool|string
 */
function dayone_tag_it($glue)
{
    $current_tag = single_tag_title('', '', false);
    $separator = "\n";
    $tags = explode($separator, get_the_tag_list("", "$separator", ""));
    foreach ($tags as $i => $str) {
        if (strstr($str, ">$current_tag<")) {
            unset($tags[$i]);
            break;
        }
    }

    if (empty($tags)) {
        return false;
    }

    return trim(join($glue, $tags));
}

/**
 *
 */
function dayone_commenter_link()
{
    $commenter = get_comment_author_link();
    if (ereg('<a[^>]* class=[^>]+>', $commenter)) {
        $commenter = preg_replace('/(<a[^>]* class=[\'"]?)/', '\\1url ', $commenter);
    } else {
        $commenter = preg_replace('/(<a )/', '\\1class="url "', $commenter);
    }

    $avatar_email = get_comment_author_email();
    $avatar = str_replace("class='avatar", "class='photo avatar", get_avatar($avatar_email, 80));
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}

/**
 * @param $comment
 * @param $args
 * @param $depth
 */
function dayone_custom_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
    <div class="comment-author vcard"><?php dayone_commenter_link(); ?></div>
    <div
        class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'dayone'), get_comment_date(), get_comment_time()); ?>
        <span class="meta-sep">&nbsp;</span> <a href="#comment-<?php echo get_comment_ID(); ?>"
                                                title="<?php _e('Permalink to this comment', 'dayone'); ?>"><?php _e('Permalink', 'dayone'); ?></a>
        <?php edit_comment_link(__('Edit', 'dayone'), ' <span class="meta-sep">&nbsp;</span> <span class="edit-link">', '</span>'); ?>
    </div>
    <?php
    if ($comment->comment_approved == '0') {
        echo '<span class="unapproved">';
        _e('Your comment is awaiting moderation.', 'dayone');
        echo '</span>\n';
    }
    ?>
    <div class="comment-content">
        <?php comment_text() ?>
    </div>
    <?php
    if ($args['type'] == 'all' || get_comment_type() == 'comment') :
        comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'dayone'), 'login_text' => __('Login to reply.', 'dayone'), 'depth' => $depth, 'before' => '<div class="comment-reply-link">', 'after' => '</div>')));
    endif;
    ?>
<?php
}

/**
 * @param $comment
 * @param $args
 * @param $depth
 */
function dayone_custom_pings($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    <div
        class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'dayone'), get_comment_author_link(), get_comment_date(), get_comment_time());
        edit_comment_link(__('Edit', 'dayone'), ' <span class="meta-sep">&nbsp;</span> <span class="edit-link">', '</span>');
        ?></div>
    <?php
    if ($comment->comment_approved == '0') {
        echo '<span class="unapproved">';
        _e('Your trackback is awaiting moderation.', 'dayone');
        echo '</span>\n';
    }
    ?>
    <div class="comment-content">
        <?php comment_text() ?>
    </div>
<?php
}


// remove the manifest file from the <head>
// seems the only people interested in this are script kiddies
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');