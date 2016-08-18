<?php 
	
function dokan_customize_register( $wp_customize ){

	/**
	 *
	 * Panels
	 *
	 */
	
	$wp_customize->add_panel( 'dokan_panel_main', array(
		'priority'       => 160,
		'title'          => __( 'Dokan Theme Option', 'dokan' ),
		'description'    => __( 'Panle Description.', 'dokan' ),
		'capability'     => 'edit_theme_options',
	) );
	
	
	/**
	 *
	 * SECTIONS
	 *
	 */

	/*----------  HEADER  ----------*/
	$wp_customize->add_section( 'dokan_section_header', array(
		'priority'       => 160,
		'panel'          => 'dokan_panel_main',
		'title'          => __( 'Header Options', 'dokan' ),
		'description'    => __( 'Customization on header', 'dokan' ),
		'capability'     => 'edit_theme_options',
	) );
	
	/*----------  MEGAMENU  ----------*/
	$wp_customize->add_section( 'dokan_section_megamenu', array(
		'priority'       => 160,
		'panel'          => 'dokan_panel_main',
		'title'          => __( 'Megamenu Settings', 'dokan' ),
		'description'    => __( 'Megamenu styles and settings', 'dokan' ),
		'capability'     => 'edit_theme_options',
	) );
	
	/*----------  HOMEPAGE  ----------*/
	$wp_customize->add_section( 'dokan_section_homepage', array(
		'priority'       => 160,
		'panel'          => 'dokan_panel_main',
		'title'          => __( 'Homepage Settings', 'dokan' ),
		'description'    => __( '', 'dokan' ),
		'capability'     => 'edit_theme_options',
	) );


	/*----------  SOCIAL  ----------*/
	$wp_customize->add_section( 'dokan_section_social', array(
		'priority'       => 160,
		'panel'          => 'dokan_panel_main',
		'title'          => __( 'Social Settings', 'dokan' ),
		'description'    => __( 'Leave field empty that you dont want to show', 'dokan' ),
		'capability'     => 'edit_theme_options',
	) );


	/*==============================
	=            HEADER            =
	==============================*/
	
	/*----------  Header top text  ----------*/
	$wp_customize->add_setting( 'dokan_header_text', array(
		'type' 			=> 'theme_mod',
		'default' 		=> 'Shipping Worldwide',
		'transport' 	=> 'refresh',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control( 'dokan_header_text', array(
		'label'       => __( 'Header Tagline', 'dokan' ),
		'description' => __( 'Tagline that on the left top', 'dokan' ),
		'section'     => 'dokan_section_header',
		'type'        => 'text',
		'settings'    => 'dokan_header_text',
	) );
	

	/*----------  logo  ----------*/
	// Setting: Name.
	$wp_customize->add_setting( 'dokan_setting_logo', array(
		'type'                 => 'theme_mod',
		'default'              =>  get_template_directory_uri() . '/assets/img/logo.png',
		'transport'            => 'refresh', 
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'dokan_setting_logo',
		array(
			'label'      => __( 'Logo', 'dokan' ),
			'description' => 'Upload logo. Recommend logo size is 130 x 70',
			'section'    => 'dokan_section_header',
			'settings'   => 'dokan_setting_logo',
		)
	) );
	
	/*=====  End of HEADER  ======*/
	
	

	/*================================
	=            MEGAMENU            =
	================================*/
	$wp_customize->add_setting( 'dokan_setting_megamenu_style', array(
		'type'                 => 'theme_mod',
		'default'              => 'default',
		'transport'            => 'refresh', 
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
	) );
	
	// Control: Name.
	$wp_customize->add_control( 'dokan_setting_megamenu_style', array(
		'label'       => __( 'Megamenu Style', 'dokan' ),
		'description' => __( 'Choose the megamenu style you want', 'dokan' ),
		'section'     => 'dokan_section_megamenu',
		'type'        => 'select',
		'choices'  => array(
			''  => 'Default',
			'dark' => 'Dark',
		),
		'settings'    => 'dokan_setting_megamenu_style',
	) );

	/*=====  End of MEGAMENU  ======*/
	


	/*=======================================
	=            HOMEPAGE SLIDER            =
	=======================================*/
	
	/*----------  Homeapge slider  ----------*/
	$wp_customize->add_setting( 'dokan_homepage_slider', array(
		'type'                 => 'theme_mod',
		'default'              => '0',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
	) );
	
	$wp_customize->add_control( 'dokan_homepage_slider', array(
		'label'       => __( 'Enable Homepage Slider', 'dokan' ),
		'description' => __( '', 'dokan' ),
		'section'     => 'dokan_section_homepage',
		'type'        => 'checkbox',
		'settings'    => 'dokan_homepage_slider',
	) );
	
	/*----------  homepage sldier shortcode  ----------*/
	
	$wp_customize->add_setting( 'dokan_homepage_slider_list', array(
		'type'                 => 'theme_mod',
		'default'              => '0',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
	) );

	if (function_exists( 'get_masterslider_names' ) ) {
		$slider_list = get_masterslider_names( true );
	}else{
		$slider_list = array( 'Master slider is not active');
	}

	$wp_customize->add_control( 'dokan_homepage_slider_list', array(
		'label'       => __( 'Select Homepage Slider', 'dokan' ),
		'description' => __( '', 'dokan' ),
		'section'     => 'dokan_section_homepage',
		'type'        => 'select', 
		'choices'  => $slider_list,
		'settings'    => 'dokan_homepage_slider_list',
	) );
	
	/*=====  End of HOMEPAGE SLIDER  ======*/
	
	
}
add_action( 'customize_register', 'dokan_customize_register' );


/*----------  Enqueue Customizer JS  ----------*/
function dokan_customizer_js() {
	wp_enqueue_script( 'customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'dokan_customizer_js' );
?>