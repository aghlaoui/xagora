<div class="col-12 col-lg-3 footer-left">

    <!-- Navbar Brand-->
    <a class="navbar-brand" href="<?php echo esc_url(home_url()) ?>">
        <?php
        $name = sanitize_text_field(get_bloginfo('name'));
        $result = separateString($name);
        $part1 = strtoupper($result[0]);
        $part2 = strtoupper($result[1]);
        printf('<span class="brand"> <span class="featured"> <span class="first">%s</span> </span> <span class="last">%s</span> </span>', $part1, $part2);
        ?>
        <!-- Custom Logo <img src="assets/images/logo.svg" alt="NEXGEN"> -->
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
            <a href="#contact" class="mt-4 btn outline-button smooth-anchor"><?php echo __('GET IN TOUCH', 'xagora') ?></a>
        </li>
    </ul>
</div>