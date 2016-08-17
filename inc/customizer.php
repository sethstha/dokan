<?php 
	
function dokan_customize_register( $wp_customize ){

	/**
	 *
	 * Panels
	 *
	 */
	
	$wp_customize->add_panel( 'dokan_panel_main', array(
		'priority'       => 160,
		'title'          => __( 'Dokan Theme Option', 'TEXT_DOMAIN' ),
		'description'    => __( 'Panle Description.', 'TEXT_DOMAIN' ),
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
		'title'          => __( 'Header Options', 'TEXT_DOMAIN' ),
		'description'    => __( 'Customization on header', 'TEXT_DOMAIN' ),
		'capability'     => 'edit_theme_options',
	) );
	
	/*----------  MEGAMENU  ----------*/
	$wp_customize->add_section( 'dokan_section_megamenu', array(
		'priority'       => 160,
		'panel'          => 'dokan_panel_main',
		'title'          => __( 'Megamenu Settings', 'TEXT_DOMAIN' ),
		'description'    => __( 'Megamenu styles and settings', 'TEXT_DOMAIN' ),
		'capability'     => 'edit_theme_options',
	) );
	
	$wp_customize->add_section( 'dokan_section_homepage', array(
		'priority'       => 160,
		'panel'          => 'dokan_panel_main',
		'title'          => __( 'Homepage Settings', 'TEXT_DOMAIN' ),
		'description'    => __( '', 'TEXT_DOMAIN' ),
		'capability'     => 'edit_theme_options',
	) );


	
	/**
	 *
	 * ELEMENTS
	 *
	 */

	/*----------  Header top text  ----------*/
	$wp_customize->add_setting( 'dokan_header_text', array(
		'type' 			=> 'theme_mod',
		'default' 		=> 'Shipping Worldwide',
		'transport' 	=> 'refresh'
		)
	);

	$wp_customize->add_control( 'dokan_header_text', array(
		'label'       => __( 'Header Tagline', 'TEXT_DOMAIN' ),
		'description' => __( 'Tagline that on the left top', 'TEXT_DOMAIN' ),
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
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'dokan_setting_logo',
		array(
			'label'      => __( 'Logo', 'TEXT_DOMAIN' ),
			'description' => 'Upload logo. Recommend logo size is 130 x 70',
			'section'    => 'dokan_section_header',
			'settings'   => 'dokan_setting_logo',
		)
	) );
	

	/*----------  Megamenu styles  ----------*/
	// Setting: Name.
	$wp_customize->add_setting( 'dokan_setting_megamenu_style', array(
		'type'                 => 'theme_mod',
		'default'              => 'default',
		'transport'            => 'refresh', 
		'capability'           => 'edit_theme_options',
	) );
	
	// Control: Name.
	$wp_customize->add_control( 'dokan_setting_megamenu_style', array(
		'label'       => __( 'Megamenu Style', 'TEXT_DOMAIN' ),
		'description' => __( 'Choose the megamenu style you want', 'TEXT_DOMAIN' ),
		'section'     => 'dokan_section_megamenu',
		'type'        => 'select',
		'choices'  => array(
			''  => 'Default',
			'dark' => 'Dark',
		),
		'settings'    => 'dokan_setting_megamenu_style',
	) );



	/*----------  Homeapge slider  ----------*/
	$wp_customize->add_setting( 'dokan_homepage_slider', array(
		'type'                 => 'theme_mod',
		'default'              => '0',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		
	) );
	
	$wp_customize->add_control( 'dokan_homepage_slider', array(
		'label'       => __( 'Enable Homepage Slider', 'TEXT_DOMAIN' ),
		'description' => __( '', 'TEXT_DOMAIN' ),
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
		
	) );

	//lets get slider 
	global $wpdb;
	$sliders_info = array();
	if ($results = $wpdb->get_results('SELECT id, title FROM wp_masterslider_sliders')) {
		foreach ($results as $result) {
			$sliders_info[$result->id] = $result->title;
		}
	}

	$wp_customize->add_control( 'dokan_homepage_slider_list', array(
		'label'       => __( 'Select Homepage Slider', 'TEXT_DOMAIN' ),
		'description' => __( '', 'TEXT_DOMAIN' ),
		'section'     => 'dokan_section_homepage',
		'type'        => 'select', 
		'choices'  => $sliders_info,
		'settings'    => 'dokan_homepage_slider_list',
	) );
	
}
add_action( 'customize_register', 'dokan_customize_register' );


/*----------  Enqueue Customizer JS  ----------*/
function dokan_customizer_js() {
	wp_enqueue_script( 'customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'dokan_customizer_js' );
?>