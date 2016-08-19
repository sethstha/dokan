<?php
/*
* Required plugins activator
* @package:dokan
*/

require_once get_template_directory() . '/admin/plugin-activator/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dokan_register_required_plugins' );

function dokan_register_required_plugins() {
	$plugins = array(

		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => true,
		),

		array(
			'name'      => 'YITH WooCommerce Quick View',
			'slug'      => 'yith-woocommerce-quick-view',
			'required'  => true,
		),

		array(
			'name'      => 'YITH WooCommerce Zoom Magnifier',
			'slug'      => 'yith-woocommerce-zoom-magnifier',
			'required'  => true,
		),

		array(
			'name'      => 'WR Megamenu',
			'slug'      => 'wr-megamenu',
			'required'  => true,
		),

		array(
			'name'      => 'ZM Ajax Login & Register',
			'slug'      => 'zm-ajax-login-register',
			'required'  => true,
		),

		array(
			'name'      => 'Master Slider',
			'slug'      => 'master-slider',
			'required'  => true,
		),
	);

	
	$config = array(
		'id'           => 'dokan',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',           
		'capability'   => 'edit_theme_options',   
		'has_notices'  => true,                 
		'dismissable'  => false,                   
		'dismiss_msg'  => '',                     
		'is_automatic' => false,                 
		'message'      => '',                     
		
	);

	tgmpa( $plugins, $config );
}
