<?php get_header(); ?>
	<div id="body">
		<hgroup class="hgroup">
			<h1 class="parent-title">Resultados da busca</h1>
			<h2 class="entry-title page-title">Mostrando resultados para: <span class="blue"><?php the_search_query(); ?></span></h2>
		</hgroup>
<?php 	get_template_part( 'loop' ); ?>
<?php 	if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
	</div>
<?php get_footer(); ?>