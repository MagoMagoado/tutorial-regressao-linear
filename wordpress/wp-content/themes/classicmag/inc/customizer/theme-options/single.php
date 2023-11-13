<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'classicmag_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'classicmag_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Classicmag_Radio_Image_Control(
        $wp_customize,
        'classicmag_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'classicmag' ),
            'section' => 'single_options',
            'choices' => classicmag_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'classicmag_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'classicmag' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'classicmag_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control(
        $wp_customize,
        'classicmag_section_seperator_single_1',
        array(
            'settings' => 'classicmag_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'classicmag_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Classicmag_Checkbox_Multiple(
        $wp_customize,
        'classicmag_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'classicmag' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'classicmag' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'classicmag' ),
                'date' => __( 'Date', 'classicmag' ),
                'comment' => __( 'Comment', 'classicmag' ),
                'category' => __( 'Category', 'classicmag' ),
                'tags' => __( 'Tags', 'classicmag' ),
            )
        )
    )
);



$wp_customize->add_setting(
    'classicmag_section_seperator_single_5',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control( 
        $wp_customize,
        'classicmag_section_seperator_single_5',
        array(
            'settings' => 'classicmag_section_seperator_single_5',
            'section'       => 'single_options',
        )
    )
);


$wp_customize->add_setting(
    'classicmag_options[show_sticky_article_navigation]',
    array(
        'default'           => $default_options['show_sticky_article_navigation'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[show_sticky_article_navigation]',
    array(
        'label'    => __( 'Show Sticky Article Navigation', 'classicmag' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Show Author Info Box start
*-------------------------------*/
$wp_customize->add_setting(
    'classicmag_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control( 
        $wp_customize,
        'classicmag_section_seperator_single_2',
        array(
            'settings' => 'classicmag_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

$wp_customize->add_setting(
    'classicmag_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'classicmag' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'classicmag_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control(
        $wp_customize,
        'classicmag_section_seperator_single_3',
        array(
            'settings' => 'classicmag_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);