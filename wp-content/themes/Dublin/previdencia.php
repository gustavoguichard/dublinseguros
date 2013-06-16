<?php
/**
 * Template Name: Previdencia Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="container" id="main">
		<div id="general" class="row">
			<section class="span7">
				<article class="body-article">
					<h2>Previdência privada</h2>
					<article class="seguro previdencia">
						<?php if(has_post_thumbnail($post->ID)){ the_post_thumbnail(); } ?>
						<h3><?php the_title(); ?></h3>
						<?php the_content();?>
						<p><a class="cotacao_link" href="http://dublinseguros.com.br/simulador-de-renda/">Simule aqui a construção da renda mensal que você pretende ter. &gt;&gt;</a></p>
						<p><a class="cotacao_link" href="http://www.icatuweb.com.br/target/target.htm?cliente=dublin" target="_blank">Simule aqui a construção de reserva que você quer formar. &gt;&gt;</a></p>
					</article>
				</article>
			</section>
			<section class="span4">
				<aside class="sidebar">
					<?php get_sidebar();?>
				</aside>
			</section>
		</div>
<?php endwhile; ?>

<?php get_footer(); ?>