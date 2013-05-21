<?php 
/*
Template name: Home
*/
?>
<?php get_header(); ?>
	<div id="body">
		<div class="related block">
			<h2 class="heading">Destaques</h2>
			<ul class="related-list">
<?php 			$related = get_field( 'related' );
				foreach( $related as $row ) :
				$post = $row['post_obj']; ?>
				<li class="related-item">
					<a href="<?php the_permalink(); ?>">
						<span></span>
						<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'related-image' ) ); ?>

						<h3 class="related-title"><?php the_title(); ?></h3>
					</a>
				</li>
<?php 			endforeach;
				wp_reset_postdata(); ?>
			</ul>
		</div>
		<div class="block">

			<div class="popular-photos first-col">
				<h2 class="heading">Fotos + Acessadas</h2>
<?php 			$attach = new WP_Query( array(
					'post_type' 	 => 'attachment',
					'post_mime_type' => 'image',
					'post_status' 	 => 'inherit',
					'posts_per_page' => 5,
					'meta_key' 		 => '_view',
					'meta_value_num' => 1,
					'meta_compare' 	 => '>=',
					'orderby' 		 => 'meta_value',
					'order' 		 => 'DESC',
				) ); ?>
				<div id="slider-code">
					<div class="viewport">
						<ul class="overview photo-list">
<?php 					$counter = 0;
						while( $attach->have_posts() ) : $attach->the_post();
							$img = wp_get_attachment_image( get_the_ID(), 'size-photo', false, array( 'class' => 'photo-image' ) );
							$src = wp_get_attachment_image_src( get_the_ID(), 'full' ); ?>
							<li class="photo-item"><a href="<?php echo $src[0]; ?>" class="fancybox <?php echo get_post_meta( get_the_ID(), '_view', true ); ?>"><?php echo $img; ?></a></li>
<?php 						$counter++;
						endwhile;
						wp_reset_postdata(); ?>
						</ul>
					</div>
					<div class="controls">
						<a href="#" class="buttons prev control-left"><img src="<?php t_url(); ?>/img/left.png" alt="«" class="control-icon" width="20" height="24"></a>
						<span class="pager">
<?php 						for ( $i = 0; $i < $counter; $i++) : ?>
							<a rel="<?php echo $i; ?>" class="pagenum control-button" href="#">•</a>
<?php 						endfor; ?>
						</span>
						<a href="#" class="buttons next control-right"><img src="<?php t_url(); ?>/img/right.png" alt="»" class="control-icon" width="20" height="24"></a>
					</div>
				</div>
			</div>

			<div class="partners second-col">
				<h2 class="heading">Parceiros</h2>
				<ul class="partner-list">
<?php 				while( has_sub_field( 'partners' ) ) :
					$logo = get_sub_field( 'logo' );
					$link = get_sub_field( 'link' );
					if ( $link ) : ?>
					<li class="partner-item"><a href="<?php echo $link; ?>"><img src="<?php 
					echo $logo['sizes']['size-partner']; ?>" alt="" class="partner-image" width="<?php 
					echo $logo['sizes']['size-partner-width']; ?>" height="<?php 
					echo $logo['sizes']['size-partner-height']; ?>"></a></li>
<?php 				else : ?>
					<li class="partner-item"><img src="<?php 
					echo $logo['sizes']['size-partner']; ?>" alt="" class="partner-image" width="<?php 
					echo $logo['sizes']['size-partner-width']; ?>" height="<?php 
					echo $logo['sizes']['size-partner-height']; ?>"></li>
<?php 				endif;
					endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
<?php get_footer(); ?>