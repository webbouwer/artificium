<?php
/**
 * Theme main index file
 */

// include php files
require_once('functions.php');

// instantiate the current page/post data
global $post;

// determine header image
$header_image = get_header_image();

// start html
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<?php

// set charset
echo '<meta charset="'. get_bloginfo( 'charset' ) .'">';

// set profile, canonical and pingback urls
echo '<link rel="profile" href="http://gmpg.org/xfn/11">'
  .'<link rel="canonical" href="'.home_url(add_query_arg(array(),$wp->request)).'">'
  .'<link rel="pingback" href="'.get_bloginfo( 'pingback_url' ).'" />';

// and a favicon
// echo '<link rel="shortcut icon" href="images/favicon.ico" />';

// tell devices wich screen size to use by default
echo '<meta name="viewport" content="initial-scale=1.0, width=device-width" />'
	.'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
if ( ! isset( $content_width ) ) $content_width = 360; // mobile first

// more info for og api's
echo '<meta property="og:title" content="' . get_the_title() . '"/>'
  .'<meta property="og:type" content="website"/>'
  .'<meta property="og:url" content="' . get_permalink() . '"/>'
  .'<meta property="og:site_name" content="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"/>'
  .'<meta property="og:description" content="'.get_bloginfo( 'description' ).'"/>';

// define post featured image or use a custom default (logo) image
$default_image = 'https://avatars.githubusercontent.com/u/36711733?v=4';
if( !has_post_thumbnail( $post->ID )) {
  if( !empty($header_image) ){
    $default_image = get_header_image();
  }else{
    $default_image = get_theme_mod( 'wp_main_theme_identity_logo', $default_image );
  }
}else{
  $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
  $default_image = esc_attr( $thumbnail_src[0] );
}
echo '<meta property="og:image" content="' . $default_image . '"/>';
// include wp head

wp_head();
// define custom body background-image
$bgposition = get_theme_mod('background_position', 'bottom center');
$bgattacht = get_theme_mod('background_attachment', 'fixed');
$bgrepeat = get_theme_mod('background_repeat', 'no-repeat');
$bgsize = get_theme_mod('background_size', 'cover');
$headerbgstyle = ' style="background-image:url('.esc_url( get_background_image() ).');background-position:'.$bgposition.';background-attachment:'.$bgattacht.';background-size:'.$bgsize.';background-repeat:'.$bgrepeat.';"';
echo '</head>';
// define body tag attributes
echo '<body '.$headerbgstyle.' '; body_class(); echo '>';
?>
<?php
// include wp footer
wp_footer();
// end html
echo '</body></html>';
?>
