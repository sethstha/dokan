<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dokan
 */

?>
			</div> <!-- end row -->
		</div><!-- end container -->
	</section> <!-- end main-content -->

	<footer class="footer-main">
		<div class="footer-top">
			<div class="container">
				<div class="table-wrapper">
					<div class="widget widget-social">
						<h3 class="widget-title">Social</h3>
						<ul class="social-share">
							<li class="social-icon facebook"><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
								<span>facebook</span>
							</li>
							<li class="social-icon twitter"><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
								<span>twitter</span>
							</li>
							<li class="social-icon pinterest"><a href="https://www.pinterest.com//"><i class="fa fa-pinterest"></i></a>
								<span>pinterest</span>
							</li>
							<li class="social-icon instagram"><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
								<span>instagram</span>
							</li>
						</ul>
					</div><!-- end widget -->
				</div>

				<div class="clearfix"></div>
				<hr class="seperator">
			</div><!-- end container -->
		</div><!-- end footer-top -->

		<div class="footer-middle">
			<div class="container">
				<div class="widget widget-newsletter row">
					<div class="widget-header col-md-3 col-sm-12">
						<h6 class="widget-title">Newsletter Signup</h6>
						<p>Stay on fashion and know about fashion</p>
					</div> <!-- end widget-header -->

					<form action="" class="form-newsletter col-md-9 col-sm-12">
						<div class="row">
							<div class="input-wrapper col-md-7 col-sm-12">
								<input type="text" class="input-text">
							</div><!-- end input-wrapper -->
							<div class="buttons col-md-5 col-sm-12">
								<div class="pull-right">
									<button type="submit" href="" class="button button-primary">Men</button>
									<button type="submit" href="" class="button button-secondary">Women</button>
								</div>
							</div><!-- end buttons -->
						</div><!-- end row -->
					</form><!-- end form-newsletter -->
				</div><!-- end widget -->

				<div class="footer-link-sections">
					<div class="row">
						<?php // Dynamic Sidebar
						if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'waiba-sidebar-footer-bottom' ) ) : ?>
					
							<div class="alert"><p>Please Add some widgets on footer bottom</p></div>
					
						<?php endif; // End Dynamic Sidebar Sidebar footer top ?>
					</div><!-- end row -->
				</div><!-- end footer-link-sections -->
			</div><!-- end container -->

		</div><!-- end form-middle -->

		<div class="footer-bottom">
			<div class="container">
				<div class="table-wrapper">
					<div class="copyright">
						<p>Copyright <?php echo date('Y') ?> <?php echo bloginfo( 'name' ); ?> all right reserved</p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- end footer-main -->

<?php wp_footer(); ?>

</body>
</html>