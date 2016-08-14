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


get_header('homepage'); ?>

	<section class="main-content">
		<div class="homepage-slider">
		</div> <!-- end homepage-slider -->

		<div class="container">
			<div class="row">
	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">



			<div class="banner-categories">
				<div class="san-title san-title-align-center">
					<div class="title">
					<h4 class="title-text">Categories</h4>
					</div>
					<div class="title-description">

						Quickly find what are you searching for.

					</div>
				</div> <!-- .san-title -->
				<div class="row">
					<div class="category-container col-md-4">
						<a href="http://waibanco.com/product-category/women/">
							<figure class="category-thumbnail">
								<img src="http://waibanco.com/wp-content/uploads/2015/11/categoryonenew.png" alt="">
								<figcaption>
									<h3>Women</h3>
								</figcaption>
							</figure>
						</a>
					</div> <!-- .category-container -->

					<div class="category-container col-md-4">
						<a href="http://waibanco.com/product-category/men/">
							<figure class="category-thumbnail">
								<img src="http://waibanco.com/wp-content/uploads/2015/02/men.jpg" alt="">
								<figcaption>
									<h3>Men</h3>
								</figcaption>
							</figure>
						</a>
					</div> <!-- .category-container -->

					<div class="category-container col-md-4">
						<a href="http://waibanco.com/product-category/kids/">
							<figure class="category-thumbnail">
								<img src="<?php echo get_template_directory_uri() ?>/assets/img/cat-3.jpg" alt="">
								<figcaption>
									<h3>Kids</h3>
								</figcaption>
							</figure>
						</a>
					</div> <!-- .category-container -->

					
				</div><!-- end row -->
			</div><!-- end banner-categories -->
			
			
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