<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'classicmag' ),
        'description' => __( 'Contains all front page settings', 'classicmag'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Main Banner Options', 'classicmag' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'classicmag_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'classicmag' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'classicmag_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'classicmag' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'classicmag' ),
            '4' => __( '4', 'classicmag' ),
            '5' => __( '5', 'classicmag' ),
            '6' => __( '6', 'classicmag' ),
        ),
    )
);


$wp_customize->add_setting(
    'classicmag_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'classicmag' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'classicmag' ),
            'text-center' => __( 'Align Center', 'classicmag' ),
            'text-left' => __( 'Align Left', 'classicmag' ),
        ),
    )
);

$wp_customize->add_setting(
    'classicmag_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'classicmag' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => classicmag_post_category_list(),
    )
);

$wp_customize->add_setting(
    'classicmag_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'classicmag' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'classicmag_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'classicmag' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'classicmag_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'classicmag' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'classicmag_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'classicmag' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'classicmag_options[enable_banner_overlay]',
    array(
        'default'           => $default_options['enable_banner_overlay'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_banner_overlay]',
    array(
        'label'   => __( 'Enable Banner Overlay', 'classicmag' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);