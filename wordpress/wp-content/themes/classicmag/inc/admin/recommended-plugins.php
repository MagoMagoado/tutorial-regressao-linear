<?php
/**
 * Classicmag recommended plugins
 *
 * @package Classicmag
 */

if( isset( $_GET['page'] ) && $_GET['page'] == 'theme-dashboard' ){
	return;
}
require_once trailingslashit( get_template_directory() ) . 'inc/admin/recommended-plugins/class-tgm-plugin-activation.php';

function classicmag_recommended_plugins_array() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
        array(
            'name'               => 'Mailchimp for WP',
            'slug'               => 'mailchimp-for-wp',
            'is_callable'        => 'MC4WP_Admin',
            'required'           => false,
        ),
		array(
			'name'      => esc_html__('Demo Import Kit','classicmag'),
			'slug'      => 'demo-import-kit',
			'required'  => false,
		),
		array(
				'name'      => esc_html__('Themeinwp Import Companion','classicmag'),
				'slug'      => 'themeinwp-import-companion',
				'required'  => false,
		),
	);

	$config = array(
		'id'           => 'classicmag',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}


add_action( 'tgmpa_register', 'classicmag_recommended_plugins_array' );
