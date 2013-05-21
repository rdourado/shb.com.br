<?php
/**
 * Custom WordPress configurations on "wp-config.php" file.
 *
 * This file has the following configurations: MySQL settings, Table Prefix, Secret Keys, WordPress Language, ABSPATH and more.
 * For more information visit {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} Codex page.
 * Created using {@link http://generatewp.com/wp-config/ wp-config.php File Generator} on GenerateWP.com.
 *
 * @package WordPress
 * @generatore GenerateWP.com
 */


/* MySQL settings */
define( 'DB_NAME',     'wordpress' );
define( 'DB_USER',     'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8' );


/* MySQL database table prefix. */
$table_prefix = 'shb_';


/* Authentication Unique Keys and Salts. */
/* https://api.wordpress.org/secret-key/1.1/salt/ */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');


/* WordPress Localized Language, defaults to English. */
define( 'WPLANG', 'pt_BR' );


/* Disable Post Revisions. */
define( 'WP_POST_REVISIONS', false );


/* WordPress debug mode for developers. */
define( 'WP_DEBUG',         true );


/* WordPress Cache */
define( 'WP_CACHE', false );


/* Compression */
define( 'COMPRESS_CSS',        true );
define( 'COMPRESS_SCRIPTS',    true );
define( 'CONCATENATE_SCRIPTS', true );
define( 'ENFORCE_GZIP',        true );


/* Contact Form 7 */
define( 'WPCF7_LOAD_JS', false );
define( 'WPCF7_LOAD_CSS', false );


/* Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');