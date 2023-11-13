<?php
/**
 * Displays Banner Section
 *
 * @package Classicmag
 */
$is_banner_section = classicmag_get_option('enable_banner_section');
$enable_banner_overlay = classicmag_get_option('enable_banner_overlay');
$banner_section_cat = classicmag_get_option( 'banner_section_cat' );
$number_of_slider_post = classicmag_get_option( 'number_of_slider_post' );
$enable_banner_cat_meta = classicmag_get_option( 'enable_banner_cat_meta' );
$enable_banner_author_meta = classicmag_get_option( 'enable_banner_author_meta' );
$enable_banner_date_meta = classicmag_get_option( 'enable_banner_date_meta' );
$enable_banner_post_description = classicmag_get_option( 'enable_banner_post_description' );
$slider_post_content_alignment = classicmag_get_option( 'slider_post_content_alignment' );
$featured_image = "";
$banner_overlay_class = '';
if ($enable_banner_overlay) {
    $banner_overlay_class = 'data-bg-overlay';
}
$slider_pagenav = '';
$i = 1;
?>

<section class="site-banner-section">
<div class="wrapper">
    <div class="column-row">
        <div class="column column-12">
            <div class="theme-banner-slider swiper-container">
                <div class="swiper-wrapper">
                <?php $banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat)));
                    if( $banner_post_query->have_posts() ):
                        while ($banner_post_query->have_posts()): $banner_post_query->the_post();
                            ?>
                            <div class="swiper-slide">
                                <div class="column-row">
                                    <div class="column column-6 column-sm-12">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="slider-slide-image image-size-large">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    the_post_thumbnail('large', [
                                                        'alt' => get_the_title(),
                                                        'class' => 'responsive-image',
                                                    ]);
                                                    ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
    
                                    <div class="column column-6 column-sm-12 justify-content-center <?php echo $slider_post_content_alignment; ?>">
                                        <div class="slider-content">
                                            <?php if ($enable_banner_cat_meta) { ?>
                                                    <div class="entry-categories">
                                                        <div class="classicmag-entry-categories">
                                                            <?php the_category(' '); ?>
                                                        </div>
                                                    </div><!-- .entry-categories -->
                                            <?php } ?>
    
                                            <?php the_title( '<h2 class="entry-title font-size-large mb-24 line-clamp line-clamp-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    
                                            <?php if ($enable_banner_post_description) { ?>
                                                <div class="hidden-xs-screen mb-24">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php } ?>
    
                                            <div>
                                                <?php if ($enable_banner_date_meta) { classicmag_posted_on(); } ?>
                                                <?php if ($enable_banner_author_meta) {  classicmag_posted_by();} ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <?php
                            $slider_pagenav .= '<div class="swiper-slide">';
                            $slider_pagenav .= '<div class="banner-pagination-item">';
                            $slider_pagenav .= '<h3 class = "font-size-small line-clamp line-clamp-3 m-0"><span>'.'0'.esc_html($i++).'</span>'.esc_html(get_the_title()).'</h3>';
                            $slider_pagenav .= '</div>';
                            $slider_pagenav .= '</div>';
                        endwhile; 
                    wp_reset_postdata();
                    endif; ?>
                </div>
        
                <!-- Control -->
        
                <div class="theme-swiper-control swiper-control">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination theme-swiper-pagination"></div>
                </div>
        
            </div>
        
            <div class="banner-pagination-container">
                <div class="wrapper">
                    <div class="column-row">
                        <div class="column column-4"></div>
        
                        <div class="column column-8">
                            <div thumbsSlider="" class="site-banner-pagination mySwiper">
                                <div class="swiper-wrapper">
                                    <?php echo $slider_pagenav;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

