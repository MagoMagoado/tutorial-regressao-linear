<?php
/**
 * Show the appropriate content for the Gallery post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Classicmag
 * @since Classicmag 1.0.0
 */

 // Print the 1st gallery found.
if ( has_block( 'core/gallery', get_the_content() ) ) {
	classicmag_print_first_instance_of_block( 'core/gallery', get_the_content() );
}
    if ( absint(classicmag_get_option( 'excerpt_length' )) != '0'){
        the_excerpt();  
    }