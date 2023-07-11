<?php
$id = get_the_ID();
$images = get_field('spp_images_gallery');
?>
<!-- Single -->
<section id="single" class="section-1 single">
    <div class="container">
        <div class="row">

            <!-- Main -->

            <div class="col-12 col-lg-<?php echo (!empty($images)) ? '8' : '12' ?> p-0 text">
                <div class="row intro m-0">
                    <div class="col-12">
                        <span class="pre-title m-0"><?php echo sanitize_text_field(get_field('spp_subtitle', $id)) ?></span>
                        <div class="title-icon">
                            <h2><?php wrapServiceFirstWord(get_the_title($id), get_field('ssp_icon', $id)) ?></h2>
                        </div>
                    </div>
                </div>
                <?php if (get_field('spp_content', $id)) : ?>
                    <div class="row">
                        <div class="col-12 align-self-center">
                            <?php
                            $allowed_tags = '<a><p><b><blockquote><u><ul><li><h1><h2><h3><h4><h5><h6><strong><figure><img>';
                            $content = get_field('spp_content', $id);
                            echo strip_tags($content, $allowed_tags);
                            ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-12 col-lg-8 no-content-container">
                        <div class="no-service-available">
                            <span><?php echo  __('No Project content available.', 'xagora') ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($images)) : ?>
                <!-- Sidebar -->
                <aside class="col-12 col-lg-4 pl-lg-5 p-0 float-right sidebar">
                    <div class="row">
                        <div class="col-12 align-self-center text-left">
                            <h4><?php echo __('Project Photos', 'xagora') ?></h4>

                            <!-- Gallery -->
                            <div class="gallery row justify-content-center">
                                <?php

                                foreach ($images as $image_id) {

                                    $image = wp_get_attachment_image_url($image_id, 'large');
                                    $imagefull = fly_get_attachment_image_src($image_id, 'projectGallery')['src'];
                                    $image990 = fly_get_attachment_image_src($image_id, 'projectGallery990')['src'];
                                    $image765 = fly_get_attachment_image_src($image_id, 'projectGallery765')['src'];
                                    $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));

                                    printf(
                                        '<a class="col-6 pl-0 item" href="%s">
                                        <img src="%s"
                                            srcset="%s 141w,%s 444w, %s 335w" 
                                            sizes="(min-width: 990px) 444px, (min-width: 765px) 335px, 100vw" 
                                            alt="%s" class="w-100">
                                    </a>',
                                        $image,
                                        $imagefull,
                                        $imagefull,
                                        $image990,
                                        $image765,
                                        $alt_text
                                    );
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</section>