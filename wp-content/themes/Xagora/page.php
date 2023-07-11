<?php
get_header();
get_my_template_part('hero');
?>
<!-- Single -->
<section id="single" class="section-1 single">
    <div class="container">
        <div class="row content" style="justify-content: center;">
            <!-- Main -->
            <div class="col-10 p-0 text">
                <!-- Text -->
                <div class="row intro">
                    <div class="col-12">
                        <h2 class="mb-0"><span class="featured"><span><?php sanitize_text_field(the_title()) ?></span></span></h2>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 align-self-center">
                        <?php

                        $content = get_the_content();
                        $allowed_tags = '<a><p><b><blockquote><u><ul><li><h1><h2><h3><h4><h5><h6><strong><figure><img>';

                        echo strip_tags($content, $allowed_tags);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>