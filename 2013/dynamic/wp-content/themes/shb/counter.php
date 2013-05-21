<?php 

include '../../../wp-load.php';

global $wpdb;

$pid = $wpdb->get_var( $wpdb->prepare( "SELECT `ID` FROM `{$wpdb->posts}` WHERE `guid` = %s", $_POST['href'] ) );

if ( $pid ) {
	$total = intval( get_post_meta( $pid, '_view', true ) );
	if ( ! $total || is_nan( $total ) ) $total = 0;
	update_post_meta( $pid, '_view', ++$total );
	echo $total;
} else {
	echo '0';
}
