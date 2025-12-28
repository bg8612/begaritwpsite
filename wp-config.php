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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'begarit-studio' );

/** Database username */
define( 'DB_USER', 'begarit-studio' );

/** Database password */
define( 'DB_PASSWORD', 'yI5meRC74WT94VU63UJm' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '4c@]F>5s@Eu*`rTJ4v~DGqYRaS4rW=3 WO&U3>ia{`]Jf:+&-0!y89r&zozOhyLN' );
define( 'SECURE_AUTH_KEY',   'ONW?nxaf:Fz9%J9_g!+>%Zx.|O0^6Vs#3O8zngceECfp[|iXswt~J{h :|Io bMr' );
define( 'LOGGED_IN_KEY',     '=kp;K|T#3CXX@MmUpCiS-y?i~m><.{aVx?xu-[.oB:_Vs80@Y`J,^pzPdb!d_^O*' );
define( 'NONCE_KEY',         'e4}aA)8Ap5n;rv!tEmpEt=$af.F {c]tIHIWy{d&r3mF#G> hu1D`#6Wz<]|H^(#' );
define( 'AUTH_SALT',         '61riOs[|;d>F?BS=pO`/lkB{y%EJ_v#aa);b:RG;^R5[A1{|:839_b2yaNC~b{]P' );
define( 'SECURE_AUTH_SALT',  '0&H*>C-*d^>Qn^Uav_W,k]c}/V1<{Lw&dCaKu#6o(`<vI~mvecyI,7-uh}W(C7%T' );
define( 'LOGGED_IN_SALT',    'g]c)<l>xZ{Jci;A?!JY~=(:;NXp0O,!?Ry1>Y6$K$;6vr[b^b5rcwdds=O,*:Mo<' );
define( 'NONCE_SALT',        'QgS7z&lQXqqBH6?F<|aZ3<=Loe}JD&2E`D1#5)pYl$aAx}6ylkIk61Fh8>=ll0fE' );
define( 'WP_CACHE_KEY_SALT', 'dfy#pI?Myw*!|N<bYC5J8L)S/#RKri{q~S~DS1XH:,m}Z<j/z5S9[xo-#hm[!F6x' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
// Включаем логирование, но выключаем отображение на экране
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true ); // Ошибки будут писаться в файл /wp-content/debug.log
define( 'WP_DEBUG_DISPLAY', false ); // Ошибки исчезнут с экрана сайта
@ini_set( 'display_errors', 0 );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'CONCATENATE_SCRIPTS', false );
define( 'AUTOSAVE_INTERVAL', 600 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 21 );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
