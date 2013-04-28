<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fahimcho_zayne');

/** MySQL database username */
define('DB_USER', 'fahimcho_zayne');

/** MySQL database password */
define('DB_PASSWORD', 'chowdhury');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
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
define('AUTH_KEY',         'Z19B?Aiqs?NprGGwc`%R[|aNG>KSTGUbhrNR5Lj!.|UFq.jARW2BE`#Adm5_.n@&');
define('SECURE_AUTH_KEY',  '`-+*sj6(`=R3dF%d]@piYN%Wk!@zZ, ^qAI+vD]a4<:Td0s#e7Kd~>Ky_lV2*elH');
define('LOGGED_IN_KEY',    'MOB2N:Q}DR?n {i-U3OoDe9<28S2Quh-W=O+p&E)+|p,`Z2>$MR~}iWOX(zhWs1J');
define('NONCE_KEY',        '@_:>&Tk+zgKa<7G?oiT|a|__2xUYB!X%,k7GdUJ!O/Y4cEVjlk-IjIH!$?`Uy`<j');
define('AUTH_SALT',        '<q [QeyL3HRyO@(|l90^_>oKaQ0kl#WYtoeea>aQ7dGD<X;v/_Z24EY[MB%El46|');
define('SECURE_AUTH_SALT', '!)`.ppRxKN$FG6{8h0>o{LP&t1wE+k}$Z{<m<1jP>}Wm(dX9|*;48k`nr9k^{Z.J');
define('LOGGED_IN_SALT',   'i8noa/^mO1yd4OlLMtBn0Ky,0U3 $ 7rwXX?eI>YkX>+FOd$^ @mW$0Cw99mU@Jo');
define('NONCE_SALT',       'I)T,c  +0f^?omRn_>.gjM@T}<HAwBc V>a,Ase`>BbvqOyryP+`cBOqr2_@Zy:7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
