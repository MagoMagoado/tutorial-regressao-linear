<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function classicmag_body_classes( $classes ) {
    global $post;
    $post_type = "";
    if (!empty($post)) {
        $post_type = get_post_type($post->ID);
    }
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    $header_style = classicmag_get_option('header_style');
    $classes[] = ' classicmag-'.$header_style;
    // Get the color mode of the site.
    $enable_dark_mode = classicmag_get_option( 'enable_dark_mode' );
    if ( $enable_dark_mode ) {
        $classes[] = 'classicmag-dark-mode';
    } else {
        $classes[] = 'classicmag-light-mode';
    }
    $page_layout = classicmag_get_page_layout();
    if ($post_type == 'product') {
        if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
            $classes[] = 'no-sidebar';
        } else {
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }
        }
    } else {
        if (is_active_sidebar( 'sidebar-1' ) && !empty($page_layout)) { 
        	$page_layout = classicmag_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }else{

                $classes[] = esc_attr($page_layout);
            }
        } else {
            $classes[] = 'no-sidebar ';
        }
    }



	return $classes;
}
add_filter( 'body_class', 'classicmag_body_classes' );
