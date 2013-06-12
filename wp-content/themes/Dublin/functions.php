<?php
/**
 * TwentyTen functions and definitions
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):

function twentyten_setup() {

	require( dirname( __FILE__ ) . '/inc/dublin-settings.php' );
	require( dirname( __FILE__ ) . '/inc/custom-posts.php' );

	add_editor_style();

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 256, 90, true );
	add_image_size( 'parceiros_thumb', 120, 75, true );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );
}
endif;

function get_permalink_by_name($page_name)
{
	global $post;
	global $wpdb;
	$pageid_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return get_permalink($pageid_name);
} 

function remove_parent_menu($var) {
	if ($var == 'current_page_parent' || $var == 'current-menu-item' || $var == 'current-page-ancestor'){
		return false;
	}
	return true;
}

if ( !is_admin() ) {
	wp_enqueue_script('jquery');
	   	
	wp_deregister_script('twipsy');
	wp_register_script('twipsy', (get_bloginfo('template_url') . "/js/bootstrap-twipsy.js"), false);
	wp_enqueue_script('twipsy');

	wp_deregister_script('dublin');
	wp_register_script('dublin', (get_bloginfo('template_url') . "/js/dublin.js"), false);
	wp_enqueue_script('dublin');

}

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Seguros';
	$menu[5][4] = 'open-if-no-js menu-top';
	$menu[5][6] = get_bloginfo('template_directory') . '/images/seguros_custom.png';
	$submenu['edit.php'][5][0] = 'Seguros';
	$submenu['edit.php'][10][0] = 'Novo Seguro';
	echo '';
}

function change_post_object_label() {
	global $wp_post_types;
	$labels = $wp_post_types['post']->labels;
	$labels->name = 'Seguros';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

?>