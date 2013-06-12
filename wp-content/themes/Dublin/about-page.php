<?php
/**
 * Template Name: About Page
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
					<h2><?php the_title();?></h2>
					<?php the_content(); ?>
					<?php $my_query = new WP_Query('showposts=1&post_type=depoimentos&orderby=rand'); ?>  
						<?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
						<aside class="depoimentos">
						<blockquote>
							<?php the_content(); ?>
							<span><?php the_title();?><br />
							<?php echo get_post_meta($post->ID, 'ramo_depoimento', true);?></span>
						</blockquote>
						</aside>
					<?php endwhile; endif; wp_reset_query(); ?>
				</article>
			</section>
			<img src="<?php echo get_bloginfo('template_directory'); ?>/images/dublin_gimmik.png" alt="Dublin Gimmik" id="gimmik" />
		</div>
<?php endwhile; ?>
<?php get_footer(); ?>
