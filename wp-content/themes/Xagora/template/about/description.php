<?php $id = get_the_ID() ?>
<?php if (get_field('aud_activate_description', $id)) : ?>
    <!-- About 3 -->
    <section id="about-3" class="section-3 highlights image-right featured">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 pr-md-5 align-self-center text-center text-md-left text">
                    <div data-aos="fade-up" class="row intro">
                        <div class="col-12 p-0">
                            <span class="pre-title m-auto m-md-0"><?php echo sanitize_text_field('aud_subtitle', $id) ?></span>
                            <h2><?php replaceWithSpanTags(get_field('aud_title', $id)) ?></h2>
                            <p><?php echo sanitize_text_field(get_field('aud_description', $id)) ?></p>
                        </div>
                    </div>

                    <?php $i = 0; ?>
                    <?php while (have_rows('aud_features', $id)) : the_row() ?>
                        <?php echo ($i % 2 == 0) ? '<div class="row items">' : ''  ?>
                        <div data-aos="fade-up" class="col-12 col-md-6 p-0 pr-md-4 item">
                            <h4>
                                <i class="mr-2 icon-<?php echo sanitize_text_field(get_sub_field('icon')) ?>"></i>
                                <?php echo sanitize_text_field(get_sub_field('title')) ?>
                            </h4>
                            <p><?php echo sanitize_text_field(get_sub_field('description')) ?></p>
                        </div>
                        <?php echo ($i % 2 != 0) ? '</div>' : '' ?>
                        <?php $i++; ?>
                    <?php endwhile; ?>

                </div>
                <div class="col-12 col-md-6 p-0 image">
                    <?php
                    $image_id = get_field('aud_image', $id);
                    $image = fly_get_attachment_image_src($image_id, 'aboutDesc')['src'];
                    $image990 = fly_get_attachment_image_src($image_id, 'aboutDesc990')['src'];
                    $image765 = fly_get_attachment_image_src($image_id, 'projectThumb765')['src'];
                    $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));
                    printf(
                        '<img src="%s"
                        srcset="%s 780w,%s 483w, %s 697w" 
                        sizes="(min-width: 990px) 483px, (min-width: 765px) 697px, 100vw" 
                        class="fit-image" alt="%s">',
                        $image,
                        $image,
                        $image990,
                        $image765,
                        $alt_text
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>