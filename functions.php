<?php
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
}
add_action('after_setup_theme', 'philosophy_theme_setup');

function philosophy_assets()
{
    wp_enqueue_style(
        'fontawesome-css',
        get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.css'),
        null,
        VERSION
    );
    wp_enqueue_style(
        'fonts-css',
        get_theme_file_uri('/assets/css/fonts.css'),
        null,
        VERSION
    );
    wp_enqueue_style(
        'base-css',
        get_theme_file_uri('/assets/css/base.css'),
        null,
        VERSION
    );
    wp_enqueue_style(
        'vendor-css',
        get_theme_file_uri('/assets/css/vendor.css'),
        null,
        VERSION
    );
    wp_enqueue_style(
        'main-css',
        get_theme_file_uri('/assets/css/main.css'),
        null,
        VERSION
    );
    wp_enqueue_style('philosophy-css', get_stylesheet_uri(), null, VERSION);
}
add_action('wp_enqueue_scripts', 'philosophy_assets');
