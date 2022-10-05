<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

/** Enable W3 Total Cache if plugin is installed */
if(!defined('WP_CACHE')) define('WP_CACHE', strtolower(getenv('WP_CACHE')) == "true");

/** Disable WP Rocket debug mode */
define ('WP_ROCKET_WHITE_LABEL_FOOTPRINT', true);
define ('WP_ROCKET_WHITE_LABEL_ACCOUNT', true);

/** Force SSL in login & admin */
define('FORCE_SSL_LOGIN', true);
define('FORCE_SSL_ADMIN', true);

define( 'WP_AUTO_UPDATE_CORE', false );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if(!defined('DB_NAME')) define('DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
if(!defined('DB_USER')) define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
if(!defined('DB_PASSWORD')) define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
if(!defined('DB_HOST')) define('DB_HOST', getenv('DB_HOST'));

/** MySQL DB charset */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ePhTh:*4<6/H.NeR@VqM-veuIN+2:=13veJV~%O9jq43-!IF-9;<^5tOo@k2A-&/');
define('SECURE_AUTH_KEY',  'zU 3z9N@BDgW7 G/}ui-q+#,6`TJv(-vy9~r<!cXAJ@Xb!-^yXjqm4v>>f+[m6-3');
define('LOGGED_IN_KEY',    '{ 6|TLy;QqQwd2,/@#B{=#j3L9`LN8F<C+Z_Su5l0H%`3D&~-@hqTva@$A$2t4Kw');
define('NONCE_KEY',        'pG1([reg;OhbObKQFX~$WBqr50&Fb_|yp1uX I*C?WY-*Gw3pW~Q.~NKyL`<6:@2');
define('AUTH_SALT',        'AB+!/Dn=4F,6+&Fy.+[-!Z/>-+pW1.u?]@8s{+K*Gig2wLpjtU~_+zo#TIzeet3~');
define('SECURE_AUTH_SALT', 'ToDUMqem>]p7I.sx~=S2_m=yC/*<5,E&V+eO]h%U NbtN9]02L8~<$D|}3=}%9sH');
define('LOGGED_IN_SALT',   '8YBvR@}*W-*iNehL~GUC8ek k#Ddf53}Zfs@F8VD(xyml-WEh-bz/;]Jb!T|5~d)');
define('NONCE_SALT',       'Z^{,/dK-DlGQ3a+dbAaJQ>ZZ?eyAAGVKk-I{xt$F6&UF >V%i)uC]&K[/e`Q4SQV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */

if(!defined('WP_DEBUG')) define('WP_DEBUG', strtolower(getenv('WP_DEBUG')) == "true");

if (getenv('WP_DEBUG') == FALSE) {
	ini_set('display_errors','Off');
	ini_set('error_reporting', E_ALL );
	#define('WP_DEBUG', false);
	define('WP_DEBUG_DISPLAY', false);	
}

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}


define('FS_METHOD','direct');

// Disable File Edits
// define('DISALLOW_FILE_EDIT', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
