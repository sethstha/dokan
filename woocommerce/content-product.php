<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}

if (is_shop() || is_product_category()) {
	$classes[] = "col-lg-4 col-xs-6";
}elseif (is_product()) {
	$classes[] = "col-lg-3 col-xs-6";
}else{
	$classes[] = "col-lg-3 col-xs-6";
}
 
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
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
			 * @hooked storeone_quickview - 11
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
