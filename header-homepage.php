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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header-main">
		<div class="header-top">
			<div class="container">
				<div class="topbar-container">
					<div class="top-bar-left">
						<p class="topbar-info-text">Shipping Worldwide | Free Shipping for Nepal</p>
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
									<li class="user-logout"><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a></li>
								<?php
								
							}else{
								?>
									<li class="user-login"><a href="<?php echo bloginfo('url') ?>/register/">Register</a></li>
									<li class="user-login"><a href="<?php echo bloginfo('url') ?>/login/">Login</a></li>
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
				<div class="text-center logo-main-site">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt=""></a>
				</div><!-- end site-logo -->
				<div class="table-wrapper">

					<div class="main-nav">
						<?php    /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							$args = array(
								'theme_location' => 'primary',
								'menu_class' => 'navigation-main',
							);
						
							wp_nav_menu( $args ); ?>
					</div><!-- end main-nav -->

					<div class="header-actions-container">
						<ul class="header-actions">
							<li class="haction-search header-list">
								<a href=""><i class="icon icon-magnifier"></i></a>

								<div class="search-form">
									<h6>Search Products</h6>
									<?php get_product_search_form(); ?>
								</div>
							</li>
							<li class="haction-mini-cart header-list">
								<i class="icon icon-bag"></i> <span class="product-countation"><?php echo WC()->cart->cart_contents_count ?></span>

								<div class="header-mini-cart-wrapper">
									<?php woocommerce_mini_cart(); ?>
								</div><!-- end header-mini-cart-wrapper -->
								
							</li>
						</ul> <!-- end header-actions -->
					</div><!-- end header-actions-contaienr -->
				</div> <!-- end table wrapper -->
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
						<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="bag-icon"><i class="icon icon-bag"></i></a>
					</div>
				</div>
			</div>
		</div><!-- end header-mobile -->
	</header><!-- end header-main -->
