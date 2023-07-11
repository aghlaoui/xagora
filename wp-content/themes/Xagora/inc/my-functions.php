<?php

/**
 * Print how many days sinse the post is published
 * @param string $date the day where the post is posted Y-m-d
 * 
 */
function postDateCaculator($date)
{
    $postDate = $date; // Get the date of the post
    $today = new DateTime(); // Current date
    $interval = $today->diff(new DateTime($postDate)); // Calculate the difference
    $daysPassed = $interval->format('%a'); // Get the number of days
    if ($daysPassed == 0) {
        echo __('Today', 'xagora');
    } elseif ($daysPassed == 1) {
        echo  __(' Yesterday', 'xagora');
    } else {
        echo $daysPassed . __(' Days Ago', 'xagora');
    }
}

/**
 * Print Website Pagination
 */
function xagora_pagination()
{
    global $paged; // current page 
    if (empty($paged)) $paged = 1; // paged is empty on the first page 
    global $wp_query;
    $pages = $wp_query->max_num_pages; // number of all pages 

    if (!$pages) $pages = 1;

    if ($pages != 1) {
        echo '<div class="row"> <div class="col-12"> <nav> <ul class="pagination justify-content-center">';

        if ($paged > 1) echo '<li class="page-item"> <a class="page-link" href="' . get_pagenum_link($paged - 1) . '" tabindex="-1"> <i class="icon-arrow-left"></i> </a> </li>';


        for ($page = 1; $page <= $pages; $page++) {
            if ($page == $paged) {
                echo '<li class="page-item active"><a class="page-link" href="javascript:void(0);">' . $page . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($page) . '">' . $page . '</a></li>';
            }
        }

        if ($paged < $pages) echo '<li class="page-item"> <a class="page-link" href="' . get_pagenum_link($paged + 1) . '"> <i class="icon-arrow-right"></i> </a> </li>';

        echo '</ul></nav></div></div>';
    }
}


/**
 * Separate the last word from the string.
 *
 * @param string $the_text the text you want to seperate.
 * 
 *
 * @return array return two values the first part of the string and last part .
 */
function highlight_the_text($the_text)
{
    $title = $the_text;
    $pieces = explode(' ', $title);

    $firstPart = reset($pieces);
    $titleFirstWordCount = strlen($firstPart);
    $titleNbChar = strlen($title);
    $lastPart = substr($title, $titleFirstWordCount, $titleNbChar);

    return array($firstPart, $lastPart);
}

/**
 * Adding Vies Counter to Posts Views Counter
 */
function setPostViews($postID)
{
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/**
 * Costume get template part
 */
function get_my_template_part($slug, $name = null)
{
    $file = 'template/' . $slug;
    if ($name) {
        $file .= '-' . $name;
    }

    get_template_part($file);
}


/**
 * Replaces words wrapped between {} with <span> tags and echoes the modified string.
 *
 * @param string $string The input string to be modified.
 * @return void
 */
function replaceWithSpanTags($string)
{
    $string = sanitize_text_field($string);
    $pattern = '/\{([^}]+)\}/';

    $replacement = '<span class="featured"><span>$1</span></span>';

    $modified_string = preg_replace($pattern, $replacement, $string);

    echo $modified_string;
}


function wrapServiceFirstWord($string, $icon)
{
    $icon = sanitize_text_field($icon);
    $string = sanitize_text_field($string);
    $words = explode(' ', $string); // Split the text into an array of words
    $firstWord = $words[0]; // Get the first word

    if ($icon) {
        $wrappedText = '<span class="featured"><span><i class="icon icon-' . $icon . '"></i>' . $firstWord . ' </span></span> ' . substr($string, strlen($firstWord));
    } else {
        $wrappedText = '<span class="featured"><span>' . $firstWord . ' </span></span> ' . substr($string, strlen($firstWord));
    }
    echo $wrappedText;
}


/**
 * Pricing Seperate 
 */
function Pricing_seperate($string)
{
    $string = sanitize_text_field($string);
    // Extract the numeric part
    $numericPart = (int) $string;

    // Extract the non-numeric part
    $nonNumericPart = trim(str_replace($numericPart, '', $string));

    // Output the result
    echo $numericPart . '<span class="plan"> ' . $nonNumericPart . '</span>';
}

/**
 * Adding Class To Menues Items
 */
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

function my_nav_menu_submenu_css_class($classes)
{
    $classes[] = 'dropdown-menu';


    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class');

function testing_some_shit($title, $menu, $args)
{
    $classes = $menu->classes;

    foreach ($classes as $class) {
        if ($class == 'menu-item-has-children') {
            $title = $title . '<i class="icon-arrow-down"></i>';
        }
    }

    return $title;
}
add_filter('nav_menu_item_title', 'testing_some_shit', 1, 3);


/**
 * Seperate String to Two Equal Strings
 */
function separateString($inputString)
{
    $stringLength = strlen($inputString);
    $halfLength = ceil($stringLength / 2);

    $firstHalf = substr($inputString, 0, $halfLength);
    $secondHalf = substr($inputString, $halfLength);

    return array($firstHalf, $secondHalf);
}
