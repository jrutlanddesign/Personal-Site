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
define('DB_NAME', 'db486507836');

/** MySQL database username */
define('DB_USER', 'dbo486507836');

/** MySQL database password */
define('DB_PASSWORD', 'tan6erine12');

/** MySQL hostname */
define('DB_HOST', 'db486507836.db.1and1.com');

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
define('AUTH_KEY',         '$DSU d=WI^kf=vQg-0qv-^q#Z%h@El|}{[Pa-WY0-tXelSHdz`UA*+BAYFO%k#Vw');
define('SECURE_AUTH_KEY',  '%$=h|BbTL<4/Op|C,mKIAO8s^)T 8!Cr8m79$N/}HKOuC]$rfPJ+jt0wO3?l5FCm');
define('LOGGED_IN_KEY',    ')tL1-?%QJo+n]Y;[Lo4 Ebw|[Q7P{%_l^P(0En PMb&Mw2hC?@ Bjf9i<$]jw=LT');
define('NONCE_KEY',        'C:9o3e+vz*#,+tO-ebWXI5Ib(kGBy&+wr8+L;f8CA|Lo}b@vd}#P8~v~WF.H1kk1');
define('AUTH_SALT',        '|mCn}o]yb-V@rLm)X-Zjbv/YFMb:(VE,+5rs^5~N~4^G^H&OdY=ki#x)@ZQAstHj');
define('SECURE_AUTH_SALT', 'DW}U7VvM_.$+ea%4`QoXlS278CRR[-|MsG<m<ZQe-,gRWxdnOTK-^V&/~-.u!-KY');
define('LOGGED_IN_SALT',   'L@j%YSh-]2vf-sq~P}qk~^99pJ%r4y@a*BLCaN@VfOe9XPu?fgWC2Hoc,.;RMa@S');
define('NONCE_SALT',       'DBq6iU#t8>2nKTW7ohuA9,SP=:qpJ|i`#=m~A`6N#l.hp5Tv|VB?rI5RfTq5N`R_');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_blog';

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
