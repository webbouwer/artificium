<?php
/**
 * theme main functions file
 */

// register functions
require_once( get_template_directory() . '/customizer.php'); // customizer functions
require_once( get_template_directory() . '/assets/data.php'); // global data functions
require_once( get_template_directory() . '/assets/truncate.php'); // truncate text function
require_once( get_template_directory() . '/assets/cleanwp.php'); // remove unneeded wp functions

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


// register global data (assets/global.php)
$wp_global_data = array();

// instantiate data for global js
$wp_global_data['customdata']   = wp_main_theme_get_customizer();
$wp_global_data['tagdata']      = wp_main_theme_get_all_tags();
$wp_global_data['catdata']      = wp_main_theme_get_all_categories();
$wp_global_data['postdata']     = wp_main_theme_get_all_posts();

// register global customizer variables
function wp_main_theme_data_js() {
    // add jquery
    wp_enqueue_script("jquery"); // default wp jquery
    wp_register_script( 'custom_data_js', get_template_directory_uri().'/js/data.js', 99, '1.0', false); // register the script
    global $wp_global_data; // get global data var
	  wp_localize_script( 'custom_data_js', 'site_data', $wp_global_data ); // localize the global data list for the script
    wp_enqueue_script( 'custom_data_js');
}
add_action('wp_enqueue_scripts', 'wp_main_theme_data_js');

?>
