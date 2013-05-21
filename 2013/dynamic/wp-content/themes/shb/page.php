<?php get_header(); ?>
	<div id="body">
<?php 	while( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
<?php 		if ( $post->post_parent ) : ?>
			<hgroup class="hgroup">
				<h1 class="parent-title"><?php echo get_the_title( $post->post_parent ); ?></h1>
				<h2 class="entry-title page-title"><?php the_title(); ?></h2>
			</hgroup>
<?php 		else : ?>
			<h1 class="parent-title single-title"><?php the_title(); ?></h1>
<?php 		endif; ?>
			<div class="entry-content cf">
				<?php the_content(); ?>
			</div>
		</article>
<?php 	endwhile; ?>
<?php 	get_template_part( 'inc', 'related' ); ?>
	</div>
<?php get_footer(); ?>