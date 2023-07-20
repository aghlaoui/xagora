<div class="col-12 col-lg-3 footer-left">

    <!-- Navbar Brand-->
    <a class="navbar-brand" href="<?php echo esc_url(home_url()) ?>">
        <?php
        $useLogo = get_theme_mod('use_logo');
        $logo = esc_url(get_theme_mod('logo_img'));
        if ($useLogo && $logo) {
            printf('<img src="%s" alt="Logo" class="logo-height">', $logo);
        } else {
            $name = sanitize_text_field(get_bloginfo('name'));
            $result = separateString($name);
            $part1 = strtoupper($result[0]);
            $part2 = strtoupper($result[1]);
            printf('<span class="brand"> <span class="featured"> <span class="first">%s</span> </span> <span class="last">%s</span> </span>', $part1, $part2);
        }

        ?>
    </a>
    <p><?php echo sanitize_text_field(get_bloginfo('description')) ?></p>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="tel:<?php echo sanitize_text_field(get_theme_mod('phone_number')) ?>" class="nav-link">
                <i class="fas fa-phone-alt mr-2"></i>
                <?php echo sanitize_text_field(get_theme_mod('phone_number')) ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="mailto:<?php echo sanitize_text_field(get_theme_mod('email_adress')) ?>" class="nav-link">
                <i class="fas fa-envelope mr-2"></i>
                <?php echo sanitize_text_field(get_theme_mod('email_adress')) ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="fas fa-map-marker-alt mr-2"></i>
                <?php echo sanitize_text_field(get_theme_mod('office_adress')) ?>
            </a>
        </li>
        <li class="nav-item">
            <?php if (is_front_page() || (get_post_type() == 'project' && is_single()) || get_post_type() == 'service') : ?>
                <a href="#contact" class="mt-4 btn outline-button smooth-anchor"><?php echo __('GET IN TOUCH', 'xagora') ?></a>
            <?php else : ?>
                <a href="<?php echo esc_url(site_url('contact-us')) ?>" class="mt-4 btn outline-button smooth-anchor"><?php echo __('GET IN TOUCH', 'xagora') ?></a>
            <?php endif; ?>
        </li>
    </ul>
</div>