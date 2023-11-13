<?php
if (!defined('ABSPATH')) {
    exit;
}
class Classicmag_Article_Carousel extends Classicmag_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'classicmag_single_article_carousel_widget';
        $this->widget_description = __("Displays post from single category in carousel widget", 'classicmag');
        $this->widget_id = 'classicmag-single-article-carousel-widget';
        $this->widget_name = __('Classicmag: Article Carousel', 'classicmag');
        $this->settings = array(
            'title_1' => array(
                'type' => 'text',
                'label' => __('Widget Title', 'classicmag'),
                'std' => __('Single Category Widget', 'classicmag'),

            ),
            'select_category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Featured Column: Select Category', 'classicmag'),
                'desc' => __('If you don\'t wish to specify a category for the posts, please leave this field empty.', 'classicmag'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'classicmag'),
                ),
            ),
        );
        parent::__construct();
    }
    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];
        do_action('classicmag_before_article_post_style');
        ?>
        <?php $article_single_posts_style_arg = array(
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'no_found_rows' => 1,
            'ignore_sticky_posts' => 1,
        );
        if (!empty($instance['select_category']) && -1 != $instance['select_category'] && 0 != $instance['select_category']) {
            $article_single_posts_style_arg['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $instance['select_category'],
            );
        } ?>

        <div class="theme-article-carousel ">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <?php if (!empty($instance['title_1'])) {?>
                            <div class="theme-section-head">
                                <h2> <?php echo esc_html($instance['title_1']); ?> </h2>
                            </div>
                        <?php } ?>

                        <div class="theme-section-body">
                            <div class="article-carousel-container swiper">
                                <div class="swiper-wrapper">
                                <?php 
                                $classicmag_article_posts_style_query = new WP_Query($article_single_posts_style_arg);
                                if ($classicmag_article_posts_style_query->have_posts()):
                                    while ($classicmag_article_posts_style_query->have_posts()):
                                        $classicmag_article_posts_style_query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <div class="theme-news-article">
                                                    <div class="theme-article-image image-size-small mb-8">
                                                        <?php classicmag_post_thumbnail(); ?>
                                                    </div>

                                                    <h2 class="entry-title font-size-small line-clamp line-clamp-2 m-0 mb-8">
                                                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                                                    </h2>
                                                    <div class="entry-meta entry-meta-bottom"> <?php classicmag_posted_on();  ?></div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>

                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        do_action('classicmag_after_article_post_style');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}