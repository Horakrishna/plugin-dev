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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plugin_dev' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' XO&<tI=sei<5QeyL9BRY#roLJy^:a#GCZC,bU: {Z E%6vI@ps6NEbP%#+;gh[_' );
define( 'SECURE_AUTH_KEY',  'zUUL:L9^N^uEH478_%qV0t.2I/`91BZUNP8-{tvB*wefpD<2/l0u.gNV,iil((*c' );
define( 'LOGGED_IN_KEY',    'WxT7~R8Q6K~^zBH`j-KUYQQ&?CCs%,AWKePq=Ts?vJ]i&Z6Xd55x!>D%G)sOP>ue' );
define( 'NONCE_KEY',        ']ld$eRRv{(+gfY~`zw/3P3t<b/Vpjo-=2TcA-.YpAn*&o*-41Y-& c-.a$JZ[sk)' );
define( 'AUTH_SALT',        'xjj]d,Yulw#0_[tl^A)l8_iBi*?Yr$OLP0Mi]|y;a;?$8LBomn(~F7<A%{f){q{)' );
define( 'SECURE_AUTH_SALT', 'm#<byA5m^F|?L8|dBysR<m<x?_DHpQUs)ElJ;d?Mxu07%*FW%h+I))Unk,UmGpaX' );
define( 'LOGGED_IN_SALT',   'b- f .;1D@BY%1OKA@Z#w)X1XB:Byn/bq@EGLJ)RX3qh*yK7DdV8-n US7WQ@a5%' );
define( 'NONCE_SALT',       '%~kW xX&09A%R6#u|YOC_Imftjvk*koW0bB#&=G&0f6{LJJ4tz.j9onZF2pq=C%*' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_plugin_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
