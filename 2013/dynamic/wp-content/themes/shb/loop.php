		<ol class="archive-list">
<?php 		while( have_posts() ) : the_post(); ?>
			<li <?php post_class( 'archive-item' ); ?>>
<?php 			if ( 'prova' == get_post_type() ) : ?>
				<hgroup>
					<time datetime="Y-m-d H:i:s" class="published"><?php the_time( get_option( 'date_format' ) ); ?></time>
					<h3 class="entry-title page-title"><?php the_title(); ?></h3>
				</hgroup>
<?php 			else : ?>
				<h3 class="parent-title page-title"><?php the_title(); ?></h3>
<?php 			endif; ?>
				<div class="entry-content cf">
					<?php 'prova' == get_post_type() ? the_content() : the_excerpt(); ?>
<?php 				$file_1 = get_field( 'programacao' );
					$file_2 = get_field( 'resultado' );
					if ( $file_1 || $file_2 ) : ?>
					<ul class="file-list">
<?php 					if ( $file_1 ) : ?>
						<li class="file-item"><a href="<?php echo $file_1; ?>">Programação</a></li>
<?php 					endif;
						if ( $file_2 ) : ?>
						<li class="file-item"><a href="<?php echo $file_2; ?>">Resultado</a></li>
<?php 					endif; ?>
					</ul>
<?php 				endif; ?>
				</div>
			</li>
<?php 		endwhile; ?>
		</ol>
