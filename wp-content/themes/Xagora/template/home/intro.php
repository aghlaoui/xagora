<?php $id = get_the_ID() ?>
<?php if (get_field('hpi_activate_section', $id)) : ?>
    <!-- Video -->
    <section id="video" class="section-1 highlights image-center">
        <div class="container smaller">
            <div class="row text-center intro">
                <div class="col-12">
                    <span class="pre-title"><?php echo sanitize_text_field(get_field('hpi_pre_title', $id)) ?></span>
                    <h2><?php replaceWithSpanTags(get_field('hpi_title', $id)) ?></h2>
                    <p class="text-max-800"><?php echo sanitize_textarea_field(get_field('hpi_description')) ?></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 gallery">
                    <?php $image = get_field('hpi_image', $id); ?>
                    <a href="<?php echo ($image['add_video']) ? esc_url(get_field('hpi_video_link', $id)) : 'javascript:void(0)' ?>" class="square-image d-flex justify-content-center align-items-center" <?php echo (!$image['add_video']) ? 'style="cursor: inherit; pointer-events: none;"' : '' ?>>
                        <?php
                        echo ($image['add_video']) ? '<i class="icon bigger fas fa-play clone"></i> <i class="icon bigger fas fa-play"></i>' : '';

                        $image_id = $image['image'];
                        $image = fly_get_attachment_image_src($image_id, 'homeIntro')['src'];
                        $image765 = fly_get_attachment_image_src($image_id, 'homeIntro765')['src'];
                        $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));
                        printf(
                            '<img src="%s"
                                srcset="%s 900w,%s 699w" 
                                sizes="(min-width: 765px) 699px, 100vw" 
                                alt="%s" class="fit-image">',
                            $image,
                            $image,
                            $image765,
                            $alt_text
                        );
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>