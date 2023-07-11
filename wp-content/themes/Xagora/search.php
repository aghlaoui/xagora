<?php
get_header();

get_my_template_part('hero');
?>
<!-- Result -->
<section id="result" class="section-1 offers">
    <div class="container">
        <div class="row items">
            <div class="col-12 col-md-4 pr-md-5 text">
                <div data-aos="fade-up" class="row intro">
                    <div class="col-12 p-0">
                        <span class="pre-title m-0"><?php echo __('Search results for', 'xagora') ?></span>
                        <h2><?php echo sanitize_text_field(get_search_query()) ?></h2>

                        <div class="badges">
                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'project_category',
                                'hide_empty' => true,
                                'number' => 5
                            ));
                            foreach ($terms as $term) {
                                echo '<span class="badge"><a class="search-p-ready-terms" href="javascript:void(0);">' . sanitize_text_field($term->name) . '</a></span>';
                            }
                            ?>
                            <form method="GET" action="<?php echo esc_url(site_url('/')) ?>">
                                <div class="row">
                                    <div class="col-12 p-0 input-group">
                                        <input value="<?php echo (isset($_GET['s'])) ? sanitize_text_field($_GET['s']) : '' ?>" name="s" id="search-p-input-text" type="text" class="form-control" placeholder="<?php echo __('Enter Keywords', 'xagora') ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 input-group align-self-center">
                                        <button class="btn primary-button"><?php echo __('SEARCH', 'xagora') ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post() ?>
                    <div data-aos="fade-up" class="col-12 col-md-4 item">
                        <div class="card">
                            <div class="col-12">
                                <?php
                                $image_id = get_post_thumbnail_id();
                                if ($image_id) {
                                    $image = fly_get_attachment_image_src($image_id, 'searchPage')['src'];
                                    $image990 = fly_get_attachment_image_src($image_id, 'searchPage990')['src'];
                                    $image765 = fly_get_attachment_image_src($image_id, 'searchPage765')['src'];
                                    $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));

                                    printf(
                                        '<img src="%s"
                                srcset="%s 240w,%s 167w, %s 512w" 
                                sizes="(min-width: 1200px) 240px,(min-width: 990px) 167px, (min-width: 765px) 512px, 100vw" 
                                alt="%s" class="logo">',
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
                                <h4><?php sanitize_text_field(the_title()) ?></h4>
                                <p><?php echo get_post_type() ?></p>
                                <a href="<?php esc_url(the_permalink()) ?>"><?php echo __('Read more', 'xagora') ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-12 col-md-8 item">
                    <div class="search-no-posts">
                        <span><?php echo __('Nothing Found!', 'xagora') ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>
<?php get_footer() ?>