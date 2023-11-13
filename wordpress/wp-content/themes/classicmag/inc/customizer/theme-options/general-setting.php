<?php
/*Header Options*/
$wp_customize->add_section(
    'general_settings' ,
    array(
        'title' => __( 'General Settings', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'classicmag_options[show_lightbox_image]',
    array(
        'default'           => $default_options['show_lightbox_image'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[show_lightbox_image]',
    array(
        'label'    => __( 'Show LightBox Image', 'classicmag' ),
        'section'  => 'general_settings',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'classicmag_options[enable_cursor_dot_outline]',
    array(
        'default' => $default_options['enable_cursor_dot_outline'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_cursor_dot_outline]',
    array(
        'label' => esc_html__('Enable Cursor Dot Outline', 'classicmag'),
        'section' => 'general_settings',
        'type' => 'checkbox',
    )
);
