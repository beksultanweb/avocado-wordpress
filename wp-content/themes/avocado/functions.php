<?php
add_action('wp_enqueue_scripts', 'avocado_scripts');


function avocado_scripts() {
    if(is_single()) {
        wp_enqueue_script( 'handle', get_template_directory_uri() . '/assets/js/property.js', array(), null, true );
        wp_enqueue_script('active_tabs', get_template_directory_uri() . '/assets/js/active_tabs.js', array(), null, true);
    }
    else if(is_front_page()) {
        wp_enqueue_script('avocado-scripts', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
        wp_enqueue_style('multiselect-style', 'https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css');
        wp_enqueue_script('multiselect-script', 'https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js');
        wp_enqueue_script('active_tabs', get_template_directory_uri() . '/assets/js/active_tabs.js', array(), null, true);
        wp_enqueue_script('multi-select', get_template_directory_uri() . '/assets/js/multi.js', array(), null, true);
    }
    else if(is_page(161)) {
        wp_enqueue_script('multi-select', get_template_directory_uri() . '/assets/js/multi.js', array(), null, true);
        wp_enqueue_style('multiselect-style', 'https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css');
        wp_enqueue_script('multiselect-script', 'https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js');
    }
    wp_enqueue_style('avocado-style', get_stylesheet_uri());
    wp_enqueue_script('avocado-scripts2', get_template_directory_uri() . '/assets/js/burger.js', array(), null, true);
}

add_theme_support('custom-logo');
?>