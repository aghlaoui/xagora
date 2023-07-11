<?php
//section
$wp_customize->add_section('contact_details', array(
    'title'         => __('Contact details', 'cooperate'),
    'priority'      => 200
));

$wp_customize->add_setting('phone_number', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('email_adress', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('office_adress', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('open_hours', array(
    'default' => '',
    'type'    => 'theme_mod'
));

//cotrols
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'phone_number', array(
    'label' => __('Phone number', 'xagora'),
    'section' => 'contact_details',
    'settings' => 'phone_number',
    'type' => 'tel',
    'input_attrs' => array(
        'placeholder' => '+212677809854',
    ),
)));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'email_adress', array(
    'label' => __('Email adress', 'xagora'),
    'section' => 'contact_details',
    'settings' => 'email_adress',
    'type' => 'email',
    'input_attrs' => array(
        'placeholder' => 'contact@example.com',
        'pattern' => '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'
    ),
)));
$wp_customize->add_control('office_adress', array(
    'type' => 'textarea',
    'label' => __('Office adress', 'xagora'),
    'section' => 'contact_details',
    'input_attrs' => array(
        'placeholder' => 'Lot elyakssour, Rue 23',
    )
));
$wp_customize->add_control('open_hours', array(
    'type' => 'text',
    'label' => __('Opening Hours', 'xagora'),
    'section' => 'contact_details',
    'input_attrs' => array(
        'placeholder' => 'Mon - Sat - 9:00 - 18:00',
    )
));
