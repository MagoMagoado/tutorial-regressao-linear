<?php
$wp_customize->add_setting(
    'classicmag_options[enable_header_bg_overlay]',
    array(
        'default'           => $default_options['enable_header_bg_overlay'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_header_bg_overlay]',
    array(
        'label'    => __( 'Enable Image Overlay', 'classicmag' ),
        'section'  => 'header_image',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'classicmag_options[header_image_size]',
    array(
        'default'           => $default_options['header_image_size'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[header_image_size]',
    array(
        'label'       => __( 'Select Header Size', 'classicmag' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'classicmag' ),

        'section'     => 'header_image',
        'type'        => 'select',
        'choices'     => array(
            'none' => __( 'Default', 'classicmag' ),
            'small' => __( 'Small', 'classicmag' ),
            'medium' => __( 'Medium', 'classicmag' ),
            'large' => __( 'Large', 'classicmag' ),
        ),
    )
);
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
    )
);

$wp_customize->add_setting(
    'classicmag_section_seperator_header_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control(
        $wp_customize,
        'classicmag_section_seperator_header_1',
        array(
            'settings' => 'classicmag_section_seperator_header_1',
            'section' => 'header_options',
        )
    )
);

/* Header Style */
$wp_customize->add_setting(
    'classicmag_options[header_style]',
    array(
        'default'           => $default_options['header_style'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[header_style]',
    array(
        'label'       => __( 'Header Style', 'classicmag' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'classicmag' ),

        'section'     => 'header_options',
        'type'        => 'select',
        'choices'     => array(
            'header_style_1' => __( 'Header Style 1', 'classicmag' ),
            'header_style_2' => __( 'Header Style 2', 'classicmag' ),
            'header_style_3' => __( 'Header Style 3', 'classicmag' ),
            'header_style_4' => __( 'Header Style 4', 'classicmag' ),
        ),
    )
);

$wp_customize->add_setting(
    'classicmag_section_seperator_header_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control(
        $wp_customize,
        'classicmag_section_seperator_header_2',
        array(
            'settings' => 'classicmag_section_seperator_header_2',
            'section' => 'header_options',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'classicmag_options[enable_sticky_menu]',
    array(
        'default'           => $default_options['enable_sticky_menu'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_sticky_menu]',
    array(
        'label'    => __( 'Enable Sticky Menu', 'classicmag' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'classicmag_section_seperator_header_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control(
        $wp_customize,
        'classicmag_section_seperator_header_4',
        array(
            'settings' => 'classicmag_section_seperator_header_4',
            'section' => 'header_options',
        )
    )
);



/*Enable Today's Date*/
$wp_customize->add_setting(
    'classicmag_options[enable_header_time]',
    array(
        'default'           => $default_options['enable_header_time'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_header_time]',
    array(
        'label'    => __( 'Enable Current Time', 'classicmag' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'classicmag_is_top_bar_enabled'
    )
);

/*Enable Today's Date*/
$wp_customize->add_setting(
    'classicmag_options[enable_header_date]',
    array(
        'default'           => $default_options['enable_header_date'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_header_date]',
    array(
        'label'    => __( 'Enable Today\'s Date', 'classicmag' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'classicmag_is_top_bar_enabled'
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'classicmag_options[todays_date_format]',
    array(
        'default'           => $default_options['todays_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'classicmag_options[todays_date_format]',
    array(
        'label'    => __( 'Today\'s Date Format', 'classicmag' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'classicmag' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'header_options',
        'type'     => 'text',
        'active_callback'  =>  function( $control ) {
            return (
                classicmag_is_top_bar_enabled( $control )
                &&
                classicmag_is_todays_date_enabled( $control )
            );
        }
    )
);

if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'classicmag_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'classicmag_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'classicmag_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'classicmag' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'classicmag_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'classicmag_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'classicmag_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'classicmag' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}