<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dokan
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>

<!-- If is shop then show shop sidebar -->
<div class="sidebar-button-toggler">
	<span><i class="icon icon-bag"></i> <?php echo __( 'Filter', 'dokan' ); ?></span>
</div><!-- end sidebar-button-toggler -->
<?php if (is_shop() || is_product_category() || is_product()): ?>
	<div id="secondary" class="widget-area col-md-3" role="complementary">
		<?php dynamic_sidebar( 'sanjeev-sidebar-shop' ); ?>
	</div><!-- #secondary -->
	
<?php else: ?>
	<div id="secondary" class="widget-area col-md-3" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
<?php endif ?>

