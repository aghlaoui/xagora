<?php

/**
 * Remove p tag from contact from 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Remove span wrapper from contact from 7
 */
add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});


// Add a function to dynamically populate dropdown options
function cf7_populate_dropdown_from_post_type($tag, $unused)
{
    if ($tag['name'] !== 'Service') { // Replace with the name of your dropdown field
        return $tag;
    }

    $args = array(
        'post_type' => 'service', // Replace with the name of your custom post type
        'posts_per_page' => -1,
    );

    $posts = get_posts($args);
    $options = array();


    if ($posts) {
        $options[] = 'More Info';
        foreach ($posts as $post) {
            $options[] = $post->post_title; // You can change this to the desired post attribute
        }
        $options[] = 'Other';
    }

    $tag['raw_values'] = $options;
    $tag['values'] = $options;

    return $tag;
}

// Hook the function to the 'wpcf7_form_tag' filter
add_filter('wpcf7_form_tag', 'cf7_populate_dropdown_from_post_type', 10, 2);
