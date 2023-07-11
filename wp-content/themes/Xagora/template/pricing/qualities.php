<?php if (have_rows('ppq_qualities', 'option')) : ?>
    <section id="features" class="section-3 features offers">
        <div class="container">
            <div class="row justify-content-center items">
                <?php while (have_rows('ppq_qualities', 'option')) : the_row() ?>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <?php
                            $icon = sanitize_text_field(get_sub_field('icon'));
                            $title = sanitize_text_field(get_sub_field('title'));
                            $description = sanitize_text_field(get_sub_field('description'));
                            printf('<i class="icon featured icon-%s"></i><h4>%s</h4><p>%s</p>', $icon, $title, $description);
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>