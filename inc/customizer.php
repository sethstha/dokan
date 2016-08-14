<?php
/**
 * For the worpress customizer
 * @package: waiba
 */

function waiba_customize_register($wp_customize){

	/*----------  SETTING  ----------*/
	$wp_customize->add_setting(
		'waiba_setting_category', 
		array(
			'default' => get_template_directory_uri(). '/assets/img/cat-1.jpg',
			'transport' =>'refresh'
		)
	);

	$wp_customize->add_setting(
		'waiba_setting_category', 
		array(
			'default' => get_template_directory_uri(). '/assets/img/cat-1.jpg',
			'transport' =>'refresh'
		)
	);

	$wp_customize->add_setting(
		'waiba_setting_cateogry_name', 
		array(
			'default' => 'left',
			'transport' =>'refresh'
		)
	);

	/*----------  SECTION  ----------*/
	$wp_customize->add_section( 
		'waiba_category_section',
		array(
			'title' => 'Categories',
			'priority' => 30,
		)
	);

	/*----------  control  ----------*/
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo',
			array(
				'label'      => __( 'Upload a logo', 'theme_name' ),
				'description' => 'something silly',
				'section'    => 'waiba_category_section',
				'settings'   => 'waiba_setting_category',
				'context'    => 'your_setting_context' 
			)
		)
	);

	$categories = get_categories(array('taxonomy' => 'product_cat'));
	// $new_cat = array();
	foreach ($categories as $category) {
		$new_cat[$category->category_nicename] = $category->cat_name;
	}
	$wp_customize->add_control('waiba_category_text', array(
		'label' => 'Category name',
		'type' => 'select',
		'choices' => $new_cat,
		'section' => 'waiba_category_section',
		'settings' => 'waiba_setting_cateogry_name'
		)
	);
}

add_action( 'customize_register', 'waiba_customize_register' );
?>
