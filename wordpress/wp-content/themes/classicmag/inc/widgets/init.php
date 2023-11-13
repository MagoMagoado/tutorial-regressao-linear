<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/recent-widget.php';
require get_template_directory() . '/inc/widgets/social-widget.php';
require get_template_directory() . '/inc/widgets/author-widget.php';
require get_template_directory() . '/inc/widgets/newsletter-widget.php';
require get_template_directory() . '/inc/widgets/tab-widget.php';
require get_template_directory() . '/inc/widgets/cta-widget.php';


require get_template_directory() . '/inc/widgets/article-style-1.php';
require get_template_directory() . '/inc/widgets/article-single-style-1.php';
require get_template_directory() . '/inc/widgets/article-single-style-2.php';
require get_template_directory() . '/inc/widgets/article-single-style-3.php';
require get_template_directory() . '/inc/widgets/article-single-style-4.php';
require get_template_directory() . '/inc/widgets/article-slider.php';
require get_template_directory() . '/inc/widgets/article-single-carousel.php';

/* Register site widgets */
if ( ! function_exists( 'classicmag_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function classicmag_widgets() {
        register_widget( 'Classicmag_Recent_Posts' );
        register_widget( 'Classicmag_Social_Menu' );
        register_widget( 'Classicmag_Author_Info' );
        register_widget( 'Classicmag_Mailchimp_Form' );
        register_widget( 'Classicmag_Call_To_Action' );
        register_widget( 'Classicmag_Tab_Posts' );
        register_widget( 'Classicmag_Article_Posts_Style_1' );
        register_widget( 'Classicmag_Article_Single_Style_1' );
        register_widget( 'Classicmag_Article_Single_Style_2' );
        register_widget( 'Classicmag_Article_Single_Style_3' );
        register_widget( 'Classicmag_Article_Single_Style_4' );
        register_widget( 'Classicmag_Article_Slider' );
        register_widget( 'Classicmag_Article_Carousel' );
    }
endif;
add_action( 'widgets_init', 'classicmag_widgets' );