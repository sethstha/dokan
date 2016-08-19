<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dokan
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- Facebook Pixel Code -->
<!-- End Facebook Pixel Code -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header-main">
	<div class="header-top">
		<div class="container">
			<div class="topbar-container">
				<div class="top-bar-left">
					<p class="topbar-info-text"><?php echo get_theme_mod( 'dokan_header_text', 'Shipping Worldwide' ); ?></p>
				</div><!-- end top-bar-container -->

				<div class="top-bar-right">
					<ul class="top-bar-menu">
						<?php 
						if (is_user_logged_in()) {
							global $current_user;
							$name = get_the_author_meta('first_name');

							if (empty($name)) {
								$name = get_the_author_meta( 'user_login' );
							}

							?>

								<li><a href="<?php echo the_author_meta('user_url') ?>"><?php echo $name ?></a> </li>
								<li class="user-logout"><a href="<?php echo wp_logout_url( get_permalink() ); ?>"><?php echo __('Logout', 'dokan') ?></a></li>
							<?php
							
						}else{
							?>
            					<li class="user-login"><a href="<?php echo esc_url( home_url() ) ?>/register/"><?php echo __('Register', 'dokan') ?></a></li>
								<li class="user-login"><a href="<?php echo esc_url( home_url() ) ?>/login/"><?php echo __('Login', 'dokan') ?></a></li>
							<?php
						}

						?>
						
					</ul><!-- end top-bar-menu -->
				</div><!-- end top-bar-right -->
			</div><!-- end topbar-container -->
		</div><!-- end container -->
	</div><!-- end header-top -->

	<div class="header-bottom">
		<div class="container">
			<div class="container-relative">
				<div class="text-center logo-main-site">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'dokan_setting_logo' ) ); ?>" alt=""></a>
				</div><!-- end site-logo -->
				<div class="table-wrapper">

					<nav class="navigation-primary <?php echo get_theme_mod( 'dokan_setting_megamenu_style' ); ?>">
						<?php    /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							$args = array(
								'theme_location' => 'primary',
								'menu_class' => 'menu-primary',
							);
						
							wp_nav_menu( $args ); ?>
					</nav><!-- end main-nav -->

					<div class="header-actions-container">
						<ul class="header-actions">
							<li class="haction-search header-list">
								<a href=""><i class="icon icon-magnifier"></i></a>

								<div class="search-form">
									<h6><?php echo __('Search Products', 'dokan') ?></h6>
									<?php 
									if ( class_exists( 'WooCommerce') ) {
										get_product_search_form(); 
									}else{
										get_search_form();
									}
									?>
								</div>
							</li>
							<?php if ( class_exists( 'WooCommerce' ) ): ?>
								<li class="haction-mini-cart header-list">
									<i class="icon icon-bag"></i> <span class="product-countation"><?php echo WC()->cart->cart_contents_count ?></span>

									<div class="header-mini-cart-wrapper">
										<?php woocommerce_mini_cart(); ?>
									</div><!-- end header-mini-cart-wrapper -->
									
								</li>
							<?php endif ?>
						</ul> <!-- end header-actions -->
					</div><!-- end header-actions-contaienr -->
				</div> <!-- end table wrapper -->
			</div><!-- end container-relative -->
		</div><!-- end container -->
	</div><!-- end header-bottom -->

	<div class="header-mobile">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					
				</div>
				<div class="col-md-8 mobile-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt=""></a>
				</div>
				<div class="col-md-2">
					<?php if ( class_exists( 'WooCommerce' ) ): ?>
						<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="bag-icon"><i class="icon icon-bag"></i></a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div><!-- end header-mobile -->
</header><!-- end header-main -->

<?php if ( is_front_page() ): ?>
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
<?php endif ?>

	<section class="main-content">

	<?php if ( class_exists( 'WooCommerce' ) ): ?>
		<?php if ( is_woocommerce() ): ?>
			<div class="container">
				<div class="row">
		<?php endif ?>
	<?php endif ?>