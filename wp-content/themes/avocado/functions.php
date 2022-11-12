<?php
add_action('wp_enqueue_scripts', 'avocado_scripts');


function avocado_scripts() {
    if(is_single()) {
        wp_enqueue_script( 'handle', get_template_directory_uri() . '/assets/js/property.js', array(), null, true );
    }
    else {
        wp_enqueue_script('avocado-scripts', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
    }
    wp_enqueue_style('avocado-style', get_stylesheet_uri());
    wp_enqueue_script('avocado-scripts2', get_template_directory_uri() . '/assets/js/burger.js', array(), null, true);
}

add_theme_support('custom-logo');
?>