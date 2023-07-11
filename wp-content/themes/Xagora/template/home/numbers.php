<?php if (get_field('hpn_activate_section', get_the_ID())) : ?>
    <!-- Fun Facts -->
    <?php
    if (get_field('hpn_use_new_numbers', get_the_ID())) {
        $id = get_the_ID();
        $field = 'hpn_';
    } else {
        $id = get_page_by_path('about-us')->ID;
        $field = 'aun_';
    }
    ?>
    <section id="funfacts" class="section-2 odd counter funfacts">
        <video class="full-image to-bottom grayscale" data-mask="70" playsinline autoplay muted loop>
            <source src="<?php echo esc_url(get_theme_file_uri('src/vid/city.mp4')) ?>" type="video/mp4" />
        </video>
        <?php  ?>
        <div class="container">
            <div class="row mb-md-5 text-center">
                <div class="col-12">
                    <span class="pre-title"><?php echo sanitize_text_field(get_field($field . 'subtitle', $id)) ?></span>
                    <h2><?php replaceWithSpanTags(get_field($field . 'title', $id)) ?></h2>
                </div>
            </div>
            <div class="row justify-content-center text-center items">
                <?php while (have_rows($field . 'numbers', $id)) : the_row() ?>
                    <div class="col-12 col-md-6 col-lg-3 item">
                        <div data-percent="<?php echo get_sub_field('number') ?>" class="radial">
                            <span></span>
                        </div>
                        <h4><?php echo sanitize_text_field(get_sub_field('title')) ?></h4>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>