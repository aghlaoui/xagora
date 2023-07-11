<?php
add_action('acf/init', 'acf_options_creating', 1);

function acf_options_creating()
{
    if (function_exists('acf_add_options_page')) {
        // Sub-Page for services
        acf_add_options_sub_page(array(
            'page_title'     => __('Services Settings', 'xagora'),
            'menu_title'    => __('Services Settings', 'xagora'),
            'parent_slug'    => 'edit.php?post_type=service',
        ));

        // Pricing Option Pages
        $pricing_parent = acf_add_options_page(array(
            'page_title'    => __('Pricing Page Settings', 'xagora'),
            'menu_title'    => __('Pricing Page', 'xagora'),
            'menu_slug'     => 'pricing-settings',
            'icon_url'      => 'dashicons-money-alt',
            'position' => '27',
            'redirect'      => false
        ));

        $pricing_child = acf_add_options_page(array(
            'page_title'  => __('Pricing Settings', 'xagora'),
            'menu_title'  => __('Pricing Settings', 'xagora'),
            'parent_slug' => $pricing_parent['menu_slug'],
        ));

        // Team Option Page
        acf_add_options_page(array(
            'page_title'    => __('Team People', 'xagora'),
            'menu_title'    => __('Team', 'xagora'),
            'menu_slug'     => 'team-people',
            'icon_url'      => 'dashicons-buddicons-buddypress-logo',
            'position' => '27',
            'redirect'      => false
        ));


        acf_add_options_page(array(
            'page_title'    => __('Site Settings', 'xagora'),
            'menu_title'    => __('Site Settings', 'xagora'),
            'menu_slug'     => 'site-settings',
            'icon_url'      => 'dashicons-admin-site-alt3',
            'position' => '59',
            'redirect'      => false
        ));

        // Posts Option Page
        acf_add_options_page(array(
            'page_title'  => __('Posts Settings', 'xagora'),
            'menu_title'  => __('Posts Settings', 'xagora'),
            'parent_slug' => 'edit.php',
        ));

        // Projects Option Page
        acf_add_options_page(array(
            'page_title'  => __('Projects Settings', 'xagora'),
            'menu_title'  => __('Projects Settings', 'xagora'),
            'parent_slug' => 'edit.php?post_type=project',
        ));
    }
}
