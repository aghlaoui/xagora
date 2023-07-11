<?php
get_header();


get_template_part('template/hero');

/**
 * Process Section
 */
get_my_template_part('service/process');

/**
 * Services Section
 */
get_my_template_part('service/services');

/**
 * Contact Section
 */
get_my_template_part('contact');



get_footer();
