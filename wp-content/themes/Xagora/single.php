<?php get_header() ?>
<?php get_template_part('template/hero') ?>

<!-- Single -->
<section id="single" class="section-1 single">
    <div class="container">
        <div class="row content">
            <?php while (have_posts()) : the_post() ?>
                <?php setPostViews(get_the_ID()); ?>
                <!-- Main -->
                <div class="col-12 col-lg-8 p-0 text">

                    <!-- Text -->
                    <div class="row intro">

                        <div class="col-12">
                            <?php
                            // Categories
                            $categories = get_the_category();
                            $cat_count = count($categories);
                            $k = 1;
                            echo '<span class="pre-title m-0">';
                            foreach ($categories as $category) {
                                if ($category->term_id == 1) {
                                    continue;
                                }
                                echo sanitize_text_field($category->name);
                                echo ($k != $cat_count) ? ', ' : '';
                                $k++;
                            }
                            echo '</span>';

                            //Title
                            list($part1, $part2) = highlight_the_text(sanitize_text_field(get_the_title()));
                            printf('<h2 class="mb-0"><span class="featured"><span>%s</span></span>%s</h2>', $part1, $part2);
                            ?>

                        </div>

                        <!-- Meta -->
                        <div class="row post-meta mx-auto ml-lg-0">
                            <div class="col-12 align-self-center">
                                <span class="date"><i class="fas fa-user"></i> <?php echo sanitize_text_field(get_the_author()) ?></span>
                                <span class="author"><i class="fas fa-calendar-alt"></i><?php postDateCaculator(get_the_date('Y-m-d')); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- thumbnail -->
                        <div class="mb-5 gallery">
                            <?php
                            $image_id = get_post_thumbnail_id();
                            if ($image_id) {
                                $fullImage = fly_get_attachment_image_src($image_id, 'full')[0];

                                $image = fly_get_attachment_image_src($image_id, 'blogEmbebVid')['src'];
                                $image990 = fly_get_attachment_image_src($image_id, 'homeIntro')['src'];
                                $image765 = fly_get_attachment_image_src($image_id, 'homeIntro765')['src'];
                                $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));

                                printf(
                                    '<a href="%s">
                                        <img src="%s" srcset="%s 750w,%s 900w, %s 696w" 
                                            sizes="(min-width: 990px) 900px, (min-width: 765px) 696px, 100vw" 
                                            alt="%s" class="fit-image">
                                    </a>',
                                    $fullImage,
                                    $image,
                                    $image,
                                    $image990,
                                    $image765,
                                    $alt_text
                                );
                            }
                            ?>
                        </div>
                        <div class="col-12 align-self-center">
                            <?php

                            // $content = get_the_content();
                            $allowed_tags = '<a><p><b><blockquote><u><ul><li><h1><h2><h3><h4><h5><h6><strong><figure><img><div>';

                            echo strip_tags(the_content(), $allowed_tags);
                            ?>

                        </div>
                    </div>

                    <!-- Gallery -->
                    <?php $images = get_field('post_gallery'); ?>
                    <?php if (!empty($images)) : ?>
                        <div class="gallery row justify-content-center">
                            <?php
                            foreach ($images as $image_id) {

                                $full_image =  wp_get_attachment_image_url($image_id, 'large');
                                $image = fly_get_attachment_image_src($image_id, 'blogGalleryThumb')['src'];
                                $image990 = fly_get_attachment_image_src($image_id, 'blogGalleryThumb990')['src'];
                                $image765 = fly_get_attachment_image_src($image_id, 'blogGalleryThumb765')['src'];
                                $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));
                                printf(
                                    '<a class="col-6 item" href="%s">
                                    <img src="%s"
                                        srcset="%s 360w,%s 444w, %s 330w" 
                                        sizes="(min-width: 990px) 444px, (min-width: 765px) 330px, 100vw" 
                                        alt="%s">
                                    </a>',
                                    $full_image,
                                    $image,
                                    $image,
                                    $image990,
                                    $image765,
                                    $alt_text
                                );
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php $tags = get_the_tags() ?>
                    <?php if (!empty($tags)) : ?>
                        <div class="row">
                            <div class="posts-tags">
                                <h6 class="title"><?php echo __('Tags:', 'xagora') ?></h6>
                                <div class="tags">
                                    <?php
                                    foreach ($tags as $tag) {
                                        $name = sanitize_text_field($tag->name);
                                        $link = esc_url(get_tag_link($tag->term_id));
                                        printf('<span class="badge"><a href="%s">%s</a></span>', $link, $name);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
            <?php
            wp_reset_postdata();
            get_sidebar();
            ?>
        </div>
    </div>
</section>

<?php
/**
 * Most Viewed Posts Section
 */
get_template_part('template/blog/single/most-views');
?>

<?php get_footer() ?>