<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
	<link rel="stylesheet" href="<?php t_url(); ?>/js/fancybox/jquery.fancybox.css" media="screen">
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!-- WP/ --><?php wp_head(); ?><!-- /WP -->
</head>
<body <?php body_class(); ?>>
	<header id="head">
<?php 	if ( is_front_page() ) : ?>
		<h1 id="logo"><img src="<?php t_url(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo" width="324" height="94"></h1>
<?php 	else : ?>
		<div id="logo"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php t_url(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo" width="324" height="94"></a></div>
<?php 	endif; ?>
		<nav class="nav-head cf">
<?php 		wp_nav_menu( array(
				'theme_location'  => 'primary',
				'container'       => false, 
				'menu_class'      => 'menu-head', 
				'fallback_cb'     => false,
				'depth'           => 2 )
			); ?>

			<form action="<?php echo home_url( '/' ); ?>" method="get" id="searchform">
				<fieldset>
					<legend>Busca</legend>
					<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" required aria-required="true" aria-label="Procurar por" placeholder="busca">
					<button type="submit">Buscar</button>
				</fieldset>
			</form>
		</nav>
		<ul class="social-links">
<?php 		if ( $fb = get_field( 'facebook', 'options' ) ) : ?>
			<li class="social-item"><a href="<?php echo $fb; ?>" target="_blank"><img src="<?php t_url(); ?>/img/icon-facebook.png" alt="Facebook" class="social-icon" width="24" height="24"></a></li>
<?php 		endif;
			if ( $tw = get_field( 'twitter', 'options' ) ) : ?>
			<li class="social-item"><a href="<?php echo $tw; ?>" target="_blank"><img src="<?php t_url(); ?>/img/icon-twitter.png" alt="Twitter" class="social-icon" width="24" height="24"></a></li>
<?php 		endif;
			if ( $yt = get_field( 'youtube', 'options' ) ) : ?>
			<li class="social-item"><a href="<?php echo $yt; ?>" target="_blank"><img src="<?php t_url(); ?>/img/icon-youtube.png" alt="Youtube" class="social-icon" width="24" height="24"></a></li>
<?php 		endif; ?>
		</ul>
		<form action="http://www.shb.com.br/ambiente-online/verificacao/verificacao.php" method="post" target="_blank" id="ambiente" class="acesso">
			<fieldset>
				<legend><a href="#ambiente">Ambiente Online</a></legend>
				<p class="fields cf">
					<input type="text" name="email_usuario" id="ao-user" class="input-text" required aria-required="true" aria-label="Usuário" placeholder="Usuário">
					<input type="password" name="senha_usuario" id="ao-pass" class="input-text" required aria-required="true" aria-label="Senha" placeholder="Senha">
					<button class="button" type="submit">ok</button>
				</p>
			</fieldset>
		</form>
		<form action="http://www.shb.com.br/ambiente-online/verificacao/verificacao.php" method="post" target="_blank" id="inscricoes" class="acesso">
			<fieldset>
				<legend><a href="#inscricoes">Inscrições Online</a></legend>
				<p class="fields cf">
					<input type="text" name="email_usuario" id="io-user" class="input-text" required aria-required="true" aria-label="Usuário" placeholder="Usuário">
					<input type="password" name="senha_usuario" id="io-pass" class="input-text" required aria-required="true" aria-label="Senha" placeholder="Senha">
					<button class="button" type="submit">ok</button>
				</p>
			</fieldset>
		</form>
	</header>
	<hr>
