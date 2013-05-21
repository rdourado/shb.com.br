<?php get_header(); ?>
	<div id="body">
		<hgroup class="hgroup">
			<h1 class="parent-title">Arquivo</h1>
			<h2 class="entry-title page-title"><?php post_type_archive_title(); ?></h2>
		</hgroup>
<?php 	get_template_part( 'loop' ); ?>
<?php 	if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
	</div>
<?php get_footer(); ?>