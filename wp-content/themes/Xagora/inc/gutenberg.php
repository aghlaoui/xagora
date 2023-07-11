<?php

// /**
//  * Remove Editor From a Page
//  */

function remove_editor_from_specific_page()
{
    global $pagenow;

    $partners = get_page_by_path('partners')->ID;;
    $about_us =  get_page_by_path('about-us')->ID;;
    $home = get_page_by_path('home')->ID;

    if (!('post.php' == $pagenow && isset($_GET['post']) && ($_GET['post'] == $partners || $_GET['post'] == $about_us || $_GET['post'] == $home)))
        return;
    remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor_from_specific_page');
