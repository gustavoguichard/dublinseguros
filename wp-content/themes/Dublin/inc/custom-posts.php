<?php

/*
  Plugin Name: Custom Dublin Plugin
  Description: Custom Posts
  Version: 0.1
  Author: Gustavo Guichard
  Author URI: http://gustavoguichard.com/
*/

function dublin_reg_custom_posts() {
	$depoimentos_labels = array(
		'name' => 'Depoimentos',
		'singular_name' => 'Depoimento',
		'add_new' => 'Novo Depoimento',
		'add_new_item' => 'Adicionar novo Depoimento',
		'edit_item' => 'Editar Depoimento',
		'new_item' => 'Novo Depoimento',
		'view_item' => 'Ver Depoimento',
		'search_items' => 'Procurar Depoimento',
		'not_found' =>  'Não foram encontrados Depoimentos',
		'not_found_in_trash' => 'Não há Depoimento no lixo', 
		'parent_item_colon' => '',
		'menu_name' => 'Depoimentos'
	
	);
	$depoimentos_args = array(
		'labels' => $depoimentos_labels,
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'exclude_from_search' => true,
		'show_in_menu' => true,
		'menu_icon' => get_bloginfo('template_url') . '/images/depoimentos_custom.png',
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 4,
		'supports' => array('title', 'editor')
	);
	$parceiros_labels = array(
		'name' => 'Parceiros',
		'singular_name' => 'Parceiro',
		'add_new' => 'Novo Parceiro',
		'add_new_item' => 'Adicionar novo Parceiro',
		'edit_item' => 'Editar Parceiro',
		'new_item' => 'Novo Parceiro',
		'view_item' => 'Ver Parceiro',
		'search_items' => 'Procurar Parceiro',
		'not_found' =>  'Não foram encontrados Parceiros',
		'not_found_in_trash' => 'Não há Parceiros no lixo', 
		'parent_item_colon' => '',
		'menu_name' => 'Parceiros'
	
	);
	$parceiros_args = array(
		'labels' => $parceiros_labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'exclude_from_search' => true,
		'show_in_menu' => true,
		'menu_icon' => get_bloginfo('template_url') . '/images/parceiros_custom.png',
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 4,
		'supports' => array('title', 'thumbnail')
	);
	$banners_labels = array(
		'name' => 'Banners',
		'singular_name' => 'Banner',
		'add_new' => 'Novo Banner',
		'add_new_item' => 'Adicionar novo Banner',
		'edit_item' => 'Editar Banner',
		'new_item' => 'Novo Banner',
		'view_item' => 'Ver Banner',
		'search_items' => 'Procurar Banner',
		'not_found' =>  'Não foram encontrados Banners',
		'not_found_in_trash' => 'Não há Banners no lixo', 
		'parent_item_colon' => '',
		'menu_name' => 'Banners'
	);
	$banners_args = array(
		'labels' => $banners_labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'exclude_from_search' => true,
		'show_in_menu' => true,
		'menu_icon' => get_bloginfo('template_url') . '/images/banners_custom.png',
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 4,
		'supports' => array('title')
	);
	register_post_type('depoimentos',$depoimentos_args);
	register_post_type('parceiros',$parceiros_args);
	register_post_type('banners',$banners_args);
}
add_action('init', 'dublin_reg_custom_posts');

/* UPLOAD DOS DOWNLOADS */

add_action( 'add_meta_boxes', 'banner_meta_box_add' );  
function banner_meta_box_add()
{  
	add_meta_box( 'banner_uploads', 'Imagem do Banner', 'banner_uploads_metabox', 'banners', 'normal', 'high' );
}

function banner_uploads_metabox( $post ){
	$values = get_post_custom( $post->ID );
	$img_url = isset( $values['img_url'] ) ? esc_attr( $values['img_url'][0] ) : ''; 
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
  ?>
	<p>
		<input id="img_url" type="text" size="36" name="img_url" value="<?=$img_url;?>" />
		<input id="upload_image_button" class="upload_button" type="button" value="Escolher Imagem" />
		<label for="img_url">Qualquer imagem JPG, PNG ou GIF de 805px de largura por 182px de altura.</label>
	</p>
	<?php
}

add_action( 'save_post', 'banner_meta_box_save' );
function banner_meta_box_save( $post_id )  
{  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;  
    if( !current_user_can( 'edit_post' ) ) return;
    if( isset( $_POST['img_url'] ) )  
        update_post_meta( $post_id, 'img_url', esc_attr( $_POST['img_url'] ) );
}

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_bloginfo('template_url') . '/js/uploader_metabox.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts-post-new.php', 'my_admin_scripts');
add_action('admin_print_styles-post-new.php', 'my_admin_styles');
add_action('admin_print_scripts-post.php', 'my_admin_scripts');
add_action('admin_print_styles-post.php', 'my_admin_styles');


/* GRID DOS PARCEIROS */

function grid_parceiros(){
	$my_query = new WP_Query('showposts=8&orderby=rand&post_type=parceiros');?>
	<h4>Parceiros:</h4>
	<ul class="media-grid">
	<?php if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();?>
		<li>
			<?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'parceiros_thumb');?>
			<a href="<?php echo get_post_meta($post->ID, 'url_banner', true);?>" title="<?php the_title();?>"><img width="120" height="75" src="<?php echo $thumb[0];?>" alt="<?php the_title();?>" title="<?php the_title();?>" /></a>
		</li>
	<?php endwhile; endif; wp_reset_query();?>
	</ul><?php
}

?>