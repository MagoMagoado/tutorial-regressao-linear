<?php
$wp_customize->add_section(
	'newsletter_options',
	array(
		'title' => __( 'Newsletter Options', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
	)
);

/*Enable Newsletter*/
$wp_customize->add_setting(
	'classicmag_options[enable_newsletter]',
	array(
		'default'           => $default_options['enable_newsletter'],
		'sanitize_callback' => 'classicmag_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'classicmag_options[enable_newsletter]',
	array(
		'label'   => __( 'Enable Newsletter', 'classicmag' ),
		'section' => 'newsletter_options',
		'type'    => 'checkbox',
	)
);


$wp_customize->add_setting(
    'classicmag_options[upload_newsletter_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'classicmag_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'classicmag_options[upload_newsletter_image]',
        array(
            'label'           => __( 'Upload Newsletter PopUp Image', 'classicmag' ),
            'section'         => 'newsletter_options',
        )
    )
);

$wp_customize->add_setting(
    'classicmag_options[newsletter_section_title]',
    array(
        'default'           => $default_options['newsletter_section_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'classicmag_options[newsletter_section_title]',
    array(
        'label'    => __( 'Newsletter Section Title', 'classicmag' ),
        'section'  => 'newsletter_options',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'classicmag_options[newsletter_section_description]',
    array(
        'default'           => $default_options['newsletter_section_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'classicmag_options[newsletter_section_description]',
    array(
        'label'    => __( 'Newsletter Section Description', 'classicmag' ),
        'section'  => 'newsletter_options',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'classicmag_options[newsletter_section_shortcode]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'classicmag_options[newsletter_section_shortcode]',
    array(
        'label'    => __( 'Newsletter Shortcode', 'classicmag' ),
        'section'  => 'newsletter_options',
        'type'     => 'textarea',
    )
);