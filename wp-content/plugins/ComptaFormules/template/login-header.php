<?php
if (is_user_logged_in()) {
    wp_safe_redirect(site_url('list-status'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="<?php echo esc_url(home_url()) ?>">
                <div class="logo">
                    <?php
                    $logo = esc_url(get_theme_mod('logo_img'));
                    if ($logo) {
                        echo '<img class="logo-size" src="' . $logo . '" alt="">';
                    } else {
                        echo '<span>' . sanitize_text_field(get_bloginfo('name')) . '</span>';
                    }
                    ?>
                </div>
            </a>
        </div>