<?php

/**
 * VidEmbad Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
global $default_img;
$vidLink = get_field('vidBlock_link') ?: 'javascript:void(0)';
$imageID = get_field('vidBlock_thumbnail_image') ?: null;


?>
<div class="mb-5 gallery <?php echo (is_admin()) ? 'vid-embed-admin' : '' ?>">
    <a href="<?php echo (!is_admin()) ? esc_url($vidLink) : 'javascript:void(0)' ?>" class="square-image d-flex justify-content-center align-items-center">
        <i class="icon bigger fas fa-play clone"></i>
        <i class="icon bigger fas fa-play"></i>
        <?php
        if ($imageID) {
            $image = fly_get_attachment_image_src($imageID, 'blogEmbebVid')['src'];
            $image990 = fly_get_attachment_image_src($imageID, 'homeIntro')['src'];
            $image765 = fly_get_attachment_image_src($imageID, 'homeIntro765')['src'];
            $alt_text = sanitize_text_field(get_post_meta($imageID, '_wp_attachment_image_alt', true));

            printf(
                '<img src="%s"
                srcset="%s 750w, %s 900w, %s 696w" 
                sizes="(min-width: 990px) 900px, (min-width: 765px) 696px, 100vw" 
                alt="%s" class="fit-image">',
                $image,
                $image,
                $image990,
                $image765,
                $alt_text
            );
        } else {
            printf('<img src="%s" class="fit-image">', get_theme_file_uri('src/img/video.webp'));
        }
        ?>

    </a>
</div>