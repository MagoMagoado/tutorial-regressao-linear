<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Classicmag
 */

get_header();

// Add a main container in case if sidebar is present
$class = '';
$page_layout = classicmag_get_page_layout();

?>
    <main id="site-content" role="main">
        <div class="wrapper">
            <div id="primary" class="content-area theme-sticky-component">

                <?php if (have_posts()) : ?>

                    <header class="page-header mb-32">
                        <?php
                        the_archive_title('<h1 class="page-title font-size-big">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->

                    <?php

                    echo '<div class="classicmag-article-wrapper">';
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'archive');

                    endwhile;

                    echo '</div><!-- .classicmag-article-wrapper -->';

                    get_template_part('template-parts/pagination');

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>

            </div> <!-- #primary -->

        </div>
    </main> <!-- #site-content-->
<?php
get_footer();