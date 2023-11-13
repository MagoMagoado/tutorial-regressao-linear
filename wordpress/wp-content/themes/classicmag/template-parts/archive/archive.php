<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Classicmag
 * @since Classicmag 1.0.0
 */
if ( absint(classicmag_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}