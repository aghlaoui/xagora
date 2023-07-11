<aside class="col-12 col-lg-4 pl-lg-5 p-0 float-right sidebar">

    <?php
    /**
     * Author Section
     */
    if (is_single()) {
        get_template_part('template/blog/sidebar/author');
    }

    /**
     * Search Section
     */
    get_template_part('template/blog/sidebar/search');

    /**
     * Share to Social Media section
     */

    if (is_single()) {
        get_template_part('template/blog/sidebar/share');
    }

    /**
     * Services Section
     */
    get_template_part('template/blog/sidebar/services');

    /**
     * Categories Section
     */
    get_template_part('template/blog/sidebar/categories');

    /**
     * Tags Section
     */
    get_template_part('template/blog/sidebar/tags');
    ?>

</aside>