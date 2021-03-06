<?php
require_once(get_theme_file_path('/inc/tgm.php'));
require_once(get_theme_file_path('/inc/acf-mb.php'));
require_once(get_theme_file_path('/inc/attachments.php'));

if (site_url() == "http://localhost:10003") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}

function philosophy_theme_setup()
{
    load_theme_textdomain('philosophy');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-list'));
    add_theme_support('post-formats', array('image', 'gallery', 'quote', 'audio', 'video', 'link'));
    add_editor_style('/assets/css/editor-style.css');

    register_nav_menu('topmenu', __('Top menu', 'philosophy'));
    //new image size
    add_image_size('philosophy-square-home', 400, 400, true);
}
add_action('after_setup_theme', 'philosophy_theme_setup');

function philosophy_assets()
{
    wp_enqueue_style(
        'fontawesome-css',
        get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.css'),
        null,
        '1.0'
    );
    wp_enqueue_style(
        'fonts-css',
        get_theme_file_uri('/assets/css/fonts.css'),
        null,
        '1.0'
    );
    wp_enqueue_style(
        'base-css',
        get_theme_file_uri('/assets/css/base.css'),
        null,
        '1.0'
    );
    wp_enqueue_style(
        'vendor-css',
        get_theme_file_uri('/assets/css/vendor.css'),
        null,
        '1.0'
    );
    wp_enqueue_style(
        'main-css',
        get_theme_file_uri('/assets/css/main.css'),
        null,
        VERSION
    );
    wp_enqueue_style('philosophy-css', get_stylesheet_uri(), null, VERSION);

    // js files
    wp_enqueue_script(
        "philosophy-modernizr-js",
        get_theme_file_uri("/assets/js/modernizr.js"),
        null,
        "1.0"
    );
    wp_enqueue_script(
        "philosophy-pace-js",
        get_theme_file_uri("/assets/js/pace.min.js"),
        null,
        "1.0"
    );
    wp_enqueue_script(
        "philosophy-plugins-js",
        get_theme_file_uri("/assets/js/plugins.js"),
        array("jquery"),
        "1.0",
        true
    );
    wp_enqueue_script(
        "philosophy-main-js",
        get_theme_file_uri("/assets/js/main.js"),
        array("jquery"),
        "1.0",
        true
    );
}
add_action('wp_enqueue_scripts', 'philosophy_assets');

// for pagination
function philosophy_pagination()
{
    global $wp_query;
    $pagelinks = paginate_links(
        array(
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'mid_size' => 3
        )
    );
    $pagelinks = str_replace('page-numbers', 'pgn__num', $pagelinks);
    $pagelinks = str_replace("<ul class='pgn__num'", '<ul', $pagelinks);
    $pagelinks = str_replace('class="next pgn__num"', 'class="pgn__next"', $pagelinks);
    $pagelinks = str_replace('class="prev pgn__num"', 'class="pgn__prev"', $pagelinks);
    echo $pagelinks;
}
