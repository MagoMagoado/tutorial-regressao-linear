<?php
/**
 * Displays recommended post on footer.
 *
 * @package Classicmag
 */
$enable_category_meta = classicmag_get_option('enable_category_meta');
$enable_date_meta = classicmag_get_option('enable_date_meta');
$enable_post_excerpt = classicmag_get_option('enable_post_excerpt');
$enable_author_meta = classicmag_get_option('enable_author_meta');
$footer_recommended_post_title = classicmag_get_option('footer_recommended_post_title');
$select_cat_for_footer_recommended_post = classicmag_get_option('select_cat_for_footer_recommended_post');
?>
<section class="site-section site-recommendation-section">
    <div class="wrapper">
        <div class="column-row">
             <div class="column column-12">
                 <div class="theme-section-head">
                     <h2>
                         <?php echo esc_html($footer_recommended_post_title); ?>
                     </h2>
                 </div>
             </div>
        </div>
        <div class="column-row">

            <?php $footer_recommended_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_footer_recommended_post)));
            if ($footer_recommended_post_query->have_posts()):
            while ($footer_recommended_post_query->have_posts()): $footer_recommended_post_query->the_post();
                ?>
                <div class="column column-4 column-sm-6 column-xs-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-recommended-post'); ?>>
                        <?php the_title( '<h3 class="entry-title font-size-small line-clamp line-clamp-2 m-0 mb-8"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

                        <div class="theme-article-excerpt line-clamp line-clamp-3 mb-8">
                            <?php the_excerpt(); ?>
                        </div>

                        <div class="entry-meta entry-meta-bottom">
                            <?php if ($enable_date_meta) {  classicmag_posted_on(); } ?>
                        </div>
                    </article>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php endif; ?>
        