<?php 
/*
Template name: Personalizado
*/
?>
<?php get_header(); ?>
	<div id="body">
<?php 	while( have_posts() ) : the_post(); ?>
		<article class="hentry">
			<hgroup class="hgroup">
<?php 			if ( $post->post_parent ) : ?>
				<h1 class="parent-title"><?php echo get_the_title( $post->post_parent ); ?></h1>
				<h2 class="entry-title page-title"><?php the_title(); ?></h2>
<?php 			else : ?>
				<h1 class="entry-title single-title"><?php the_title(); ?></h1>
<?php 			endif; ?>
			</hgroup>
			<div class="entry-content">
<?php 			while( has_sub_field( 'blocks' ) ) : ?>
				<div class="<?php if ( $i++ ) echo 'block'; ?>">

<?php 				if ( get_row_layout() == 'single_col' ) : ?>
					<?php echo apply_filters( 'the_content', get_sub_field( 'content' ) ); ?>

<?php 				elseif( get_row_layout() == 'two_cols' ) : ?>
					<div class="left-col">
						<?php echo apply_filters( 'the_content', get_sub_field( 'left' ) ); ?>
					</div>
					<div class="right-col">
						<?php echo apply_filters( 'the_content', get_sub_field( 'right' ) ); ?>
					</div>

<?php 				elseif( get_row_layout() == 'table_7_cols' ) : 
					$rows = get_sub_field( 'table_rows' ); ?>
					<aside class="table">
						<h2 class="heading"><?php the_sub_field( 'caption' ); ?></h2>
						<table cellpadding="0" cellspacing="0">
							<thead>
								<tr>
		<?php 						foreach( $rows[0] as $head ) : ?>
									<th><?php echo $head; ?></th>
		<?php 						endforeach; ?>
								</tr>
							</thead>
							<tbody>
		<?php 					for ( $i = 1; $i < count( $rows ); $i++ ) : ?>
								<tr>
		<?php 						foreach( $rows[$i] as $row ) : ?>
									<td><?php echo $row; ?></td>
		<?php 						endforeach; ?>
								</tr>
		<?php 					endfor; ?>
							</tbody>
						</table>
					</aside>

<?php 				endif; ?>
				</div>
<?php 			endwhile; ?>
			</div>
		</article>
<?php 	endwhile; ?>
<?php 	get_template_part( 'inc', 'related' ); ?>
	</div>
<?php get_footer(); ?>