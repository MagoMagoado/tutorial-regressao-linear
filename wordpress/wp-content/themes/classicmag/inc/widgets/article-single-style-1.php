<?php
if (!defined('ABSPATH')) {
    exit;
}
class Classicmag_Article_Single_Style_1 extends Classicmag_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'classicmag_single_article_posts_style_widget';
        $this->widget_description = __("Displays post from single category widget", 'classicmag');
        $this->widget_id = 'classicmag-single-article-post-style-1-widget';
        $this->widget_name = __('Classicmag: Single Category Post Style 1', 'classicmag');
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
            'posts_per_page' => 5,
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



        <div class="theme-two-column ">
            <div class="wrapper">
                <?php if (!empty($instance['title_1'])) {?>
                    <div class="column-row">
                        <div class="column column-12">
                            <div class="theme-section-head">
                                <h2> <?php echo esc_html($instance['title_1']); ?> </h2>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="column-row theme-grid-border">
                    <?php 
                    $count = 1;
                    $classicmag_article_posts_style_query = new WP_Query($article_single_posts_style_arg);
                    if ($classicmag_article_posts_style_query->have_posts()):
                        while ($classicmag_article_posts_style_query->have_posts()):
                            $classicmag_article_posts_style_query->the_post();
                        if ($count == 1) { ?>
                    <div class="column column-9 column-md-12 column-sm-12">
                        <article class="theme-news-article theme-article-flex">
                            <div class="theme-article-content">
                                <div class="entry-meta entry-meta-top"></div>

                                <h2 class="entry-title font-size-big line-clamp line-clamp-5 mb-16">
                                    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                                </h2>

                                <div class="theme-article-excerpt line-clamp line-clamp-6 mb-16">
                                    <?php if (has_excerpt()) {
                                        the_excerpt();
                                    } else {
                                        echo esc_html(wp_trim_words( get_the_content(), 46, '...' ));
                                    } ?>
                                </div>

                                <div class="entry-meta entry-meta-bottom">
                                    <?php
                                    classicmag_posted_on();
                                    ?>
                                </div>
                            </div>

                            <div class="theme-article-image image-size-big">
                                <?php classicmag_post_thumbnail(); ?>
                            </div>
                        </article>
                    </div>

                    <div class="column column-3 column-md-12 column-sm-12">
                         <?php $count++; } else { ?>
                        <article class="theme-news-article theme-border-space border-space-big">
                            <div class="theme-article-content">
                                <h2 class="entry-title font-size-small line-clamp line-clamp-2 m-0 mb-8">
                                    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                                </h2>

                                <div class="entry-meta entry-meta-bottom">
                                    <?php
                                        classicmag_posted_on();
                                        ?>
                                </div>
                            </div>
                        </article>
                            <?php if ($classicmag_article_posts_style_query->current_post +1 == $classicmag_article_posts_style_query->post_count) {
                                    echo "</div>";
                                }
                            } ?>
                        <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
        do_action('classicmag_after_article_post_style');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}