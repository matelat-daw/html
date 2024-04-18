<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_project' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Anubis@68' );

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
define( 'AUTH_KEY',         '0!2TZu[+T/WXjT?j5BYh5_5!<:;+@x}P1J5BT}={ZBAI`.jr c~p+zTMDry2:Ej(' );
define( 'SECURE_AUTH_KEY',  'P4uc-KlAU<L@Hc2(w_u<<OSOaV9e3-m(<8:gw3@>=ob*Lp(Z0yB/]AK@n?WDsX*&' );
define( 'LOGGED_IN_KEY',    ';jVogW8uHqu@9IsMHo~`ZRcEz =BZCG#/%H)R]cdT$Fa}1YC-)iQ&S^GtLg.n`.i' );
define( 'NONCE_KEY',        'cgsxv/!aU2rBo1sGeB,&LqQQOqmt]w*ui}T79bQI:V.kQt+mI@Lm_^Je:PvU1X}b' );
define( 'AUTH_SALT',        'E,yISAVAwg< >mC^m`zR769nLhtTGnEI=$Q{&U(b[`&.B1s;L?T?r78{3[I`LJ(E' );
define( 'SECURE_AUTH_SALT', 'GrA/u;sBDqL0zXg*b#UezE &vmw>s*lox@dsDE:W?}v|g:fdJ]6S!)bp36z&X|z?' );
define( 'LOGGED_IN_SALT',   ',V8doy8Nb|uJj3F{kY?&a[&(6K kq|(fy]wrmmHoX,G[dey-MCsOAI@xQ%@0P;`l' );
define( 'NONCE_SALT',       'uy/v)d#a3fDq30)eS(eM11^E>9@.h)eCk++fi5d-[b,!F<NoK1KcB`|8(TH82tW9' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
