<?php
add_action('wp_enqueue_scripts', 'avocado_scripts');

function avocado_scripts() {
    wp_enqueue_style('avocado-style', get_stylesheet_uri());
    wp_enqueue_script('avocado-scripts', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
}

add_theme_support('custom-logo');
?>