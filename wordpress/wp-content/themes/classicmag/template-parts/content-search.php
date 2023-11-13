<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Classicmag
 */
$enabled_post_meta = array();
$enabled_post_meta = classicmag_get_option('archive_post_meta_1');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("theme-border-space border-space-large"); ?>>
	<div class="article-block-wrapper">
		<div class = "theme-article-content">
			<header class="entry-header">

				<?php if ( in_array('category', $enabled_post_meta) && has_category() ) :?>
					<div class="entry-categories">

							<div class="classicmag-entry-categories">
									<?php the_category( ' ' ); ?>
							</div>
					</div><!-- .entry-categories -->
				<?php endif; ?>

				<?php the_title( sprintf( '<h2 class="entry-title font-size-big line-clamp line-clamp-3 mb-16"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) :?>
						<div class="entry-meta mb-16">
								<?php classicmag_post_meta_info($enabled_post_meta); ?>
						</div><!-- .entry-meta -->
				<?php endif; ?>

			</header><!-- .entry-header -->

			<?PHP if ( absint(classicmag_get_option( 'excerpt_length' )) != '0'){ ?>
				<div class="theme-article-excerpt mb-16">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php } ?>

			<footer class="entry-footer">
				<?php classicmag_entry_footer($enabled_post_meta); ?>
			</footer><!-- .entry-footer -->
		</div>

		<?php classicmag_post_thumbnail(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->