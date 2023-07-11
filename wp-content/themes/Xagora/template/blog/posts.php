<?php if (have_posts()) :  ?>
    <div class="col-12 col-lg-8 p-0 blog-grid">
        <div class="row items">

            <?php while (have_posts()) : the_post() ?>
                <div class="col-12 col-md-6 item">
                    <div class="row card p-0 text-center">
                        <div class="image-over">
                            <?php
                            $image_id = get_post_thumbnail_id();
                            if ($image_id) {
                                $image = fly_get_attachment_image_src($image_id, 'blogThumb')['src'];
                                $image990 = fly_get_attachment_image_src($image_id, 'blogThumb990')['src'];
                                $image765 = fly_get_attachment_image_src($image_id, 'blogThumb765')['src'];
                                $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));

                                printf(
                                    '<img src="%s"
                                srcset="%s 360w,%s 447w, %s 697w" 
                                sizes="(min-width: 990px) 447px, (min-width: 765px) 697px, 100vw" 
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
            <?php wp_reset_postdata() ?>
        </div>

        <!-- Pagination -->
        <?php echo xagora_pagination() ?>
    </div>
<?php else : ?>
    <div class="col-12 col-lg-8 p-0 blog-grid no-content-available">
        <div class="row items">
            <span><?php echo __('No Posts Are Available!', 'xagora') ?></span>
        </div>
    </div>
<?php endif; ?>