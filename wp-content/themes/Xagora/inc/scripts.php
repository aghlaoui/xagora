<?php
add_action('wp_enqueue_scripts', 'xakora_scripts');
function xakora_scripts()
{

    /************************* Styles ************************* */
    wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css');
    // wp_enqueue_style('pooping', '//fonts.googleapis.com/css2?family=Poppins:wght@800;900&amp;display=swap');
    // wp_enqueue_style('montserat', '//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap');

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', array(), '', true);

    wp_enqueue_script('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js', array(), '', true);

    if (is_page('about-us')) {
        wp_enqueue_style('about-us', get_theme_file_uri('build/css/aboutCss.css'));

        wp_enqueue_script('about', get_theme_file_uri('build/aboutJs.js'), array(), '', true);
    } elseif (is_page('pricing')) {
        wp_enqueue_style('pricing', get_theme_file_uri('build/css/pricingCss.css'));
    } elseif (is_page('team')) {
        wp_enqueue_style('team', get_theme_file_uri('build/css/teamCss.css'));
    } elseif (is_search()) {
        wp_enqueue_style('home', get_theme_file_uri('build/css/searchCss.css'));
    } elseif (get_post_type() == 'post') {
        wp_enqueue_style('blog', get_theme_file_uri('build/css/blogCss.css'));

        wp_enqueue_script('blog', get_theme_file_uri('build/blogJs.js'), array(), '', true);
    } elseif (get_post_type() == 'service') {
        wp_enqueue_style('service', get_theme_file_uri('build/css/serviceCss.css'));
    } elseif (get_post_type() == 'project') {
        wp_enqueue_style('project', get_theme_file_uri('build/css/projectCss.css'));

        wp_enqueue_script('shuffle', get_theme_file_uri('src/js/vendor/shuffle.min.js'), array(), '', true);
        wp_enqueue_script('project', get_theme_file_uri('build/projectJs.js'), array(), '', true);
    } elseif (is_front_page()) {
        wp_enqueue_style('home', get_theme_file_uri('build/css/homeCss.css'));

        wp_enqueue_script('home', get_theme_file_uri('build/homeJs.js'), array(), '', true);
    } elseif (is_404()) {
        wp_enqueue_style('404', get_theme_file_uri('build/css/Css404.css'));
    }
    wp_enqueue_style('icons', get_theme_file_uri('build/css/icons.css'));

    wp_enqueue_style('animation', get_theme_file_uri('src/css/vendor/animation.min.css'));
    /************************* scripts ************************* */

    wp_enqueue_script('animation', get_theme_file_uri('src/js/vendor/animation.min.js'), array(), '', true);
    wp_enqueue_script('slider', get_theme_file_uri('src/js/vendor/slider.min.js'), array(), '', true);

    wp_enqueue_script('general', get_theme_file_uri('build/generalJs.js'), array(), '', true);
}

function enqueue_custom_admin_style()
{
    wp_enqueue_style('custom-admin-style', get_theme_file_uri('build/css/adminCss.css'));
    wp_enqueue_script('custom-admin-scripts', get_theme_file_uri('build/adminJs.js'), array(), '', true);
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_style');


function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

add_action('wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 20);
function mywptheme_child_deregister_styles()
{
    wp_dequeue_style('classic-theme-styles');
}

//Disable emojis in WordPress
add_action('init', 'smartwp_disable_emojis');

function smartwp_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function crunchify_remove_plugin_stylesheet()
{
    wp_deregister_style('newsletter');
}
add_action('wp_enqueue_scripts', 'crunchify_remove_plugin_stylesheet', 100);
