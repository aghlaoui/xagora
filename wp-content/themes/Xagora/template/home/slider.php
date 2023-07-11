<?php $id = get_the_ID() ?>
<!-- Hero -->
<?php if (have_rows('hps_slide', $id)) : ?>
    <section id="slider" class="hero p-0 odd">
        <div class="swiper-container full-slider animation slider-h-100 slider-h-auto">
            <div class="swiper-wrapper">
                <?php $i = 0 ?>
                <?php while (have_rows('hps_slide', $id)) : the_row() ?>
                    <?php
                    $timing = ($i == 0) ? 1000 : 400;
                    $placement = get_sub_field('placement');
                    if ($placement == 'left') {
                        $class1 =  '';
                        $class2 = 'left';
                        $aosTitle = $timing;
                        $aosDesc = $timing + 400;
                        $aosButton = $aosDesc + 400;
                        $descClass = '';
                    } elseif ($placement == 'center') {
                        $class1 =  'justify-content-md-center';
                        $class2 = 'center text-md-center';
                        $aosTitle = $timing;
                        $aosDesc = $timing + 400;
                        $aosButton = $aosDesc + 400;
                        $descClass = ' mr-auto ml-auto';
                    } elseif ($placement == 'right') {
                        $class1 =  'justify-content-md-end';
                        $class2 = 'right';
                        $aosTitle = $timing;
                        $aosDesc = $timing + 400;
                        $aosButton = $aosDesc + 400;
                        $descClass = '';
                    }
                    ?>
                    <!-- Item 1 -->
                    <div class="swiper-slide slide-center">

                        <!-- Media -->
                        <?php
                        $image_id = get_sub_field('image', $id);
                        if ($image_id) {
                            $image = fly_get_attachment_image_src($image_id, 'homeSlider')['src'];
                            $image990 = fly_get_attachment_image_src($image_id, 'homeSlider990')['src'];
                            $image765 = fly_get_attachment_image_src($image_id, 'homeSlider765')['src'];
                            $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));
                            printf(
                                '<img src="%s"
                        srcset="%s 1519w,%s 970w, %s 746w" 
                        sizes="(min-width: 990px) 970px, (min-width: 765px) 746px, 100vw" 
                        alt="%s" class="full-image" data-mask="40">',
                                $image,
                                $image,
                                $image990,
                                $image765,
                                $alt_text
                            );
                        } else {
                            global $default_img;
                            echo '<img src="' . $default_img . '" alt="default" class="full-image" data-mask="40">';
                        }
                        ?>

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start inner <?php echo $class1 ?>">
                                <div class="<?php echo $class2 ?> text-left">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="<?php echo $aosTitle ?>" class="title effect-static-text"><?php echo sanitize_text_field(get_sub_field('title')) ?></h2>
                                    <p data-aos="zoom-in" data-aos-delay="<?php echo $aosDesc ?>" class="description <?php echo $descClass ?>"><?php echo sanitize_text_field(get_sub_field('description')) ?></p>

                                    <!-- Action -->
                                    <div data-aos="fade-up" data-aos-delay="<?php echo $aosButton ?>" class="buttons">
                                        <div class="d-sm-inline-flex">
                                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button"><?php echo __('GET IN TOUCH', 'xagora') ?></a>
                                            <?php
                                            $links = get_sub_field('links');
                                            $linkText = sanitize_text_field(get_sub_field('button_text'));
                                            if ($links['costume_link']) {
                                                $link = esc_url($links['costume_button_link']);
                                            } else {
                                                $link = esc_url(get_the_permalink($links['select_button_link']));
                                            }

                                            printf('<a href="%s" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">%s</a>', $link, $linkText);
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
<?php endif; ?>