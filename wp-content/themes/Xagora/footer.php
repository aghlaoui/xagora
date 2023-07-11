<?php

/**
 * NewsLetter 
 */
get_my_template_part('footer/newsletter');
?>
<!-- Footer -->
<footer>

    <!-- Footer [content] -->
    <section id="footer" class="odd footer offers">
        <div class="container">
            <div class="row">
                <?php
                /**
                 * Footer Details Section
                 */
                get_my_template_part('footer/contact');

                /**
                 * Menus Section
                 */
                get_my_template_part('footer/menus');
                ?>
            </div>
        </div>
    </section>

    <?php get_my_template_part('footer/copyright') ?>

</footer>

<?php
/**
 * Search Modal
 */
get_my_template_part('footer/search');



/**
 * Map Modal
 */
if (is_front_page() || is_page('pricing') || is_page('contact-us') ||  get_post_type() == 'service' || (is_single() && get_post_type() == 'project')) {
    get_my_template_part('footer/modal-map');
}
?>



<!-- Modal [responsive menu] -->
<div id="menu" class="p-0 modal fade" role="dialog" aria-labelledby="menu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                <i class="icon-close fas fa-arrow-right"></i>
            </div>
            <div class="menu modal-body">
                <div class="row w-100">
                    <div class="items p-0 col-12 text-center">
                        <!-- Append [navbar] -->
                    </div>
                    <div class="contacts p-0 col-12 text-center">
                        <!-- Append [navbar] -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll [to top] -->
<div id="scroll-to-top" class="scroll-to-top">
    <a href="#header" class="smooth-anchor">
        <i class="fas fa-arrow-up"></i>
    </a>
</div>


<?php wp_footer() ?>
</body>

</html>