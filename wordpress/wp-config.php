<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '@Z`Tf^D^%E/V,^gQoLc j898_2px;8)b=4-!2rxd`=m7LjuZe<vP=|yQ=t3XP5Ij' );
define( 'SECURE_AUTH_KEY',  ',bkVlT%c<g$P3MfWFd8<@Ru#:{IP%k-><W#@^-AH@_#RbKmLuO)f$3~Y~&Sl!W45' );
define( 'LOGGED_IN_KEY',    'vyS9b7|MCO$Y~$//R1|snFLvtap=y&~Y:W&[J%$D:RF0;&[kkZ$7qH}l{|`nN-y1' );
define( 'NONCE_KEY',        '=}Q#zyK]0;5&$?zb9C!ox/ZJG?3Mev g$w4<y(W1>P[=C#Z><trAbyYyIoLb(RS@' );
define( 'AUTH_SALT',        '4cy{Dpc6_4 S9 f7-Ef!GE~N>d~t,Lh=4;8l62oy:SNb`~/:sO.pVD>bL@|zS`[Y' );
define( 'SECURE_AUTH_SALT', 'F;kk-he_ro%G7N=%)IQB%~_ZOgH.rYF O&lei3+f(*|Vm:Mi|SE5)+xFn8eHG4u;' );
define( 'LOGGED_IN_SALT',   '$/[gtXC%;mN2PdqO>6v^2L<n<W`~3Tiw]~2-`M[x2[!gd>T/r#ingb7o-ktjM5PK' );
define( 'NONCE_SALT',       'hx<5!.YIf564p[7WK g4_^T`3_&,Jc6aZ1W/JjFM^sE6H<(M0tk! -$ =ctRx`v!' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
