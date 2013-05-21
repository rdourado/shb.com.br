<?php 	global $post, $get_related_from;
		$related = get_field( 'related', $get_related_from ? $get_related_from : $post->ID );
		if ( $related ) : ?>
		<aside class="more block">
			<h3 class="heading">Veja mais</h3>
			<ul class="related-list">
<?php 			foreach( $related as $rel ) : 
				$post_obj = $rel['post_obj']; ?>
				<li class="related-item">
					<a href="<?php echo get_permalink( $post_obj ); ?>">
						<span></span>
<?php 					the_post_thumbnail( 'post-thumbnail', array( 'class' => 'related_image' ) ); ?>
						<h3 class="related-title"><?php echo $post_obj->post_title; ?></h3>
					</a>
				</li>
<?php 			endforeach; ?>
			</ul>
		</aside>
<?php 	endif; ?>
