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

	/*----------  SOCIAL  ----------*/
	$wp_customize->add_section( 'dokan_section_color', array(
		'priority'       => 160,
		'panel'          => 'dokan_panel_main',
		'title'          => __( 'Colors', 'dokan' ),
		'description'    => __( 'Change colors of several parts', 'dokan' ),
		'capability'     => 'edit_theme_options',
	) );


	/**
	 *
	 * Controls
	 *
	 */
	
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
	
	
	/*==============================
	=            COLORS            =
	==============================*/
	
	// Setting: Header top color.
	$wp_customize->add_setting( 'dokan_color_header_top', array(
		'type'                 => 'theme_mod',
		'default'              => '#1E1E1F',
		'transport'            => 'postMessage', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'sanitize_hex_color',
	) );
	
	// Control: Header top color.
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'dokan_color_header_top',
		array(
			'label'      => __( 'Header top color', 'dokan' ),
			'section'    => 'dokan_section_color',
			'settings'   => 'dokan_color_header_top',
		)
	) );

	// Setting: Footer top color.
	$wp_customize->add_setting( 'dokan_color_footer_top', array(
		'type'                 => 'theme_mod',
		'default'              => '#252525',
		'transport'            => 'postMessage', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'sanitize_hex_color',
	) );
	
	// Control: Footer top color.
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'dokan_color_footer_top',
		array(
			'label'      => __( 'Footer top color', 'dokan' ),
			'section'    => 'dokan_section_color',
			'settings'   => 'dokan_color_footer_top',
		)
	) );
	
	// Setting: Footer middle color.
	$wp_customize->add_setting( 'dokan_color_footer_middle', array(
		'type'                 => 'theme_mod',
		'default'              => '#252525',
		'transport'            => 'postMessage', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'sanitize_hex_color',
	) );
	
	// Control: Footer middle color.
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'dokan_color_footer_middle',
		array(
			'label'      => __( 'Footer middle color', 'dokan' ),
			'section'    => 'dokan_section_color',
			'settings'   => 'dokan_color_footer_middle',
		)
	) );


	// Setting: Footer bottom color.
	$wp_customize->add_setting( 'dokan_color_footer_bottom', array(
		'type'                 => 'theme_mod',
		'default'              => '#000000',
		'transport'            => 'postMessage', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'sanitize_hex_color',
	) );
	
	// Control: Footer bottom color.
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'dokan_color_footer_bottom',
		array(
			'label'      => __( 'Footer bottom color', 'dokan' ),
			'section'    => 'dokan_section_color',
			'settings'   => 'dokan_color_footer_bottom',
		)
	) );

	/*=====  End of COLORS  ======*/
	
}
add_action( 'customize_register', 'dokan_customize_register' );


/*----------  Enqueue Customizer JS  ----------*/
function dokan_customizer_js() {
	wp_enqueue_script( 'dokan-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'jquery' ), '1.0', true );
}
add_action( 'customize_preview_init', 'dokan_customizer_js' );
?>