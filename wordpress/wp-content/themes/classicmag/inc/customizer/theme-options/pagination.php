<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'classicmag' ),
        'panel' => 'classicmag_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'classicmag_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'classicmag' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'classicmag' ),
            'numeric' => __( 'Numeric', 'classicmag' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'classicmag' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'classicmag' ),
        ),
    )
);
