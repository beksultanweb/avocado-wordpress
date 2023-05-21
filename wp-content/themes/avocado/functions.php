<?php
add_action('wp_enqueue_scripts', 'avocado_scripts');


function internoetics_truncate_words($string, $limit, $trimmarker = '') {
    $count = str_word_count($string, 0);
    $string = explode(' ', $string, $limit + 1);
    array_pop($string);
    $string = implode(' ', $string);
    return ($limit < $count) ? $string . $trimmarker : $string;
}

add_filter( 'favorites/list/listing/html', 'custom_favorites_listing_html', 10, 4 );
function custom_favorites_listing_html($html, $markup_template, $post_id, $list_options)
{
    $price = get_field('property_price', $post_id);
    $html = '
        <div class="tabs__item">
            <img class="tabs__img" src="' . get_field('property_img', $post_id) . '" alt="property">
            <div class="tabs__title">' . get_the_title($post_id) . '</div>
            <div class="tabs__info">
                <div class="tabs__graphics">
                    <img class="icon" src="' . get_bloginfo('template_url', $post_id) . '/assets/icons/flat.svg" alt="building">
                    <div class="tabs__subtitle">' . get_field('property_rooms', $post_id) . '</div>
                </div>
                <div class="tabs__graphics">
                    <img class="icon" src="' . get_bloginfo('template_url') . '/assets/icons/meters.svg" alt="square">
                    <div class="tabs__subtitle">' . get_field('property_square', $post_id) . ' кв.м.</div>
                </div>
            </div>
            <a href="' . get_permalink($post_id) . '"><button class="tabs__btn">
                ' . number_format($price, 0, ',', ' ') . ' EUR</button></a>
        </div>';
	return $html;
}


function avocado_scripts() {
    if(is_single()) {
        wp_enqueue_script( 'handle', get_template_directory_uri() . '/assets/js/property.js', array(), null, true );
    }
    else if(is_front_page()) {
        wp_enqueue_script('avocado-scripts', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
        wp_enqueue_style('multiselect-style', 'https://unpkg.com/slim-select@latest/dist/slimselect.css');
        wp_enqueue_script('multiselect-script', 'https://unpkg.com/slim-select@latest/dist/slimselect.min.js');
        wp_enqueue_script('active_tabs', get_template_directory_uri() . '/assets/js/active_tabs.js', array(), null, true);
        wp_enqueue_script('multi-select', get_template_directory_uri() . '/assets/js/multi.js', array(), null, true);
        wp_enqueue_script('city-change', get_template_directory_uri() . '/assets/js/city_change.js', array(), null, true);
        wp_enqueue_script('search-input', get_template_directory_uri() . '/assets/js/search_input.js', array('jquery'), '3.6.1', true);
    }
    else if(is_page(92)) {
        wp_enqueue_script('active_tabs', get_template_directory_uri() . '/assets/js/active_tabs.js', array(), null, true);
        wp_enqueue_script('multi-select', get_template_directory_uri() . '/assets/js/multi.js', array(), null, true);
        wp_enqueue_style('multiselect-style', 'https://unpkg.com/slim-select@latest/dist/slimselect.css');
        wp_enqueue_script('multiselect-script', 'https://unpkg.com/slim-select@latest/dist/slimselect.min.js');
        wp_enqueue_script('search-input', get_template_directory_uri() . '/assets/js/search_input.js', array(), null, true);
    }
    else if(is_page(161) or is_category()) {
        wp_enqueue_script('multi-select', get_template_directory_uri() . '/assets/js/multi.js', array(), null, true);
        wp_enqueue_style('multiselect-style', 'https://unpkg.com/slim-select@latest/dist/slimselect.css');
        wp_enqueue_script('multiselect-script', 'https://unpkg.com/slim-select@latest/dist/slimselect.min.js');
        wp_enqueue_script('search-input', get_template_directory_uri() . '/assets/js/search_input.js', array(), null, true);
    }
    if(is_category()) {
        wp_enqueue_script('categ', get_template_directory_uri() . '/assets/js/categ.js', array('jquery'), '3.6.1', true);
    }
    wp_enqueue_style('avocado-style', get_stylesheet_uri());
    wp_enqueue_script('avocado-scripts2', get_template_directory_uri() . '/assets/js/burger.js', array(), null, true);
    wp_enqueue_script('sticky-header', get_template_directory_uri() . '/assets/js/sticky-header.js', array(), null, true);
    wp_enqueue_script('modal', get_template_directory_uri() . '/assets/js/popup.js', array(), null, true);
}

add_theme_support('custom-logo');
?>