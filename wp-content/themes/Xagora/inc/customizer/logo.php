<?php
$wp_customize->add_section('logo_upload', array(
    'title'         => __('Logo', 'cooperate'),
    'priority'      => 200
));
$wp_customize->add_setting('use_logo', array(
    'default'           => false,
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('logo_img', array(
    'default' => '',
    'type'    => 'theme_mod'
));


$wp_customize->add_control('use_logo', array(
    'label'    => __('Check to Use Logo (When it is unchecked you are using the site name as a logo)', 'xagora'),
    'section'  => 'logo_upload',
    'type'     => 'checkbox',
));


$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_img', array(
    'label' => __('Logo', 'Xagora'),
    'section' => 'logo_upload',
    'settings' => 'logo_img',
)));
