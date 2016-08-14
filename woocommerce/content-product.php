<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Extra post classes
$classes = array();

if (is_shop() || is_product_category()) {
	$classes[] = "col-lg-4 col-xs-6";
}elseif (is_product()) {
	$classes[] = "col-lg-3 col-xs-6";
}else{
	$classes[] = "col-lg-3 col-xs-6";
}
 
?>
<li <?php post_class( $classes ); ?>>
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_before_shop_look_wrapper_start -5
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail_link_start -9
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 * @hooked sanjeev_quickview - 11
			 * &hooked woocommerce_add_top_actions -12
			 * @hooked woocommerce_template_loop_add_to_cart - 13
			 * @hooked woocommerce_template_loop_product_thumbnail_link_end -14
			 * @hooked woocommerce_before_shop_look_wrapper_end -20
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * woocommerce_shop_loop_item_title hook
			 *
			 * @hooked product_info_wrapper_start - 5
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	<?php

		/**
		 * woocommerce_after_shop_loop_item hook
		 *
		 * @hooked product_info_wrapper_end - 15
		 */
		do_action( 'woocommerce_after_shop_loop_item' );

	?>

</li>
