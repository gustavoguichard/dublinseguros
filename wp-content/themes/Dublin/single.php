<?php
/**
 * The Template for displaying all single posts.
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
					<h2><?php the_title(); ?></h2>
					<?php if(has_post_thumbnail($post->ID)){ the_post_thumbnail(); } ?>
					<?php the_content(); ?>
					<p><a class="cotacao_link" href="<?php echo get_permalink_by_name('cotacoes'); ?>">Peça sua cotação &gt;&gt;</a></p>
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