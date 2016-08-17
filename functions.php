<?php
/**
 * dokan functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dokan
 */

if ( ! function_exists( 'dokan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dokan_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dokan, use a find and replace
	 * to change 'dokan' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dokan', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dokan' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dokan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'woocommerce' );
}
endif; // dokan_setup
add_action( 'after_setup_theme', 'dokan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dokan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dokan_content_width', 640 );
}
add_action( 'after_setup_theme', 'dokan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dokan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dokan' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	   /**
		* Creates a sidebar
		* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		*/
		$args = array(
			'name'          => __( 'Footer Bottom', 'Adds to the bottom of footer' ),
			'id'            => 'dokan-sidebar-footer-bottom',
			'description'   => 'Only place social widgets here',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>'
		);
	
		register_sidebar( $args );


	   /**
		* Creates a sidebar
		* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		*/
		$shop_sidebar_args = array(
			'name'          => __( 'Shop Sidebar', 'dokan' ),
			'id'            => 'dokan-sidebar-shop',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>'
		);
	
		register_sidebar( $shop_sidebar_args );
	
	
}
add_action( 'widgets_init', 'dokan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dokan_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'dokan-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-lato', 'https://fonts.googleapis.com/css?family=Lato:400,700');
	wp_enqueue_style( 'font-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dokan-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dokan_scripts' );

/**
 *
 * Custom image size
 *
 */
add_image_size( 'dokan-banner-category', 360, 225, true );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Woocommerce compatibility.
 */
require get_template_directory() . '/inc/woocommerce.php';
require get_template_directory() . '/admin/plugin-activator//required-plugins.php';