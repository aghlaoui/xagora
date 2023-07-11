<!-- Process -->
<?php if (have_rows('sa_steps', 'option')) : ?>
    <section id="process" class="section-1 process offers">
        <div class="container full">
            <div class="row text-center intro">
                <div class="col-12">
                    <span class="pre-title"><?php echo sanitize_text_field(get_field('sa_subtitle', 'option')) ?></span>
                    <h2><?php replaceWithSpanTags(get_field('sa_title', 'option')) ?></h2>
                    <p class="text-max-800"><?php echo sanitize_text_field(get_field('sa_description', 'option')) ?></p>
                </div>
            </div>
            <div class="row justify-content-center text-center items">
                <?php
                $k = 1;
                while (have_rows('sa_steps', 'option')) {
                    the_row();
                    echo '<div class="col-12 col-md-6 col-lg-2 item">';
                    $title = sanitize_text_field(get_sub_field('title'));
                    $description = sanitize_text_field(get_sub_field('description'));

                    printf('<div class="step"><span>%d</span></div><h4>%s</h4><p>%s</p>', $k, $title, $description);
                    echo '</div>';
                    $k++;
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>