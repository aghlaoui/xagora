<?php

/**
 * Pricing Features select
 */
add_filter('acf/load_field/name=pps_select_feature', 'pricing_feature_select');
function pricing_feature_select($field)
{
    $field['choices'] = array();

    $k = 1;
    while (have_rows('ps_plans_features', 'option')) {
        the_row();
        $field['choices'][$k] = sanitize_text_field(get_sub_field('feature'));
        $k++;
    }

    return $field;
}

/**
 * Synch Plans With Settings
 */
add_filter('acf/load_value/name=pps_pricing_plan', 'plans_settings_details', 10, 3);
function plans_settings_details($value, $post_id, $field)
{
    $arr = array();
    $i = 0;

    while (have_rows('ps_pricing_names', 'option')) {
        the_row();

        $the_values = $value[$i]['field_6494cf5a3c7c8'];
        $the_details_values = $value[$i]['field_64959445f1d27'];
        $arr[] = array(
            'field_6494cf5a3c7c8' => $the_values,
            'field_64959445f1d27' => $the_details_values
        );
        $i++;
    }

    $value = $arr;
    return $value;
}


/**
 * Adding The Plan name label 
 */
add_action('acf/render_field/type=repeater', 'output_pricing_names', 8);
function output_pricing_names($field)
{
    if ($field['_name'] == 'pp_features') {

        $i = 0;
        while (have_rows('ps_pricing_names', 'option')) {

            the_row();
            if ($field['prefix'] == 'acf[field_6494cf343c7c7][row-' . $i . ']') {
                printf('<div class="pricing-name-label"><h3>%s:</h3></div>', ucfirst(get_sub_field('plan_name')));
            }
            $i++;
        }
    }
}

/**
 * Setting Pricing Page Message 
 */
add_filter('acf/load_field/key=field_6495b0e7e96db', 'about_select_items');
function about_select_items($field)
{
    $link = esc_url(home_url()) . '/wp-admin/admin.php?page=acf-options-pricing-settings';
    $field['message'] = 'You have to set pricing settings first <strong><a href="' . $link . '">from here</a></strong>';

    return $field;
}

/**
 * About Edit Partners Message 
 */
add_filter('acf/load_field/key=field_649ade84a9cc5', 'About_partner_message');
function About_partner_message($field)
{
    $link = esc_url(get_edit_post_link(get_page_by_path('partners')->ID));
    $field['message'] = __('You can edit partners', 'xagora') . ' <strong><a href="' . $link . '">' . __('from here', 'xagora') . '</a></strong>';

    return $field;
}


/**
 * Home Numbeers edit message 
 */
add_filter('acf/load_field/key=field_649c48c7be6d9', 'home_numbers_message');
function home_numbers_message($field)
{
    $link = esc_url(get_edit_post_link(get_page_by_path('about-us')->ID));
    $field['message'] = __('You are currenty using about page numbers you can edit ', 'xagora') . ' <strong><a href="' . $link . '">' . __('from here', 'xagora') . '</a></strong>';

    return $field;
}


/**
 * Partners Project Upload
 */
add_filter('acf/load_field/name=project_link_select', 'partners_projects_upload');
function partners_projects_upload($field)
{
    $field['choices'] = array();

    $query = new WP_Query(array('post_type' => 'project'));

    while ($query->have_posts()) {
        $query->the_post();
        $id = get_the_ID();
        $title = sanitize_text_field(get_the_title());

        $field['choices'][$id] = $title;
    }
    wp_reset_postdata();
    return $field;
}



/**
 * Slider Links
 */
add_filter('acf/load_field/name=select_button_link', 'slider_select_link');
function slider_select_link($field)
{
    $field['choices'] = array();

    $query = new WP_Query(array(
        'post_type' => array('post', 'service', 'project', 'page'),
        'posts_per_page' => -1,
    ));

    while ($query->have_posts()) {
        $query->the_post();
        $id = get_the_ID();

        $title = sanitize_text_field(get_the_title());

        $field['choices'][get_post_type()][$id] = $title;
    }
    wp_reset_postdata();
    return $field;
}


/**
 * Team Home Message
 */

add_filter('acf/load_field/key=field_64a0049569acd', 'message_team_home');
function message_team_home($field)
{
    if (!get_field('team_activate_page', 'option')) {
        $field['wrapper']['class'] = 'team-deactivated';
    }
    $link = esc_url(home_url() . 'wp-admin/admin.php?page=team-people');
    $field['message'] = __('The Team Section is deactivated you have to activate it ', 'xagora') . ' <strong><a href="' . $link . '">' . __('from here', 'xagora') . '</a></strong>';

    return $field;
}


/**
 * Team Section Activation home
 */

add_filter('acf/prepare_field/name=hp_team_activate_section', 'team_home_section');
function team_home_section($field)
{
    // print("<pre>" . print_r($field, true) . "</pre>");
    if (!get_field('team_activate_page', 'option')) {
        $field['value'] = 0;
        $field['wrapper']['class'] .= ' my-acf-none-display';
    }

    return $field;
}
