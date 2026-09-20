<?php
/**
 * Medidove-child functions and definitions
 *
 * @package medidove-child
 */

/** Loading language **/
function medidove_child_theme_setup() {
	load_child_theme_textdomain( 'medidove-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'medidove_child_theme_setup' );

/** Enqueue the child theme stylesheet **/
function medidove_child_enqueue_scripts() {
	wp_enqueue_style( 'medidove-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'medidove_child_enqueue_scripts', 100 );

