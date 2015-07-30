<?php
/**
 * @package Nature WP
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

function optionsframework_options() {

	// Defined Stylesheet Paths
	// Use get_template_directory_uri if it's a parent theme

	$defined_stylesheets = array(
	get_stylesheet_directory_uri() . '/css/style-dark.css' => "Dark",
	get_stylesheet_directory_uri() . '/css/style-light.css' => "Light",
	);
	$prefix = 'option_';

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/img/';

	$options = array();

	$options[] = array(
		'name' => __( 'Branding Settings', 'nature' ),
		'type' => 'heading');

	$options[] = array(
		'name' => __( 'Upload your header SVG logo', 'nature' ),
		'desc' => __( 'Ideal size 140 x 60px', 'nature' ),
		'id'   => $prefix . 'logo_svg_header',
		'type' => 'upload');

	$options[] = array(
		'name' => __( 'Upload your header PNG or JPG logo', 'nature' ),
		'desc' => __( 'Ideal size 140 x 60px', 'nature' ),
		'id'   => $prefix . 'logo_png_header',
		'type' => 'upload');

	$options[] = array(
		'name' => __( 'Upload your footer SVG logo', 'nature' ),
		'desc' => __( 'Ideal size 100 x 50px', 'nature' ),
		'id'   => $prefix . 'logo_svg_footer',
		'type' => 'upload');

	$options[] = array(
		'name' => __( 'Upload your footer PNG or JPG logo', 'nature' ),
		'desc' => __( 'Ideal size 100 x 50px', 'nature' ),
		'id'   => $prefix . 'logo_png_footer',
		'type' => 'upload');

	$options[] = array(
		'name' => __( 'Footer trademark', 'nature' ),
		'desc' => __( 'A text input field.', 'nature' ),
		'id'   => $prefix . 'footer_trademark',
		'std'  => esc_html__( 'Nature Wordpress Theme - 2014 &copy;', 'nature' ),
		'type' => 'text');

	$options[] = array(
		'name' => __( 'Main options', 'nature' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Email used in contact page', 'nature' ),
		'desc' => __( 'Please fill with your contact email.', 'nature' ),
		'id'   => $prefix . 'contact_email',
		'type' => 'text');

	$options[] =  array(
		'name' => __( 'Image placeholder', 'nature' ),
		'desc' => esc_html__( 'You can upload an image for replacement in some places when you don\'t upload any image', 'nature' ),
		'id'   => $prefix . 'placeholder',
		'std'  => 'http://themes.pixelcake.com.br/nature/img/no-image.jpg',
		'type' => 'upload' );

	$options[] = array(
		'name'    => __( 'Select a stylesheet to be loaded', 'nature' ),
		'desc'    => __( 'You can choose one of predefined stylesheet.', 'nature' ),
		'id'      => $prefix . 'stylesheet',
		'std'     => get_stylesheet_directory_uri() . '/css/style-dark.css',
		'type'    => 'select',
		'options' => $defined_stylesheets );

	$options[] = array(
		'name' => __( 'Custom CSS', 'nature' ),
		'desc' => __( 'You can add some CSS code here', 'nature' ),
		'id'   => $prefix. 'custom_css',
		'type' => 'textarea' );

	$options[] = array(
		'name' => __( 'Custom JS', 'nature' ),
		'desc' => __( 'You can add some JavaScript code here. In case you place jQuery start with jQuery instead $', 'nature' ),
		'id'   => $prefix. 'custom_js',
		'type' => 'textarea' );

	$options[] = array(
		'name' => __( 'Google Analytics Code', 'nature' ),
		'desc' => __( 'You can place the Google Analytics JS here', 'nature' ),
		'id'   => $prefix. 'google_analytics',
		'type' => 'textarea' );

	return $options;
}