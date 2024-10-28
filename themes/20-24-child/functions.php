<?php
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // This is 'twentytwentyone-style' for the Twenty Twenty-One theme.

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style)
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


function custom_page_templates($template) {
    if (is_page('home')) {
        $template = locate_template('pages/page-home.php');
    } elseif (is_page('contact')) {
        $template = locate_template('pages/page-contact.php');
    } elseif (is_page('about')) {
        $template = locate_template('pages/page-about.php');
    }
    return $template;
}
add_filter('page_template', 'custom_page_templates');
