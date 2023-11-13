<?php
$wp_customize->add_section(
    'archive_options' ,
    array(
        'title' => __( 'Archive Options', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
    )
);

$wp_customize->add_setting(
    'classicmag_section_seperator_archive_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control(
        $wp_customize,
        'classicmag_section_seperator_archive_1',
        array(
            'settings' => 'classicmag_section_seperator_archive_1',
            'section' => 'archive_options',
        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'classicmag_options[archive_post_meta_1]',
    array(
        'default'           => $default_options['archive_post_meta_1'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Classicmag_Checkbox_Multiple(
        $wp_customize,
        'classicmag_options[archive_post_meta_1]',
        array(
            'label'	=> __( 'Archive Post Meta', 'classicmag' ),
            'description'	=> __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'classicmag' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'classicmag' ),
                'date' => __( 'Date', 'classicmag' ),
                'comment' => __( 'Comment', 'classicmag' ),
                'category' => __( 'Category', 'classicmag' ),
                'tags' => __( 'Tags', 'classicmag' ),
            ),
        )

    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'classicmag_section_seperator_archive_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Classicmag_Seperator_Control(
        $wp_customize,
        'classicmag_section_seperator_archive_3',
        array(
            'settings' => 'classicmag_section_seperator_archive_3',
            'section' => 'archive_options',
        )
    )
);

$wp_customize->add_setting('classicmag_options[excerpt_length]',
    array(
        'default'           => $default_options['excerpt_length'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'classicmag_sanitize_number_range',
    )
);
$wp_customize->add_control('classicmag_options[excerpt_length]',
    array(
        'label'       => esc_html__('Excerpt Length', 'classicmag'),
        'description'       => esc_html__( 'Max number of words. Set it to 0 to disable. (step-1)', 'classicmag' ),
        'section'     => 'archive_options',
        'type'        => 'range',
        'input_attrs' => array(
                       'min'   => 0,
                       'max'   => 100,
                       'step'   => 1,
                    ),
    )
);
