<?php
get_header();


/**
 * Slider
 */
get_my_template_part('home/slider');

/** 
 * Introduction Section
 */
get_my_template_part('home/intro');

/**
 * Numbers Section
 */
get_my_template_part('home/numbers');

/**
 * Services Section
 */
get_my_template_part('home/services');

/**
 * Team Section
 */
get_my_template_part('home/team');

/**
 * Blog Section
 */
get_my_template_part('home/blog');


/**
 * NewsLetter Section
 */

get_my_template_part('home/newsletter');


/**
 * Contact Form
 */

get_my_template_part('contact');


get_footer();
