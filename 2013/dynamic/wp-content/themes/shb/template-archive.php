<?php 
/*
Template name: Arquivo
*/

$post_type = get_field( 'post_type' );
if ( $post_type ) {
	$link = get_post_type_archive_link( $post_type );
	wp_redirect( $link );
	exit;
} else {
	wp_redirect( home_url( '/' ) );
	exit;
}
