<?php 
/*
  Plugin Name: Disable Admin Features Plugin
  Description: Tira tudo o que não vai ser usado pelo usuário logado
  Version: 0.1
  Author: Gustavo Guichard
  Author URI: http://gustavoguichard.com/
*/

function remove_dashboard_widgets(){
	global$wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
 
function remove_menu_items() {
	global $menu;
	$restricted = array(__('Links'), __('Comments'), __('Media'), __('Painel'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
			unset($menu[key($menu)]);
		}
	}
}
 
add_action('admin_menu', 'remove_menu_items');

function remove_submenus() {
	global $submenu;
	//unset($submenu['index.php'][10]); // Removes 'Updates'.
	unset($submenu['themes.php'][5]); // Removes 'Themes'.
	unset($submenu['options-general.php'][15]); // Removes 'Writing'.
	unset($submenu['options-general.php'][25]); // Removes 'Discussion'.
	unset($submenu['edit.php'][15]); // Removes 'Categories'.
	unset($submenu['edit.php'][16]); // Removes 'Tags'.  
//   unset($submenu['edit.php?post_type=publicacao'][15]); // Taxonomy.
//   unset($submenu['edit.php?post_type=servico'][15]); // Taxonomy.
//   unset($submenu['edit.php?post_type=evento'][15]); // Taxonomy.
//   unset($submenu['edit.php?post_type=atrativo'][15]); // Taxonomy.
	unset($submenu['themes.php'][7]); // Widgets
	unset($submenu['plugins.php'][15]); // Editor de Plugins
	unset($submenu['tools.php'][5]); // Ferramentas Sub
}

add_action('admin_menu', 'remove_submenus');

/* REMOVER O EDITOR DO ADMIN */
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);

function customize_meta_boxes() {
/* Removes meta boxes from Posts */
	remove_meta_box('postcustom','post','normal');
	remove_meta_box('trackbacksdiv','post','normal');
	remove_meta_box('commentstatusdiv','post','normal');
	remove_meta_box('commentsdiv','post','normal');
	remove_meta_box('tagsdiv-post_tag','post','normal');
//   remove_meta_box('postexcerpt','post','normal');
	remove_meta_box('slugdiv','post','normal');
//   remove_meta_box('authordiv','post','normal');
	remove_meta_box('categorydiv','post','normal');
//   /* Removes meta boxes from pages */
	remove_meta_box('postcustom','page','normal');
	remove_meta_box('trackbacksdiv','page','normal');
	remove_meta_box('commentstatusdiv','page','normal');
	remove_meta_box('commentsdiv','page','normal'); 
	remove_meta_box('slugdiv','page','normal');
//   remove_meta_box('authordiv','page','normal');
}

add_action('admin_init','customize_meta_boxes');

/* COLUNAS MOSTRADAS NOS POSTS E PAGINAS */
function custom_post_columns($defaults) {
	unset($defaults['comments']);
	//unset($defaults['author']);
	unset($defaults['categories']);
	unset($defaults['tags']);
	return $defaults;
}

add_filter('manage_posts_columns', 'custom_post_columns');

function custom_pages_columns($defaults) {
	unset($defaults['comments']);
//   unset($defaults['author']);
	return $defaults;
}

add_filter('manage_pages_columns', 'custom_pages_columns');

/* MENU DE ACOES FAVORITAS */
function custom_favorite_actions($actions) {
	unset($actions['edit-comments.php']);
	return $actions;
}
add_filter('favorite_actions', 'custom_favorite_actions');

/* LOGOTIPO DO LOGIN */
function custom_login_logo() {
  echo '<style type="text/css">
    body.login{background:#4472BD;}
    h1 a { background-image:url('.get_bloginfo('template_directory').'/images/dublin_logo.png) !important;
    width:600px; height: 110px !important; }
    .login p#nav a, .login p#backtoblog a{color: white !important; text-shadow: none;}
    </style>';
}

add_action('login_head', 'custom_login_logo');

/* DESABILITAR AVISO DE ATUALIZAÇÃO */
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

/* REMOVER LIXO DO HEAD */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/* GOOGLE ANALYTICS */
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("' . get_option('analytics_code') . '");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

/* FAVICON AUTOMÁTICO */
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');

// function remove_admin_bar_links() {
// 	global $wp_admin_bar;
// 	//$wp_admin_bar->remove_menu('my-blogs');
// 	$wp_admin_bar->add_menu( array(
//         'parent' => 'new-content',
//         'id' => 'new_noticia',
//         'title' => __('Notícia'),
//         'href' => admin_url( 'post-new.php?post_type=post')
//     ));
// 	$wp_admin_bar->remove_menu('comments');
// 	$wp_admin_bar->remove_menu('new-post');
// 	$wp_admin_bar->remove_menu('new-page');
// }
// add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

/* MUDAR AS INFORMAÇÕES DE CONTATO */
function new_contactmethods( $contactmethods ) {
	//$contactmethods['twitter'] = 'Twitter'; // Add Twitter
	//$contactmethods['facebook'] = 'Facebook'; // Add Facebook
	unset($contactmethods['yim']); // Remove Yahoo IM
	unset($contactmethods['aim']); // Remove AIM
	unset($contactmethods['jabber']); // Remove Jabber 
	return $contactmethods;
}
add_filter('user_contactmethods','new_contactmethods',10,1);
?>