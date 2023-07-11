<!-- Result -->
<section id="result" class="section-2 showcase blog-grid filter-section projects">
    <div class="container">
        <div class="row items">
            <div class="col-12 col-md-4 pr-md-5 text">
                <div data-aos="fade-up" class="row intro">
                    <form method="GET" action="<?php echo esc_url(site_url('/'))?>">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0"><?php echo __('Featured posts', 'xagora') ?></span>
                            <h2 class="mb-3"><?php echo __('Most<br>Viewed<br>Blog Posts', 'xagora') ?></h2>
                            <div class="row">
                                <div class="col-12 p-0 input-group">
                                    <input type="text" class="form-control" name="s" placeholder="<?php echo __('Enter Keywords', 'xagora') ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-0 input-group align-self-center">
                                    <button class="btn primary-button"><?php echo __('SEARCH', 'xagora') ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            $query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 2,
                'meta_key' => 'post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            ));
            ?>

            <?php while ($query->have_posts()) : $query->the_post() ?>
                <div data-aos="fade-up" class="col-12 col-md-4 item">
                    <div class="card p-0 text-center">
                        <div class="image-over">
                            <?php
                            $image_id = get_post_thumbnail_id();
                            if ($image_id) {
                                $image = fly_get_attachment_image_src($image_id, 'blogThumb')['src'];
                                $image990 = fly_get_attachment_image_src($image_id, 'mostView990')['src'];
                                $image765 = fly_get_attachment_image_src($image_id, 'mostView765')['src'];
                                $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));

                                printf(
                                    '<img src="%s"
                                        srcset="%s 360w,%s 288w, %s 655w" 
                                        sizes="(min-width: 990px) 288px, (min-width: 765px) 655px, 100vw" 
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
    </div>
</section>