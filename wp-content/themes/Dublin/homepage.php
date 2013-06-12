<?php
/**
 * Template Name: Home Page
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
			<section id="banner_section" class="span10">
			<?php $i = 0;?>
			<?php $my_query = new WP_Query('showposts=-1&post_type=banners'); ?>
			<?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
				<a href="<?php echo get_post_meta($post->ID, 'url_banner', true);?>" title="<?php the_title();?>" <?php if($i > 0) echo 'style="display:none;" ';?>>
					<img src="<?php echo get_post_meta($post->ID, 'img_url', true);?>" alt="<?php the_title();?>" title="<?php the_title();?>" />
				</a>
				<?php $i++;?>
			<?php endwhile; endif; wp_reset_query(); ?>
			</section>
			<section class="span7">
				<article class="home-video">
					<?php the_content(); ?>
					<iframe title="YouTube video player" width="480" height="300" src="http://www.youtube.com/embed/<?php echo get_option('video_code');?>?rel=0" frameborder="0" allowfullscreen></iframe>
				</article>
			</section>
			<section class="span4">
				<aside class="sidebar">
					<?php grid_parceiros();?>
				</aside>
			</section>
		</div>
<?php endwhile; ?>
<script src="<?php bloginfo('template_url');?>/js/jquery.cycle.min.js" type="text/javascript" charset="utf-8"></script>
<?php get_footer(); ?>