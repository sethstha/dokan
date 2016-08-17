<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dokan
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		<?php if (has_post_thumbnail()): ?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail( 'large' ); ?>
			</figure>
		<?php endif ?>

		<div class="entry-meta">
			<div class="entry-meta-container">
				<?php dokan_posted_on(); ?>
			</div>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'waiba' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php dokan_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

