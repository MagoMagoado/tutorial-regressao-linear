<?php
$wp_customize->add_section(
	'dark_mode_options',
	array(
		'title' => __( 'Dark Mode Options', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
	)
);

/*Enable Dark Mode*/
$wp_customize->add_setting(
	'classicmag_options[enable_dark_mode]',
	array(
		'default'           => $default_options['enable_dark_mode'],
		'sanitize_callback' => 'classicmag_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'classicmag_options[enable_dark_mode]',
	array(
		'label'   => __( 'Enable Dark Mode', 'classicmag' ),
		'section' => 'dark_mode_options',
		'type'    => 'checkbox',
	)
);

/*Enable Dark Mode Switcher*/
$wp_customize->add_setting(
	'classicmag_options[enable_dark_mode_switcher]',
	array(
		'default'           => $default_options['enable_dark_mode_switcher'],
		'sanitize_callback' => 'classicmag_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'classicmag_options[enable_dark_mode_switcher]',
	array(
		'label'           => __( 'Enable Light/Dark Mode Toggle button', 'classicmag' ),
		'section'         => 'dark_mode_options',
		'type'            => 'checkbox',
		'active_callback' => 'classicmag_is_dark_mode_enabled',
	)
);

/*Dark Mode Background Color*/
$wp_customize->add_setting(
	'classicmag_options[dark_mode_bg_color]',
	array(
		'default'           => $default_options['dark_mode_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'classicmag_options[dark_mode_bg_color]',
		array(
			'label'           => __( 'Dark Mode Background Color', 'classicmag' ),
			'description'     => __( 'Only choose color that have enough contrast to go with accent color.', 'classicmag' ),
			'section'         => 'dark_mode_options',
			'type'            => 'color',
			'active_callback' => 'classicmag_is_dark_mode_enabled',
		)
	)
);


/*Dark Mode Text Color*/
$wp_customize->add_setting(
	'classicmag_options[dark_mode_text_color]',
	array(
		'default'           => $default_options['dark_mode_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'classicmag_options[dark_mode_text_color]',
		array(
			'label'           => __( 'Dark Mode Text Color', 'classicmag' ),
			'description'     => __( 'Only choose color that have enough contrast to go with Background color.', 'classicmag' ),
			'section'         => 'dark_mode_options',
			'type'            => 'color',
			'active_callback' => 'classicmag_is_dark_mode_enabled',
		)
	)
);


/*Dark Mode Accent Color*/
$wp_customize->add_setting(
	'classicmag_options[dark_mode_accent_color]',
	array(
		'default'           => $default_options['dark_mode_accent_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'classicmag_options[dark_mode_accent_color]',
		array(
			'label'           => __( 'Dark Mode Accent Color', 'classicmag' ),
			'description'     => __( 'Only choose color that have enough contrast to go with the dark background.', 'classicmag' ),
			'section'         => 'dark_mode_options',
			'type'            => 'color',
			'active_callback' => 'classicmag_is_dark_mode_enabled',
		)
	)
);
