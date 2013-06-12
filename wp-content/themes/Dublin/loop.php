<?php if ( ! have_posts() ) : ?>
		<h2>Nada encontrado</h2>
		<p>Desculpe-nos, mas nada foi encontrado nessa página. Tente fazer uma busca ou voltar para a <a href="<?php echo bloginfo('home') ; ?>" title="Ir para a Home">Home</a> e começar de novo.</p>
		<?php get_search_form(); ?>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
		<article class="seguro">
			<?php if(has_post_thumbnail($post->ID)){ the_post_thumbnail(); } ?>
			<h3><?php the_title(); ?></h3>
			<?php the_content();?>
			<p><a class="cotacao_link" href="<?php echo get_permalink_by_name('cotacoes'); ?>">Peça sua cotação &gt;&gt;</a></p>
		</article>
<?php endwhile; // End the loop. Whew. ?>