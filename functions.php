<?php

add_action('after_setup_theme', 'purevibestyle_setup');
function purevibestyle_setup()
{
    load_theme_textdomain('purevibestyle', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'navigation-widgets'));
    add_theme_support('appearance-tools');
    add_theme_support('woocommerce');
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'purevibestyle')));
}

add_action('wp_body_open', 'purevibestyle_skip_link', 5);
function purevibestyle_skip_link()
{
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'purevibestyle') . '</a>';
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'purevibestyle_image_insert_override');
function purevibestyle_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}


// дозволяє завантажувати svg до адмінки вордпрес
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');


function remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

//disable jquery migrate
function disable_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
}
add_action('wp_default_scripts', 'disable_jquery_migrate');


//remove jquery
function remove_jquery()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'remove_jquery', 100);


//init jquery
// function theme_add_jquery()
// {
//     wp_enqueue_script('jquery');
// }
// add_action('wp_enqueue_scripts', 'theme_add_jquery');



require_once get_template_directory() . '/inc/scripts.php';
require_once get_template_directory() . '/inc/sendEmail.php';
