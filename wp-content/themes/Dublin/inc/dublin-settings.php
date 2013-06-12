<?php

/*
  Plugin Name: Settings Dublin Plugin
  Description: Opções gerais do site
  Version: 0.1
  Author: Gustavo Guichard
  Author URI: http://gustavoguichard.com/
*/

function setup_theme_admin_menus() {  
	add_menu_page('Opções Dublin', 'Dublin', 'manage_options',  
    'dublin_theme_settings', 'theme_settings_page', get_bloginfo('wpurl').'/favicon.ico', 1);
}
add_action("admin_menu", "setup_theme_admin_menus");

function theme_settings_page(){
	if (!current_user_can('manage_options')) {  
		wp_die('You do not have sufficient permissions to access this page.');  
	}
	if (isset($_GET["settings-updated"])) {?>
		<div id="message" class="updated" style="padding:10px;margin-top:20px;width:90%;">Alterações salvas</div>
	<?php };?>
	<div class="wrap">
	<?php screen_icon('tools'); ?><h2>Configurações Dublin</h2>  
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>

	<table class="form-table">
		<h2>Geral</h2>
		<tbody>
			<tr valign="top">
				<th scope="row">
					<label for="video_code">Código do video do Youtube:</label>
				</th>
				<td>
					<input type="text" name="video_code" size="45" value="<?php echo get_option('video_code');?>" />
					<span class="description"><br />Código que vem depois de "v=" na url e antes de qualquer outro "?" ou "&". Por exemplo.: http://www.youtube.com/watch?v=<strong>W1l5eNOlOYY</strong>?rel=0</span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="dublin_footer_title">Título do cantato no rodapé:</label>
				</th>
				<td><input type="text" name="dublin_footer_title" size="45" value="<?php echo get_option('dublin_footer_title');?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="dublin_footer_text">Texto do cantato no rodapé:</label>
				</th>
				<td><textarea name="dublin_footer_text" rows="4" cols="47"><?php echo get_option('dublin_footer_text');?></textarea></td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="dublin_endereco">Endereço:</label>
				</th>
				<td>
					<input type="text" name="dublin_endereco" size="45" value="<?php echo get_option('dublin_endereco');?>" />
					<span class="description">Colocar aqui as 2 linhas de endereço, como aparece no quadro de mais informações.</span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"></th>
				<td style="padding-top:0;padding-bottom:0;position:relative;top:-5px;"><input type="text" name="dublin_endereco_2" size="45" value="<?php echo get_option('dublin_endereco_2');?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="dublin_email">Email:</label>
				</th>
				<td><input type="text" name="dublin_email" size="45" value="<?php echo get_option('dublin_email');?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="dublin_telefone">Telefone:</label>
				</th>
				<td><input type="text" name="dublin_telefone" size="45" value="<?php echo get_option('dublin_telefone');?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="dublin_cep">CEP:</label>
				</th>
				<td><input type="text" name="dublin_cep" size="45" value="<?php echo get_option('dublin_cep');?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="analytics_code">Código do Analytics:</label>
				</th>
				<td><input type="text" name="analytics_code" size="45" value="<?php echo get_option('analytics_code');?>" /></td>
			</tr>
		</tbody>
	</table>
	<p class="submit"><input type="submit" name="Submit" class="button-primary" value="Salvar Alterações" /></p>
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="video_code, dublin_footer_title, dublin_footer_text, analytics_code, dublin_endereco, dublin_endereco_2, dublin_telefone, dublin_cep, dublin_email" />

	</form>
	</div>
<?php 
}
?>