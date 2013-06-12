<?php get_header(); ?>
	<div class="container" id="main">
		<div id="general" class="row">
			<section class="span7">
				<article class="body-article">
					<h2>Seguros</h2>
					<?php get_template_part( 'loop', 'index' );?>
				</article>
			</section>
			<section class="span4">
				<aside class="sidebar">
					<?php get_sidebar();?>
				</aside>
			</section>
		</div>
<?php get_footer(); ?>