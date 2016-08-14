<?php
/**
 * The template for full width page.
 *
 * This is the template that displays all pages in full width
 *
 * Template Name: Homepage
 *
 * @package waiba
 */


get_header(); ?>

<section class="main-content">
	<div class="homepage-slider">
	</div> <!-- end homepage-slider -->

	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-md-12">
				<main id="main" class="site-main" role="main">

					<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ): ?>
						<div class="san-title san-title-align-center">
							<div class="title">
								<h4 class="title-text">Featured Products</h4>
							</div>
							<div class="title-description">
								Find the best products from our store.
							</div>
						</div>
						<?php echo do_shortcode('[featured_products per_page="4" columns="4"]') ?>
						<div class="san-title san-title-align-center">
							<div class="title">
								<h4 class="title-text">Recent Products</h4>
							</div>
							<div class="title-description">
								Find the latest products from our store.
							</div>
						</div>
						<?php echo do_shortcode('[recent_products per_page="4" columns="4"]') ?>
					<?php endif ?>

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
			<?php get_footer(); ?>