<!-- Navbar -->
<nav class="navbar navbar-expand navbar-fixed sub">
    <div class="container header">

        <!-- Navbar Brand-->
        <a class="navbar-brand" href="<?php echo esc_url(home_url()) ?>">
            <?php
            $name = sanitize_text_field(get_bloginfo('name'));
            $result = separateString($name);
            $part1 = strtoupper($result[0]);
            $part2 = strtoupper($result[1]);
            printf('<span class="brand"> <span class="featured"> <span class="first">%s</span> </span> <span class="last">%s</span> </span>', $part1, $part2);
            ?>

            <!-- <img src="assets/images/logo.svg" alt="NEXGEN"> -->
        </a>

        <!-- Nav holder -->
        <div class="ml-auto"></div>
        <!-- Navbar Items -->
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'navbar_header',
                'container' => '',
                'menu_class' => 'navbar-nav items',
                'add_li_class'  => 'nav-item dropdown',
                'link_class' => 'nav-link',
            )
        );
        ?>

        <!-- Navbar Icons -->
        <ul class="navbar-nav icons">
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#search">
                    <i class="icon-magnifier"></i>
                </a>
            </li>
        </ul>

        <!-- Navbar Toggle -->
        <ul class="navbar-nav toggle">
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                    <i class="icon-menu m-0"></i>
                </a>
            </li>
        </ul>

        <!-- Navbar Action -->
        <ul class="navbar-nav action">
            <li class="nav-item ml-3">
                <?php if (is_front_page() || (get_post_type() == 'project' && is_single()) || get_post_type() == 'service') : ?>
                    <a href="#contact" class="smooth-anchor btn ml-lg-auto primary-button"><?php echo __('CONTACT US', 'xagora') ?></a>
                <?php else : ?>
                    <a href="<?php echo esc_url(site_url('contact-us')) ?>" class="btn ml-lg-auto primary-button"><?php echo __('CONTACT US', 'xagora') ?></a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>