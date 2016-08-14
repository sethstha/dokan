<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Dokan
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
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
		'id'           => 'dokan',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}
