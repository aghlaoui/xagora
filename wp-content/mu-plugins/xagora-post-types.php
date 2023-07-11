<?php
add_action('init', 'xagora_post_types');
function xagora_post_types()
{
    register_post_type('service', array(
        'supports' => array('title', 'thumbnail'),
        'rewrite' => array('slug' => 'services'),
        'has_archive' => true,
        'public' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-awards',
        'labels' => array(
            'name' => __('Services', 'xagora'),
            'add_new_item' => __('Add New Service', 'xagora'),
            'edit_item' => __('Edit Service', 'xagora'),
            'search_items' => __('Search Services', 'xagora'),
            'all_items' => __('All Services', 'xagora'),
            'singular_name' => __('Service', 'xagora'),
            'new_item' => __('New Service', 'xagora'),
            'view_item' => __('View Service', 'xagora'),
        ),
    ));

    register_post_type('project', array(
        'supports' => array('title', 'thumbnail'),
        'rewrite' => array('slug' => 'projects'),
        'has_archive' => true,
        'public' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-portfolio',
        'labels' => array(
            'name' => __('Projects', 'xagora'),
            'add_new_item' => __('Add New Project', 'xagora'),
            'edit_item' => __('Edit Project', 'xagora'),
            'search_items' => __('Search Projects', 'xagora'),
            'all_items' => __('All Projects', 'xagora'),
            'singular_name' => __('Project', 'xagora'),
            'new_item' => __('New Project', 'xagora'),
            'view_item' => __('View Project', 'xagora'),
        ),
    ));
}
