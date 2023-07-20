<!-- Top Navbar -->
<nav class="navbar navbar-expand top">
    <div class="container header">

        <!-- Navbar Items [left] -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link pl-0"><i class="fas fa-clock mr-2"></i><?php echo sanitize_text_field(get_theme_mod('open_hours')) ?></a>
            </li>
        </ul>

        <!-- Nav holder -->
        <div class="ml-auto"></div>

        <!-- Navbar Items [right] -->
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
        </ul>

        <!-- Navbar Icons -->
        <?php if (have_rows('site_social_media', 'option')) :  ?>
            <ul class="navbar-nav icons">
                <?php
                while (have_rows('site_social_media', 'option')) {
                    the_row();
                    $icon = sanitize_text_field(get_sub_field('platform')) ?: '';
                    $link = esc_url(get_sub_field('link')) ?: '#';
                    printf('<li class="nav-item social"><a href="%s" class="nav-link"><i class="fab %s"></i></a></li>', $link, $icon);
                }
                ?>
            </ul>
        <?php endif; ?>
    </div>
</nav>