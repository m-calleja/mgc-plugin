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
define('DB_NAME', 'customdb');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'adminwp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'b0.^X-$yYYD|<r9oty[[1^-6MM9xg>u(XsX>~ $w8&yGF1?7&30zLXVdNi70D,');
define('SECURE_AUTH_KEY',  'MHpNR:)08?9I 1(J(Zi@!$rQuL2<.I`wJ|ho0%.t}YKrCENn|H|RE+vSSVD%iPTo');
define('LOGGED_IN_KEY',    '>+L#/7l<6}qbRAm@D}z<J`jmX==5_UG:|/_=!sDN<v8jY)F8SKr]dt-=X+RBj|v3');
define('NONCE_KEY',        'PtdR$^paj(Arcy*})fB58yvkzS3]<p&i&10[kFsn2NnxZ^Nx(l33p}7u>^D%@.?>');
define('AUTH_SALT',        'coqcS cICg$BHm.j`t(M[ygHb`LjqM4K|1X.g8QkkLh:k:LZS?(C$<#UiL9vFouO');
define('SECURE_AUTH_SALT', '#28knxvBRe7K4A}doVPP] /JYy ^Sp|DLPqF;,/=>eeri1N7T_aqQy#-(4S5/zrg');
define('LOGGED_IN_SALT',   '3P$+Fb,&beAIaY?Sezh$wd1oFU~5/4IUS:70v@xl KqWD:7^gm@C5ED`KL6k//w.');
define('NONCE_SALT',       'Uzd_givKwrND<&ficBy89dlLO|yLcaY1aIEa^zzx)B$/.AUP4)0 7KT4aXiw?}Pz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
