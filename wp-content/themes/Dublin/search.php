<?php get_header(); ?>
	<div class="container" id="main">
		<div id="general" class="row">
			<section class="span7">
				<article class="body-article">
				<?php if ( have_posts() ) : ?>
					<h2>Resultados da busca por: <?php echo get_search_query();?></h2>
					<?php get_template_part( 'loop', 'search' );?>
				<?php else : ?>
					<h2>Nada encontrado</h2>
					<p>Desculpe-nos, mas nada foi encontrado nessa página. Tente fazer uma busca ou voltar para a <a href="<?php echo bloginfo('home') ; ?>" class="dica" title="Ir para a Home">Home</a> e começar de novo.</p>
					<script type="text/javascript">
						document.getElementById('s') && document.getElementById('s').focus();
					</script>
				<?php endif; ?>
				</article>
			</section>
			<section class="span4">
				<aside class="sidebar">
					<?php get_sidebar();?>
				</aside>
			</section>
		</div>
<?php get_footer(); ?>