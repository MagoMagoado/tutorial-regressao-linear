<?php
/**
 * Template part for displaying post archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Classicmag
 */

$enabled_post_meta = array();

$post_format = get_post_format();

$enabled_post_meta = classicmag_get_option('archive_post_meta_1');

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("theme-border-space border-space-large"); ?>>

    <div class="article-block-wrapper">
        <div class="theme-article-content">
            <header class="entry-header">

                <?php if ( in_array('category', $enabled_post_meta) && has_category() ) :?>
                    <div class="entry-categories">
                        <div class="classicmag-entry-categories">
                            <?php the_category( ' ' ); ?>
                        </div>
                    </div><!-- .entry-categories -->
                <?php endif; ?>

                <?php the_title( '<h2 class="entry-title font-size-big line-clamp line-clamp-3 mb-16"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );?>
                
                <?php if ( 'post' === get_post_type() ) :?>
                    <div class="entry-meta mb-16">
                        <?php classicmag_post_meta_info($enabled_post_meta); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>

            </header><!-- .entry-header -->

            <div class="theme-article-excerpt mb-16">
                <?php get_template_part( 'template-parts/archive/archive', $post_format ); ?>
            </div><!-- .entry-content -->

            <?php 
            if ( 'aside' != $post_format && 'status' != $post_format ) { ?>
            <footer class="entry-meta entry-meta-footer">
                <?php classicmag_entry_footer($enabled_post_meta); ?>
            </footer>
            <?php } ?>
        </div>
        <?php 
        if ( 'gallery' === $post_format || 'audio' === $post_format || 'video' === $post_format ) {
            return;
        }
        ?>
        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <div class="entry-image">
                <figure class="featured-media image-size-big">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full'); ?>
                    </a>

                    <?php
                    $caption = get_the_post_thumbnail_caption();
                    if ( $caption ) {
                        ?>
                        <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>
                        <?php
                    }
                    ?>
                    <?php if (classicmag_get_option('show_lightbox_image')) { ?>
                        <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                            <?php classicmag_theme_svg('fullscreen'); ?>
                        </a>
                    <?php } ?>
                </figure><!-- .featured-media -->
                <?php $display_read_time_in = classicmag_get_option('display_read_time_in');
                if (in_array('archive-page', $display_read_time_in) && is_archive()) {
                    classicmag_read_time();
                }
                if (in_array('home-page', $display_read_time_in) && is_home()) {
                    classicmag_read_time();
                } ?>
            </div><!-- .entry-image -->
        <?php endif; ?>
        
    </div><!-- .article-block-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->