<?php
/**
 * Customizer Test Customizer
 *
 * @package Customizer_Test
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customizer_test_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Your customizer code here.

}
add_action( 'customize_register', 'customizer_test_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customizer_test_customize_preview_js() {
	wp_enqueue_script( 'customizer_test_customizer', get_template_directory_uri() . '/dist/assets/wp-js/customizer.js', array( 'customize-preview' ), '20170330', true );
}
add_action( 'customize_preview_init', 'customizer_test_customize_preview_js' );