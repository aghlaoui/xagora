<?php
add_action('customize_register', 'xagora_customizer_register');

function xagora_customizer_register($wp_customize)
{
    /*********************************    Details Costmizer       ************************************/
    require get_theme_file_path('inc/customizer/details.php', array('wp_customize' => $wp_customize));
}
