<!-- Copyright -->
<section id="copyright" class="p-3 odd copyright">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 p-3 text-center text-lg-left">
                <p><?php echo sanitize_text_field(get_bloginfo('description')) ?></p>
                <!-- Suggestion: Replace the text above with a description of your website. -->
            </div>
            <div class="col-12 col-md-6 p-3 text-center text-lg-right">
                <?php
                $year = date('Y');
                $name = strtoupper(get_bloginfo('name'));
                printf('<p>© %s %s. All Rights Reserved</p>', $year, $name);
                ?>
            </div>
        </div>
    </div>
</section>