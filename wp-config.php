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
define('DB_NAME', 'toy_database2');

/** MySQL database username */
define('DB_USER', 'ko915');

/** MySQL database password */
define('DB_PASSWORD', 'i dont know');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', '256M');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'pMU|wp.y`Sq*!ZkVIWTe}aZ:oyzzeUiyz_EH%7@o}0U$!}@T.:u*wmir^h51frHx');
define('SECURE_AUTH_KEY',  'vuSE_Y=|E<= (B?rStJ:$W_p<]Tc=6*80XpTGl6OR<+QWRQ0e=BK*>lmaz|QD`DX');
define('LOGGED_IN_KEY',    '([$$T#O.0O`X]~.+`k(|!P$k CyDH>3tQFxMqOU;x<m!fz?Yo{?_S6d=Q0|%z]1o');
define('NONCE_KEY',        '#(wSGI-rX%Ghs|R<`gYAqSzGGZI/A%UXo%tVaDK0$ LF^jyF-3Zv}:J@;y8Qeyh#');
define('AUTH_SALT',        'F%$4Goupaa`#_*0ytNlc?L;t.a1`p|bftv,{Bru!@K|pZ~1LzxwGFB8)0E4hLGnz');
define('SECURE_AUTH_SALT', 'AN4kGy2]8$mJR38Tr$^}IP[l1a%yyY}[qiu*tM.]!mMz44o+DplbPW<bMX/3d;r]');
define('LOGGED_IN_SALT',   '[]iWy_F>=N@=#V[N.]p~u7>tA:GhP*$WREuE,QWAtoEQ[)KtKAGmF%dvKe5|}$yZ');
define('NONCE_SALT',       'X7aH?|-{*]Y9j#Q=yJ<;~WksIx8%t~NuprNnzmL`KfXL9&:VUO6ett8pS_$ F.xB');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
