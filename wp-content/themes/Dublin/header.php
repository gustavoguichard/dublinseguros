<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if(is_single() || is_page() || is_category() || is_home()) { echo '<meta name="robots" content="all,noodp" />';}
else if(is_archive()) { echo '<meta name="robots" content="noarchive,noodp" />';}
else if(is_search() || is_404()) { echo '<meta name="robots" content="noindex,noarchive" />'; }?>
<title><?php wp_title("|", true, "right"); ?><?php bloginfo("name"); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<script src="<?php echo get_bloginfo('template_directory');?>/js/modernizr.js" type="text/javascript" charset="utf-8"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>	
	<header id="top">
		<section id="logo" class="container">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - ir para a Home" class="brand dica"><h1><?php bloginfo( 'name' ); ?></h1></a>
		</section>
		<nav>
			<section class="container">
				<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary', 'container' => 'ul') ); ?>
				<form id="searchform" action="<?php bloginfo('url');?>" method="get" class="pull-right">
					<input id="s" class="field" type="text" placeholder="Procurar" name="s">
					<button id="searchsubmit" type="submit" name="submit">Ir</button>
				</form>
			</section>
		</nav>
	</header>