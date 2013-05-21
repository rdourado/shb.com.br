<?php 

$t_url = get_template_directory_uri();

function t_url() {
	global $t_url;
	echo $t_url;
}

/* Setup */

add_action( 'after_setup_theme', 'my_setup' );

function my_setup() {
	// update_option( 'medium_size_w', 400 );
	// update_option( 'medium_size_h', 999 );
	// update_option( 'thumbnail_size_w', 152 );
	// update_option( 'thumbnail_size_h', 134 );
	
	register_nav_menu( 'primary', 'Cabeçalho' );
	register_nav_menu( 'footer_1', 'Rodapé (Coluna 1)' );
	register_nav_menu( 'footer_2', 'Rodapé (Coluna 2)' );
	register_nav_menu( 'footer_3', 'Rodapé (Coluna 3)' );
	register_nav_menu( 'footer_4', 'Rodapé (Coluna 4)' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 314, 222, true );
	add_image_size( 'size-photo', 440, 270, true );
	add_image_size( 'size-partner', 142, 85, true );
	add_image_size( 'size-gallery', 310, 218, true );
}

/* Scripts */

add_action( 'wp_enqueue_scripts', 'my_scripts' );
add_action( 'wp_footer', 'my_wp_footer' );

function my_scripts() {
	global $t_url;
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.9.1.min.js', array(), null, true );
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'fancybox', "{$t_url}/js/fancybox/jquery.fancybox.pack.js", array( 'jquery' ), null, true );
	wp_enqueue_script( 'interface', "{$t_url}/js/interface.js", array( 'jquery' ), filemtime( TEMPLATEPATH . '/js/interface.js' ), true );
}

function my_wp_footer() {
?><script>var t_url='<?php echo get_template_directory_uri(); ?>';</script>
<?php
}

/* Admin */

add_action( 'admin_head', 'my_custom_admin_css' );
add_action( 'admin_menu', 'remove_menus' );
add_action( 'login_enqueue_scripts', 'my_login_logo' );
add_filter( 'acf/options_page/settings', 'my_acf_options_page_settings' );
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_custom_admin_css() {
?><style>
table.acf_input tbody tr td.label { width: 14% }
</style><?php 
}

function remove_menus() {
	global $menu;
	$restricted = array(__('Posts'), __('Media'), __('Links'), __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

function my_acf_options_page_settings( $settings ) {
	$settings['title'] = 'Redes sociais';
	//$settings['pages'] = array('Header', 'Sidebar', 'Footer');
	return $settings;
}

function my_login_logo() { ?>
<style type="text/css">
body.login { background: #333936 }
body.login div#login h1 a {
	background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/img/logo.png);
	background-position: 0 0;
	background-size: auto;
	height: 94px;
	margin-left: auto;
	margin-right: auto;
	width: 90px;
}
.login #nav a,
.login #backtoblog a {
	color: #fff !important;
	text-shadow: none !important;
}
.login #nav a:hover,
.login #backtoblog a:hover { color: #316492 !important }
.wp-core-ui .button-primary {
	background: #316492;
	border-color: #316492;
}
.wp-core-ui .button-primary:hover {
	background: #333936;
	border-color: #333936;
}

</style>
<?php }

function my_login_logo_url() { return home_url( '/' ); }
function my_login_logo_url_title() { return 'Ir para o início'; }

/* TinyMCE */

$my_buttons = array(
	'formatselect,bold,italic,|,bullist,numlist,justifyleft,justifycenter,justifyright,link,unlink,|,wp_fullscreen,wp_adv',
	'pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo,|,spellchecker,wp_help'
);

add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars' );

function myformatTinyMCE( $in ) {
	global $my_buttons;
	$in['theme_advanced_buttons1'] = $my_buttons[0];
	$in['theme_advanced_buttons2'] = $my_buttons[1];
	return $in;
}

function my_toolbars( $toolbars ) {
	global $my_buttons;
	$toolbars['Full'][1] = explode( ',', $my_buttons[0] );
	$toolbars['Full'][2] = explode( ',', $my_buttons[1] );
	return $toolbars;
	exit;
}

/* Post Types */

add_action( 'init', 'register_cpt_prova' );

function register_cpt_prova() {

	$labels = array( 
		'name' => 'Provas',
		'singular_name' => 'Prova',
		'add_new' => 'Adicionar Nova',
		'add_new_item' => 'Adicionar nova prova',
		'edit_item' => 'Editar prova',
		'new_item' => 'New Prova',
		'view_item' => 'Ver Prova',
		'search_items' => 'Pesquisar provas',
		'not_found' => 'Nenhuma prova encontrada',
		'not_found_in_trash' => 'Nenhuma prova encontrada na Lixeira.',
		'parent_item_colon' => 'Parent Prova:',
		'menu_name' => 'Provas internas',
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'page'
	);

	register_post_type( 'prova', $args );
}

/* Action */

add_action( 'template_redirect', 'my_redirect' );

function my_redirect() {
	global $post;
	$redirect_to = get_field( 'redirect_to', $post->ID );
	if ( $redirect_to ) {
		wp_redirect( $redirect_to );
		exit;
	}
}

/* Filters */

add_filter( 'the_content', 'my_content' );

function my_content( $html ) {
	return str_replace( '<h2>', '<h2><span></span>', $html );
}

/* Shortcodes */

remove_shortcode( 'gallery' );
add_shortcode( 'gallery', 'parse_gallery_shortcode' );

function parse_gallery_shortcode( $attr ) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'li',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, 'thumbnail', true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'li';
	
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<ul id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>\n";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$img  = wp_get_attachment_image( $id, 'thumbnail' );
		$src  = wp_get_attachment_image_src( $id, 'full' );
		$link = '<a href="' . $src[0] . '" class="fancybox" title="' . trim($attachment->post_excerpt) . '">' . $img . '</a>';
		$output .= "<{$itemtag} class='gallery-item'>{$link}</{$itemtag}>";
	}

	$output .= "</ul>\n";
	return $output;
}