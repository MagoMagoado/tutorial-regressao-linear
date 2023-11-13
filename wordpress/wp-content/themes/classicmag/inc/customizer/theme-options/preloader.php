<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'classicmag_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'classicmag' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'classicmag_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'classicmag' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'classicmag' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'classicmag' ),
        ),
        'active_callback' => 'classicmag_is_show_preloader',

    )
);
