<!-- Services -->
<section id="services" class="section-2 odd offers">
    <div class="container">
        <div class="row intro">
            <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                <span class="pre-title m-auto ml-md-0"><?php echo sanitize_text_field(get_field('sas_subtitle', 'option')) ?></span>
                <h2 class="mb-0"><?php replaceWithSpanTags(get_field('sas_title', 'option')) ?></h2>
            </div>
            <div class="col-12 col-md-3 align-self-end">
                <a href="#contact" class="smooth-anchor btn mx-auto mr-md-0 ml-md-auto outline-button"><?php echo __('GET IN TOUCH', 'xagora') ?></a>
            </div>
        </div>
        <?php if (have_posts()) : ?>
            <div class="row justify-content-center items">
                <?php while (have_posts()) : the_post() ?>
                    <div data-aos="fade-up" class="col-12 col-md-6 item">
                        <div class="card">
                            <?php
                            $id = get_the_ID();
                            $icon = sanitize_text_field(get_field('ssp_icon', $id));
                            $title = sanitize_text_field(get_the_title());
                            $excerpt = sanitize_textarea_field(get_field('ssp_excerpt', $id));
                            $link = esc_url(get_the_permalink($id));

                            printf(
                                '<i class="icon icon-%s"></i> <h4>%s</h4> <p>%s</p> <a href="%s"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>',
                                $icon,
                                $title,
                                $excerpt,
                                $link
                            );
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="row justify-content-center items services-no-content">
                <span>No Services are listed yet</span>
            </div>
        <?php endif; ?>
    </div>
</section>