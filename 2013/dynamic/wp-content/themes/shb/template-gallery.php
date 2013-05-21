<?php 
/*
Template name: Galeria
*/
?>
<?php get_header(); ?>
	<div id="body">
		<article class="hentry">
			<hgroup class="hgroup">
				<h1 class="parent-title">O Clube</h1>
				<h2 class="entry-title page-title">Atividades Extras</h2>
			</hgroup>
<?php 		$groups = array();
			$rows = get_field( 'gallery' );
			foreach( $rows as $row ) 
				foreach( (array) $row['group'] as $group ) 
					$groups[] = $group;
			if ( $groups ) :
				$groups = array_unique( array_filter( $groups ) );
				sort( $groups ); ?>
			<ul class="inner-menu">
				<li class="inner-item"><span></span><a href="#" data-group="all" tabindex="-1">Ver tudo</a></li>
<?php 			foreach( $groups as $group ) : ?>
				<li class="inner-item"><span></span><a href="#" data-group="<?php 
				echo sanitize_title( $group ); ?>" tabindex="-1"><?php echo $group; ?></a></li>
<?php 			endforeach; ?>
			</ul>
<?php 		endif; ?>
			<div class="entry-content">
				<ul class="fullgallery">
<?php 				foreach( $rows as $row ) : 
					$img = $row['image']['sizes'];
					$groups = array();
					foreach( (array) $row['group'] as $group )
						$groups[] = sanitize_title( $group );
					$groups = ' all ' . implode( ' ', $groups ); ?>
					<li class="full-item<?php echo $groups; ?>">
						<a href="<?php echo $row['image']['url']; ?>" class="fancybox">
							<span></span>
							<img src="<?php 
							echo $img['size-gallery']; ?>" alt="" class="full-image" width="<?php 
							echo $img['size-gallery-width']; ?>" height="<?php 
							echo $img['size-gallery-height']; ?>">
						</a>
					</li>
<?php 				endforeach; ?>
				</ul>
			</div>
		</article>
<?php 	get_template_part( 'inc', 'related' ); ?>
	</div>
<?php get_footer(); ?>