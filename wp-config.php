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
define('DB_NAME', 'sandbox_blog');

/** MySQL database username */
define('DB_USER', 'sandbox_blog');

/** MySQL database password */
define('DB_PASSWORD', 'w01v3r1n3');

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
define('AUTH_KEY',         '-m 8tQ<H{0(,r<nS|gYY!s69Z+|6gdF#)4N8AK^85~C ] 6]HqSkM!;aWR=iLe$J');
define('SECURE_AUTH_KEY',  '#6 z5blr1ij470#y`|oYcwFqkqQVe2Z^D^{.4n>q?eH5W[LC r#yRyn-ol7dYTA|');
define('LOGGED_IN_KEY',    'BmF3BUg++#5bkU$J>)a<5]IFGBz/Bc#MHtnq:qC8{%2rz!d!C|xoss(o9DAB0+O|');
define('NONCE_KEY',        'UsJ F0myuD-T!3Y+BJf+L.?}qZZWpU{^^X1/U,H6&%!bn~/U-U@Oq*|0@Vdb|xbF');
define('AUTH_SALT',        'oZ*)C:u-|3Xj2*de:X4GZrBp>tu`X9m+2z<-Hse-.X{=.8 KR:7l+0%}Nif-:oFt');
define('SECURE_AUTH_SALT', 'rWb-RNc$tcM;z2POj`WQry@(: VSw<O^Z=|wi7X?|vZh7V+eQ?2vMMyAP*-Pu]dF');
define('LOGGED_IN_SALT',   ',i>l@vB9---;)D.tnbvlWIt_PxOHUQR<-5D6?jX6|{->gg^q*tB|Z|q.JU*W:mu0');
define('NONCE_SALT',       'P+oM?sPnvbflhRCdkNNOkYPm:aHS71<X9w-#|@;(J&XdZi7 7piG|sNf#G|6?&1W');

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
define('WPLANG', 'en');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', TRUE);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
