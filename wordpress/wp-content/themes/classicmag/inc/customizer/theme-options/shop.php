<?php
$wp_customize->add_section(
    'home_page_shop_option',
    array(
        'title'      => __( 'Shop  Section Options', 'classicmag' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'classicmag_options[enable_shop_section]',
    array(
        'default'           => $default_options['enable_shop_section'],
        'sanitize_callback' => 'classicmag_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'classicmag_options[enable_shop_section]',
    array(
        'label'   => __( 'Enable Shop Section', 'classicmag' ),
        'section' => 'home_page_shop_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'classicmag_options[shop_post_title]',
    array(
        'default'           => $default_options['shop_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'classicmag_options[shop_post_title]',
    array(
        'label'    => __( 'Shop Post Title', 'classicmag' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'classicmag_options[shop_post_description]',
    array(
        'default'           => $default_options['shop_post_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'classicmag_options[shop_post_description]',
    array(
        'label'    => __( 'Shop Post Description', 'classicmag' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'classicmag_options[shop_select_product_from]',
    array(
        'default'           => $default_options['shop_select_product_from'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[shop_select_product_from]',
    array(
        'label'       => __( 'Select Product From', 'classicmag' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            'custom'            => __('Custom Select', 'classicmag'),
            'recent-products'   => __('Recent Products', 'classicmag'),
            'popular-products'  => __('Popular Products', 'classicmag'),
            'sale-products'     => __('Sale Products', 'classicmag'),
        )
    )
);


$wp_customize->add_setting(
    'classicmag_options[select_product_category]',
    array(
        'default'           => $default_options['select_product_category'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[select_product_category]',
    array(
        'label'   => __( 'Select Product Category', 'classicmag' ),
        'section' => 'home_page_shop_option',
        'type'        => 'select',
        'choices'     => classicmag_woocommerce_product_cat(),
        'active_callback' => 'classicmag_shop_select_product_from'
    )
);

$wp_customize->add_setting(
    'classicmag_options[shop_number_of_column]',
    array(
        'default'           => $default_options['shop_number_of_column'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[shop_number_of_column]',
    array(
        'label'       => __( 'Select Number Of Column', 'classicmag' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'classicmag'),
            '3'  => __('3', 'classicmag'),
            '4'  => __('4', 'classicmag'),
        )
    )
);

$wp_customize->add_setting(
    'classicmag_options[shop_number_of_product]',
    array(
        'default'           => $default_options['shop_number_of_product'],
        'sanitize_callback' => 'classicmag_sanitize_select',
    )
);
$wp_customize->add_control(
    'classicmag_options[shop_number_of_product]',
    array(
        'label'       => __( 'Select Number Of Product', 'classicmag' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'classicmag'),
            '3'  => __('3', 'classicmag'),
            '4'  => __('4', 'classicmag'),
            '5'  => __('5', 'classicmag'),
            '6'  => __('6', 'classicmag'),
            '7'  => __('7', 'classicmag'),
            '8'  => __('8', 'classicmag'),
            '9'  => __('9', 'classicmag'),
            '10'  => __('10', 'classicmag'),
            '11'  => __('11', 'classicmag'),
            '12'  => __('12', 'classicmag'),
        )
    )
);

$wp_customize->add_setting(
    'classicmag_options[shop_post_button_text]',
    array(
        'default'           => $default_options['shop_post_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'classicmag_options[shop_post_button_text]',
    array(
        'label'    => __( 'Shop section Button Text', 'classicmag' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);
$wp_customize->add_setting(
    'classicmag_options[shop_post_button_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'classicmag_options[shop_post_button_url]',
    array(
        'label'           => __( 'Button Link', 'classicmag' ),
        'section'         => 'home_page_shop_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'classicmag' ),
    )
);