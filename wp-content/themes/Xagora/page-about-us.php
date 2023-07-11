<?php
get_header();

get_my_template_part('hero');

/**
 * About Section
 */
get_my_template_part('about/about');

/**
 * Numbers Section
 */
get_my_template_part('about/numbers');

/**
 * Description Section
 */
get_my_template_part('about/description');

/**
 * Partners Section
 */
if (get_field('about_partners_activate_section', get_the_ID())) {
    get_my_template_part('partners');
}
get_footer();
