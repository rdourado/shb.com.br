<?php get_header(); ?>
	<div id="body">
<?php 	while( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<hgroup class="hgroup">
				<time datetime="Y-m-d H:i:s" class="published"><?php the_time( get_option( 'date_format' ) ); ?></time>
				<h1 class="entry-title page-title"><?php the_title(); ?></h1>
			</hgroup>
			<div class="entry-content cf">
				<?php the_content(); ?>
<?php 			$file_1 = get_field( 'programacao' );
				$file_2 = get_field( 'resultado' );
				if ( $file_1 || $file_2 ) : ?>
				<ul class="file-list">
<?php 				if ( $file_1 ) : ?>
					<li class="file-item"><a href="<?php echo $file_1; ?>">Programação</a></li>
<?php 				endif;
					if ( $file_2 ) : ?>
					<li class="file-item"><a href="<?php echo $file_2; ?>">Resultado</a></li>
<?php 				endif; ?>
				</ul>
<?php 			endif; ?>
			</div>
		</article>
<?php 	endwhile; ?>
<?php 	get_template_part( 'inc', 'related' ); ?>
	</div>
<?php get_footer(); ?>