<?php

function mytheme_preload_fonts()
{
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/fonts/NunitoSans-Regular.woff2" as="font" type="font/woff2" crossorigin>';
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/fonts/NunitoSans-SemiBold.woff2" as="font" type="font/woff2" crossorigin>';
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/fonts/NunitoSans-ExtraBold.woff2" as="font" type="font/woff2" crossorigin>';
}
add_action('wp_head', 'mytheme_preload_fonts');




add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{

    wp_enqueue_style('style-file', get_template_directory_uri() . '/scss/main.css', [], filemtime(get_template_directory() . '/scss/main.css'));
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', [], filemtime(get_template_directory() . '/js/main.js'), true);
    // wp_enqueue_style('fonts', get_template_directory_uri() . '/style.css');
}


// додає type="module" для main.js
function add_module_type_to_script($tag, $handle, $src)
{

    if ('main' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_module_type_to_script', 10, 3);


// Notiflix styles + scripts
function enqueue_notiflix_assets()
{
    add_action('wp_head', function () {
        echo '
        <link rel="stylesheet" href="' . get_template_directory_uri() . '/libs/notiflix/notiflix-3.2.4.min.css" media="print" onload="this.onload=null;this.media=\'all\';">
        ';
    });

    add_action('wp_footer', function () {
        echo '
        <script defer src="' . get_template_directory_uri() . '/libs/notiflix/notiflix-3.2.4.min.js"></script>
        ';
    });
}

// Swiper styles + scripts
function enqueue_swiper_assets()
{
    add_action('wp_head', function () {
        echo '
        <link rel="stylesheet" href="' . get_template_directory_uri() . '/libs/swiper/swiper-bundle.min.css" media="print" onload="this.onload=null;this.media=\'all\';">
        ';
    });

    add_action('wp_footer', function () {
        echo '
        <script defer src="' . get_template_directory_uri() . '/libs/swiper/swiper-bundle.min.js"></script>
        <script defer src="' . get_template_directory_uri() . '/js/swiper.js"></script>
        ';
    });
}

// Micromodal scripts
function enqueue_micromodal_assets()
{
    add_action('wp_footer', function () {
        echo '
        <script defer src="' . get_template_directory_uri() . '/libs/micromodal.min.js"></script>
        <script defer src="' . get_template_directory_uri() . '/js/micromodal-config.js"></script>
        ';
    });
}

// Bouncer scripts
function enqueue_bouncer_assets()
{
    add_action('wp_footer', function () {
        echo '
        <script defer src="https://cdn.jsdelivr.net/gh/cferdinandi/bouncer/dist/bouncer.polyfills.min.js"></script>
        <script defer src="' . get_template_directory_uri() . '/js/bouncer.js"></script>
        ';
    });
}

// Marquee scripts
function enqueue_marquee_assets()
{
    add_action('wp_footer', function () {
        echo '
        <script defer src="https://cdn.jsdelivr.net/npm/jquery.marquee@1.6.1/jquery.marquee.min.js"></script>
        <script defer src="' . get_template_directory_uri() . '/js/marquee.js"></script>
        ';
    });
}


add_action('init', function () {
    // enqueue_micromodal_assets();
    // enqueue_bouncer_assets();
    // enqueue_notiflix_assets();
    // enqueue_swiper_assets();
    // enqueue_marquee_assets();
});
