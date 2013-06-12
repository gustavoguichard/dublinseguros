<?php get_header(); ?>
	<div class="container" id="main">
		<div id="general" class="row">
			<section class="span7">
				<article class="body-article">
					<h2>Nada encontrado</h2>
					<p>Desculpe-nos, mas nada foi encontrado nessa página. Tente fazer uma busca ou voltar para a <a href="<?php echo bloginfo('home') ; ?>" class="dica" title="Ir para a Home">Home</a> e começar de novo.</p>
					<script type="text/javascript">
						document.getElementById('s') && document.getElementById('s').focus();
					</script>
				</article>
			</section>
			<section class="span4">
				<aside class="sidebar">
					<?php get_sidebar();?>
				</aside>
			</section>
		</div>
<?php get_footer(); ?>