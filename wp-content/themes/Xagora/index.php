<?php get_header() ?>
<?php get_template_part('template/hero') ?>

<!-- Blog -->
<section id="blog" class="section-1 single showcase projects">
    <div class="container">
        <div class="row content">

            <!-- Main -->
            <?php
            /**
             * Blog Posts Section
             */

            get_template_part('template/blog/posts');

            /**
             * Sidebar Section
             */

            get_sidebar();
            ?>

        </div>
    </div>
</section>

<?php get_footer() ?>