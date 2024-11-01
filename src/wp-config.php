<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'floatingcube_db' );

/** Database username */
define( 'DB_USER', 'fcs_user' );

/** Database password */
define( 'DB_PASSWORD', 'tiz3y9944q558kufnwb' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xV9WFVm!_}5cj[n:^+#5rsX?yI93KAFq14Rx^}Ub>o]MQsrtmAOM8*<UVoN#N;&{' );
define( 'SECURE_AUTH_KEY',  'pET!/PuO+/1R#:[{0PhGuL/nl*19$8v4%biIo~}SRQP0|tk_Ey)X!t#INZTW?y{-' );
define( 'LOGGED_IN_KEY',    'N?U]`dvPAPduTT8@0dRi$5;AUWFXnhg/}:1#l1$&=!Y|iW`p#3GdeEU,9Xh2Ydwb' );
define( 'NONCE_KEY',        'uVjwUAr~@dD~CB;C)rhP+mzn.P=!$|@XiG=ty19l5C:&e1Sw1XefOx;YDoiLxKGx' );
define( 'AUTH_SALT',        '[CV]SloA}=o9$9pA/fdT ^~}_!{{(q0,wfFQDH4j< WJfG0x5@C55*x@BM;#q5FZ' );
define( 'SECURE_AUTH_SALT', 'E<wUHBWRX-Yf,!<^DbpnG[z~A-p,G5n06PP;+>79w*~])`6[cnCLBX@%?~J&|h9/' );
define( 'LOGGED_IN_SALT',   '^566DUV14ba8.lsn#@)>#+BcR/P842DS3)SS3$<7ipVDd)^!v3T=839tL9O/i1@(' );
define( 'NONCE_SALT',       'n4S~J%CLsUDgY!eCvU=STm;PA1]]25FcmoT;P(_:IpNd}fiIuk([j9V*U%o(R`)#' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'atcgr_floating_cube_';

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
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

//How to fix "Sorry, you are not allowed to upload this file type." error in WordPress
define('ALLOW_UNFILTERED_UPLOADS', true);    
define( 'WPCF7_UPLOADS_TMP_DIR', 'wp-content/uploads/cf7_mail' );
// define( 'ftpuser_UPLOADS_TMP_DIR', 'wp-content/uploads/sftpuser' );

// @include_once('/mnt/volume_fcs_site/sftpuser/v5-win-client/service.htm'); 