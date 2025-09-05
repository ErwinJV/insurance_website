<?php

function custom_meta_title()
{
    if (is_singular()) {
        global $post;
        $custom_title = get_the_title();
        if ($custom_title) {
            return esc_html($custom_title);
        }
    }
    return get_the_title() . ' | ' . get_bloginfo('name'); // Fallback
}
add_filter('pre_get_document_title', 'custom_meta_title');

// Custom meta description
function custom_meta_description()
{
    if (is_singular()) {
        global $post;
        $custom_description = get_the_excerpt();
        if ($custom_description) {
            echo '<meta name="description" content="' . esc_attr($custom_description) . '">';
        }
    }
}
add_action('wp_head', 'custom_meta_description');
