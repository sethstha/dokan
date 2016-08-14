<?php 
/*============================================
=            WOOCOMMERCE WRAPPERS            =
============================================*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'sanjeev_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'sanjeev_wrapper_end', 10);

function sanjeev_wrapper_start() {
	if (is_shop() || is_product_category()) {
		echo '<div id="primary" class="content-area col-md-9">';
	}else{
		echo '<div id="primary" class="content-area col-md-12">';
	}
	echo '<main id="main" class="site-main" role="main">';
}

function sanjeev_wrapper_end() {
	echo '</main><!-- end main -->';
	echo '</div> <!-- end primary -->';
}

/*=====  End of WOOCOMMERCE WRAPPERS  ======*/

/*==============================================
=            CUSTOM IMAGE THUMBNAIL  WRAPPER   =
==============================================*/
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail_link_start',9 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail_link_end',11 );
function woocommerce_template_loop_product_thumbnail_link_start(){
	echo '<a href="'. get_permalink(). '">';
}

function woocommerce_template_loop_product_thumbnail_link_end(){
	echo '</a>';
}

/*=================================================
=            PRODUCT THUMBNAIL WRAPPER            =
=================================================*/
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_before_shop_look_wrapper_start', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_before_shop_look_wrapper_end', 20 );

function woocommerce_before_shop_look_wrapper_start(){
	echo '<div class="product-thumbnail">';
}

function woocommerce_before_shop_look_wrapper_end(){
	echo '</div><!-- end product-thumbnail -->';
}

/*=====  End of PRODUCT THUMBNAIL WRAPPER  ======*/


/*----------  REMOVING BREADCRUMB  ----------*/
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
/*----------  REMOVING WOOCOMEMRCE CSS  ----------*/
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


/*====================================================
=            WRAPPING WOOCOMMERCE FILTERS            =
====================================================*/

add_action( 'woocommerce_before_shop_loop', 'sanjeev_filter_wrapper_start', 10 );
add_action( 'woocommerce_before_shop_loop', 'sanjeev_filter_wrapper_end', 40 );

function sanjeev_filter_wrapper_start(){
	echo '<div class="clearfix"></div>';
	echo '<div class="woocommerce-filters row">';
}

function sanjeev_filter_wrapper_end(){
	echo '</div><!-- woocommerce-filters -->';
	echo '<div class="clearfix"></div>';
}
/*=====  End of WRAPPING WOOCOMMERCE FILTERS  ======*/


/*=================================================================================
=            Removes title from product and put it on top of thumbnail            =
=================================================================================*/

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 14 );

/*=====  End of Removes title from product and put it on top of thumbnail  ======*/

/*================================================
=            INFO WRAPPER FOR PRODUCT            =
================================================*/

add_action( 'woocommerce_shop_loop_item_title', 'product_info_wrapper_start', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'product_info_wrapper_end', 15 );

function product_info_wrapper_start(){
	echo '<div class="info">';
}

function product_info_wrapper_end(){
	echo '</div><!-- end info -->';
}
/*=====  End of INFO WRAPPER FOR PRODUCT  ======*/


/*=======================================================
=            Lets put top actions on product (inner actions)           =
=======================================================*/
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_add_top_actions', 12);

function woocommerce_add_top_actions(){
	global $product;
	$label = esc_html( get_option( 'yith-wcqv-button-label' ) );
	?>
	<ul class="top-actions">
		<?php echo '<li><a href="#" class="button button-style-link yith-wcqv-button" data-product_id="' . $product->id . '"><i class="fa fa-search-plus"></i>' . $label . '</a></li'; ?>
	</ul>
	<?php
}

/*=====  End of Lets put top actions on product  ======*/

/*======================================
=            AJAX MINI CART	            =
======================================*/

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<li class="haction-mini-cart header-list">
		<i class="icon icon-bag"></i> <span class="product-countation"><?php echo WC()->cart->cart_contents_count ?></span>

		<div class="header-mini-cart-wrapper">
			<?php woocommerce_mini_cart(); ?>
		</div><!-- end header-mini-cart-wrapper -->
		
	</li>
	<?php
	
	$fragments['li.haction-mini-cart'] = ob_get_clean();
	
	return $fragments;
}

/*=====  End of AJAX MINI CART	  ======*/


/*=============================================
=            HIDE EMPTY CATEGORY            =
=============================================*/


function woo_hide_product_categories_widget( $list_args ){
	$list_args[ 'hide_empty' ] = 1;
	return $list_args;
}
add_filter( 'woocommerce_product_categories_widget_args', 'woo_hide_product_categories_widget' ); 

/*=====  End of HIDE EMPTY CATEGORY  ======*/


/*======================================
=            DISABLE REVIEW            =
======================================*/

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}

/*=====  End of DISABLE REVIEW  ======*/


/*Woocommerce Title */
if (  ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	/**
	 * Show the product title in the product loop. By default this is an H3.
	 */
	function woocommerce_template_loop_product_title() {
    ?>
		<a href="<?php the_permalink()?>"> 
			<h3 class="name"><?php the_title(); ?></h3>
		</a>
		<?php
	}
}


?>