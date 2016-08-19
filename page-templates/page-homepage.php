<?php
/**
 * The template for full width page.
 *
 * This is the template that displays all pages in full width
 *
 * Template Name: Homepage
 *
 * @package dokan
 */


get_header(); ?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-md-12">
			<main id="main" class="site-main" role="main">


				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page-homepage' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- end row -->
</div><!-- end container -->
<?php get_footer(); ?>
