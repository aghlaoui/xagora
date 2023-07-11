<?php
add_filter('show_admin_bar', '__return_false');
/******         Styles And Scripts      ********/
require get_theme_file_path('/inc/scripts.php');

/******         Custom Functions      ********/
require get_theme_file_path('/inc/my-functions.php');

add_action('after_setup_theme', 'xagora_features');

function xagora_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form',));

    /*******      Translation      ********/
    load_theme_textdomain('xagora', get_template_directory() . '/languages');
}

/********** Predefined Images Sizes  ***********/

if (function_exists('fly_add_image_size')) {
    /******     Blog Images     *********/
    // Thumbmbnail
    fly_add_image_size('blogThumb', 360, 360, true);
    fly_add_image_size('blogThumb990', 447, 447, true);
    fly_add_image_size('blogThumb765', 697, 500, true);
    fly_add_image_size('blogThumbHome765', 697, 697, true);
    // Gallery
    fly_add_image_size('blogGalleryThumb', 360, 247, true);
    fly_add_image_size('blogGalleryThumb990', 444, 303, true);
    fly_add_image_size('blogGalleryThumb765', 330, 226, true);
    // Most Viewed
    fly_add_image_size('mostView990', 288, 360, true);
    fly_add_image_size('mostView765', 655, 655, true);
    // Projects 
    fly_add_image_size('projectThumb765', 697, 697, true);
    // Single Project
    fly_add_image_size('projectGallery', 141, 141, true);
    fly_add_image_size('projectGallery990', 444, 444, true);
    fly_add_image_size('projectGallery765', 335, 335, true);
    // Teams Members 
    fly_add_image_size('teamMember', 174, 204, true);
    fly_add_image_size('teamMember990', 138, 162, true);
    fly_add_image_size('teamMember765', 218, 254, true);
    fly_add_image_size('teamMemberHome', 109, 128, true);
    // Search Page
    fly_add_image_size('searchPage', 240, 165, true);
    fly_add_image_size('searchPage990', 167, 115, true);
    fly_add_image_size('searchPage765', 512, 350, true);
    // Search Page
    fly_add_image_size('aboutDesc', 780, 815, true);
    fly_add_image_size('aboutDesc990', 483, 868, true);
    // Home Slider
    fly_add_image_size('homeSlider', 1519, 704, true);
    fly_add_image_size('homeSlider990', 970, 704, true);
    fly_add_image_size('homeSlider765', 746, 704, true);
    // Home Slider
    fly_add_image_size('homeIntro', 900, 405, true);
    fly_add_image_size('homeIntro765', 699, 315, true);
    fly_add_image_size('blogEmbebVid', 699, 315, true);

    // Banner
    fly_add_image_size('pageBanner', 1920, 700, true);
}
/********* Disable Images Sizes ***********/
add_filter('intermediate_image_sizes_advanced', 'prefix_remove_default_images');
function prefix_remove_default_images($sizes)
{
    unset($sizes['small']); // 150px
    unset($sizes['medium']); // 300px
    unset($sizes['medium_large']); // 768px
    return $sizes;
}

/********* Global Declaration  *********/
function global_declarations()
{
    global $default_img;
    $default_img = get_theme_file_uri('src/img/no-image.webp');

    register_nav_menus(
        array(
            'navbar_header' => __('Header Navbar'),
            'footer_left_menu' => __('Footer Left Menu'),
            'footer_center_menu' => __('Footer Center Menu'),
            'footer_right_menu' => __('Footer Right Menu'),
        )
    );
}
add_action('init', 'global_declarations');

/**
 * Ignore SLL Verification
 */

add_filter('https_ssl_verify', '__return_false');
add_filter('https_local_ssl_verify', '__return_false');


/**
 * Deactivate Pages 
 */
function deactivate_team_page()
{
    $page_id = 189;
    $status = (!get_field('team_activate_page', 'option')) ? 'draft' : 'publish';
    $post = array('ID' => $page_id, 'post_status' => $status);
    wp_update_post($post);
}
add_action('wp', 'deactivate_team_page');

function deactivate_partners_page()
{
    $page_id = 208;
    $status = (!get_field('parners_activate_page', $page_id)) ? 'draft' : 'publish';
    $post = array('ID' => $page_id, 'post_status' => $status);
    wp_update_post($post);
}
add_action('wp', 'deactivate_partners_page');

/******         Option Pages By ACF      ********/
require get_theme_file_path('/inc/option-pages.php');

/******         Filters By ACF      ********/
require get_theme_file_path('/inc/acf-filters.php');

/******         Gutenberg deactuvator      ********/
require get_theme_file_path('/inc/gutenberg.php');

/******         Hero Section      ********/
require get_theme_file_path('/inc/hero.php');

/******         Customizer      ********/
require get_theme_file_path('/inc/customizer/main.php');

/******         cf7 Hooks      ********/
require get_theme_file_path('/inc/cf7-hooks.php');
