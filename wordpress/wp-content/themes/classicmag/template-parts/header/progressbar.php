<?php
/**
 * Displays progressbar
 *
 * @package Classicmag
 */

$show_progressbar = classicmag_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = classicmag_get_option( 'progressbar_position' );
	echo '<div id="classicmag-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
