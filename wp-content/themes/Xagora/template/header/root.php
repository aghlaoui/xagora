<!-- ============================================== Theme Settings =============================================== -->
<style>
    <?php if (is_front_page()) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #ffffff;
        --section-2-bg-color: #111117;
        --section-3-bg-color: #111117;
        --section-4-bg-color: #ffffff;
        --section-5-bg-color: #eef4ed;
        --section-6-bg-color: #111117;
        --section-7-bg-color: #ffffff;

        --footer-bg-color: #080d10;
        --footer-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-7.webp') ?>');
    }

    <?php elseif (get_post_type() == 'post') : ?> :root {
        --hero-bg-color: #080d10;
        --section-1-bg-color: #eef4ed;
        --section-2-bg-color: #ffffff;
        --section-3-bg-color: #111117;
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-1.webp') ?>');
    }

    <?php elseif (is_post_type_archive('service') && is_archive()) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #eef4ed;
        --section-2-bg-color: #111117;
        --section-3-bg-color: #ffffff;
    }

    <?php elseif (get_post_type() == 'service' && is_single()) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #ffffff;
        --section-2-bg-color: #eef4ed;
        --section-3-bg-color: #111117;
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-7.webp') ?>');
        --section-4-bg-color: #ffffff;
    }

    <?php elseif (get_post_type() == 'project' && is_archive()) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #eef4ed;
    }

    <?php elseif (get_post_type() == 'project' && is_single()) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #ffffff;
        --section-2-bg-color: #eef4ed;
        --section-3-bg-color: #111117;
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-1.webp') ?>');
        --section-4-bg-color: #ffffff;
    }

    <?php elseif (is_page('pricing')) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #ffffff;
        --section-2-bg-color: #111117;
        --section-3-bg-color: #eef4ed;
    }

    <?php elseif (is_page('team')) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #ffffff;
        --section-3-bg-color: #111117;
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-4.webp') ?>');
    }

    <?php elseif (is_page('partners')) :  ?>:root {
        --hero-bg-color: #080d10;
        --section-3-bg-color: #111117;
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-8.webp') ?>');
        --section-1-bg-color: #eef4ed;
    }

    <?php elseif (is_search()) : ?> :root {
        --hero-bg-color: #080d10;
        --section-1-bg-color: #eef4ed;
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-1.webp') ?>');
    }

    <?php elseif (is_page('contact-us')) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #ffffff;
        --section-2-bg-color: #eef4ed;
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-7.webp') ?>');
    }

    <?php elseif (is_page('about-us')) : ?> :root {
        --hero-bg-color: #080d10;

        --section-1-bg-color: #ffffff;
        --section-2-bg-color: #111117;
        --section-3-bg-color: #ffffff;

        --section-4-bg-color: #eef4ed;
    }

    <?php else : ?> :root {
        --section-3-bg-image: url('<?php echo get_theme_file_uri('src/img/bg-3.webp') ?>');
        --section-1-bg-color: #ffffff;
        --section-4-bg-color: #ffffff;
    }

    <?php endif; ?>
</style>