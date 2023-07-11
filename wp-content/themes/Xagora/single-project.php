<?php
get_header();

get_my_template_part('hero');

/**
 * Project Content
 */
get_my_template_part('project/content');

/**
 * About Project Section
 */
get_my_template_part('project/about');


/**
 * News Letter
 */
get_my_template_part('home/newsletter');


/**
 * Contact Us Section
 */
get_my_template_part('contact');


get_footer();
