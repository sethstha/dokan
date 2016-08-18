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
					<?php 
						if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'dokan-sidebar-footer-top' ) ) : ?>
					
							<div class="alert alert-warning"><p><?php echo __( 'Please Add some widgets on footer top', 'dokan' ) ?></p></div>
					
						<?php endif;?>
				</div>

				<div class="clearfix"></div>
				<hr class="seperator">
			</div><!-- end container -->
		</div><!-- end footer-top -->

		<div class="footer-middle">
			<div class="container">
				<div class="widget widget-newsletter row">
					<div class="widget-header col-md-3 col-sm-12">
						<h6 class="widget-title"><?php echo __( 'Newsletter Signup', 'dokan' ) ?></h6>
						<p><?php echo __( 'Stay on fashion and know about it', 'dokan' ) ?></p>
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
						<?php 
						if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'dokan-sidebar-footer-bottom' ) ) : ?>
					
							<div class="alert"><p><?php echo __( 'Please Add some widgets on footer bottom', 'dokan' ) ?></p></div>
					
						<?php endif;?>
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