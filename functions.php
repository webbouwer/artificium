<?php
/**
 * theme main functions file
 */

// register functions
require_once( get_template_directory() . '/assets/posttype.php'); // post type functions
require_once( get_template_directory() . '/assets/data.php'); // global data functions
require_once( get_template_directory() . '/assets/cleanwp.php'); // remove unneeded wp functions

require_once( get_template_directory() . '/customizer.php'); // customizer functions

// register options
function basic_theme_supported() {
	add_theme_support( 'custom-background' );
  add_theme_support( 'custom-header' );
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'basic_theme_supported' );

// register menu's
function basic_theme_register_menus() {
	register_nav_menus(
		array(
		'top' => __( 'Top menu' , 'resource' ),
		'main' => __( 'Main menu' , 'resource' ),
		'side' => __( 'Side menu' , 'resource' ),
		'bottom' => __( 'Bottom menu' , 'resource' )
		)
	);
}
add_action( 'init', 'basic_theme_register_menus' );

// register style sheet
function wp_main_theme_stylesheet(){
    $stylesheet = get_template_directory_uri().'/style.css';
    echo '<link rel="stylesheet" id="wp-theme-main-style"  href="'.$stylesheet.'" type="text/css" media="all" />';
}
add_action( 'wp_head', 'wp_main_theme_stylesheet', 9999 );

// register style sheet function for editor
function wp_main_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'wp_main_editor_styles' );



?>
