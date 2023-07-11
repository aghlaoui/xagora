<?php $id = get_the_ID() ?>
<!-- About -->
<section id="about" class="section-2 highlights image-right">
    <div class="container">
        <div class="row">
            <?php if (get_field('spa_title', $id) && get_field('spa_description', $id) && have_rows('spa_features', $id)) : ?>
                <div class="col-12 col-md-6 pr-md-5 align-self-center text-center text-md-left text">
                    <div data-aos="fade-up" class="row intro">
                        <div class="col-12 p-0">
                            <span class="pre-title m-auto m-md-0"><?php echo sanitize_text_field(get_field('spa_subtitle', $id)) ?></span>
                            <h2><?php echo replaceWithSpanTags(get_field('spa_title', $id)) ?></h2>
                            <p><?php echo sanitize_textarea_field(get_field('spa_description')) ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 pr-md-5 align-self-center text-center text-md-left text">
                    <?php
                    $i = 0;
                    while (have_rows('spa_features', $id)) {
                        the_row();
                        echo ($i % 2 == 0) ? '<div class="row items">' : '';
                        echo '<div data-aos="fade-up" class="col-12 col-md-6 p-0 pr-md-4 item">';
                        $icon = (get_sub_field('icon')) ? '<i class="mr-2 icon-' . sanitize_text_field(get_sub_field('icon')) . '"></i>' : '';
                        $title = sanitize_text_field(get_sub_field('title'));
                        $description = sanitize_text_field(get_sub_field('description'));

                        printf('<h4>%s%s</h4><p>%s</p>', $icon, $title, $description);
                        echo '</div>';
                        echo ($i % 2 !== 0) ? '</div>' : '';
                        $i++;
                    }
                    ?>
                </div>
            <?php else : ?>
                <div class="col-12 col-lg-6 pr-md-5 no-about-service-available">
                    <span>No Description Available.</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>