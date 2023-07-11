<?php if (get_field('hp_blog_activate_section', get_the_ID())) : ?>
    <!-- Blog -->
    <section id="blog" class="section-5 carousel showcase">
        <div class="overflow-holder">
            <div class="container">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <span class="pre-title m-auto m-md-0"><?php echo __('Our editorial content', 'xagora') ?></span>
                        <h2><?php echo __('Latest <span class="featured"><span>News</span></span>', 'xagora') ?></h2>
                        <p><?php echo __('Every week we publish content about what is best in the business world.', 'xagora') ?></p>
                    </div>
                    <div class="col-12 col-md-3 align-self-end">
                        <a href="<?php echo esc_url(site_url('blog')) ?>" class="btn mx-auto mr-md-0 ml-md-auto primary-button"><?php echo __('SEE ALL', 'xagora') ?></a>
                    </div>
                </div>
                <?php $query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 7)); ?>
                <div class="swiper-container mid-slider items" data-perview="3">
                    <div class="swiper-wrapper">
                        <?php while ($query->have_posts()) : $query->the_post() ?>
                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over">
                                        <?php
                                        $image_id = get_post_thumbnail_id();
                                        if ($image_id) {
                                            $image = fly_get_attachment_image_src($image_id, 'blogThumb')['src'];
                                            $image990 = fly_get_attachment_image_src($image_id, 'blogThumb990')['src'];
                                            $image765 = fly_get_attachment_image_src($image_id, 'blogThumbHome765')['src'];
                                            $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));

                                            printf(
                                                '<img src="%s"
                                                srcset="%s 360w, %s 447w, %s 697w" 
                                                sizes="(min-width: 990px) 360px, (min-width: 765px) 447px, 100vw" 
                                                alt="%s">',
                                                $image,
                                                $image,
                                                $image990,
                                                $image765,
                                                $alt_text
                                            );
                                        } else {
                                            global $default_img;
                                            printf('<img src="%s" alt="Default-image">', $default_img);
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" class="d-lg-flex align-items-center">
                                            <i class="icon-user"></i>
                                            <?php echo sanitize_text_field(get_the_author()) ?>
                                        </a>
                                        <a href="javascript:void(0);" class="d-lg-flex align-items-center">
                                            <i class="icon-clock"></i>
                                            <?php postDateCaculator(get_the_date('Y-m-d')); ?>
                                        </a>
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="<?php esc_url(the_permalink()) ?>">
                                                <h4><?php sanitize_text_field(the_title()) ?></h4>
                                                <p><?php echo substr(sanitize_textarea_field(get_the_excerpt()), 0, 60) ?></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>