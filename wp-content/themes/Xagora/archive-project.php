<?php
get_header();

get_my_template_part('hero');

?>
<!-- Projects -->
<section id="projects" class="section-1 showcase blog-grid filter-section projects">
    <div class="overflow-holder">
        <div class="container">
            <div class="row text-center intro">
                <div class="col-12">
                    <span class="pre-title"><?php echo __('We do more for everyone', 'xagora') ?></span>
                    <h2 class="mb-0"><?php echo __('Actions & <span class="featured"><span>Projects</span></span>', 'xagora') ?></h2>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn active">
                            <input type="radio" value="all" checked class="btn-filter-item">
                            <span><?php echo __('All', 'xagora') ?></span>
                        </label>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'project_category',
                            'hide_empty' => true, // Set to true if you want to hide empty terms
                        ));

                        foreach ($terms as $term) {
                            $name = sanitize_text_field($term->name);
                            printf('<label class="btn"><input type="radio" value="%s" class="btn-filter-item"><span>%s</span></label>', $name, $name);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row items filter-items">
                <?php while (have_posts()) : the_post() ?>
                    <?php
                    $category = get_the_terms(get_the_ID(), 'project_category');
                    $cat_count = count($category);
                    $k = 1;
                    $categories = '';
                    foreach ($category as $cat) {
                        $categories .= '"' .  sanitize_text_field($cat->name) . '"';
                        $categories .= ($cat_count != $k) ? ',' : '';
                        $k++;
                    }
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" data-groups='[<?php echo $categories ?>]'>
                        <div class="row card p-0 text-center">
                            <div class="image-over">
                                <?php
                                $image_id = get_post_thumbnail_id();
                                if ($image_id) {
                                    $image = fly_get_attachment_image_src($image_id, 'blogThumb')['src'];
                                    $image990 = fly_get_attachment_image_src($image_id, 'blogThumb990')['src'];
                                    $image765 = fly_get_attachment_image_src($image_id, 'projectThumb765')['src'];
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
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <a href="<?php esc_url(the_permalink()) ?>">
                                        <h4><?php sanitize_text_field(the_title()) ?></h4>

                                    </a>
                                </div>
                            </div>
                            <a href="<?php esc_url(the_permalink()) ?>"><i class="btn-icon fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="col-1 filter-sizer"></div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>