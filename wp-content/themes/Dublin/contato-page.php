<?php
/**
 * Template Name: Contato Page
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
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
					<?php the_content(); ?>
				</article>
			</section>
			<section class="span4">
				<aside class="sidebar">
					<?php get_sidebar();?>					
					<img src="http://maps.googleapis.com/maps/api/staticmap?center=<?=get_option('dublin_endereco');?>,<?=get_option('dublin_endereco_2');?>&zoom=15&size=260x200&sensor=true" alt="Contato" />
				</aside>
			</section>
		</div>
<?php endwhile; ?>

<?php get_footer(); ?>
