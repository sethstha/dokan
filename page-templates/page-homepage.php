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
	
	<?php if ( get_theme_mod( 'dokan_homepage_slider') == 1 ): ?>
		<div class="homepage-slider">
			<?php if ( is_plugin_active( 'master-slider/master-slider.php' ) ): ?>
			<?php 
				if ( !get_theme_mod( 'dokan_homepage_slider_list' ) == 0 ): 
					$slider_id = get_theme_mod( 'dokan_homepage_slider_list' );
					masterslider($slider_id);
				endif
			?>
			<?php else: ?>
				<div class="alert alert-danger">
				 	<strong>Error! </strong> Master Slider is not activated. Please activate it first.
				</div>
			<?php endif ?>
		</div> <!-- end homepage-slider -->
	<?php endif ?>
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
						<?php echo do_shortcode('[featured_products per_page="8" columns="8"]') ?>
						<div class="san-title san-title-align-center">
							<div class="title">
								<h4 class="title-text">Recent Products</h4>
							</div>
							<div class="title-description">
								Find the latest products from our store.
							</div>
						</div>
						<?php echo do_shortcode('[recent_products per_page="8" columns="8"]') ?>
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