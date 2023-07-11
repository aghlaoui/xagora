<?php
get_header();

get_my_template_part('hero');


/**
 * Service content Section
 */
get_my_template_part('service/single/content');

/**
 * About Service section
 */
get_my_template_part('service/single/about');

/**
 * Signature Section
 */
get_my_template_part('service/single/signature');

/**
 * Contact Section
 */
get_my_template_part('contact');



get_footer();
