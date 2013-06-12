<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

	</div>
	<footer id="footer">
		<section class="container">
			<div class="row">
				<section class="span3">
					<h4>Páginas:</h4>
					<?php wp_nav_menu( array( 'menu_class' => 'nav_footer', 'theme_location' => 'primary', 'container' => 'ul') ); ?>
				</section>
				<section class="span5">
					<h4><?php echo get_option('dublin_footer_title');?></h4>
					<p><?php echo get_option('dublin_footer_text');?><br />
					Email: <a href="mailto:<?php echo get_option('dublin_email');?>"><?php echo get_option('dublin_email');?></a><br />
					Telefone: <?php echo get_option('dublin_telefone');?></p>
					<p><a href="<?php echo get_permalink_by_name('contato');?>">Mais detalhes e formas de contato</a></p>
				</section>
				<section class="span4 copyright">
					<h4>Dublin - <?php echo date('Y');?></h4>
					<p>Todos os direitos reservados.<br />
					Desenvolvido por <a id="cria_logo" href="http://criaideias.com.br">Cria Ideias</a>.</p>
				</section>
			</div>
		</section>
	</footer>
<?php wp_footer();?>
</body>
</html>