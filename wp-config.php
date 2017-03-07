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
define('REVISR_GIT_PATH', 'https://github.com/yogeshmarketingmindz/demo.git'); // Added by Revisr
define('REVISR_WORK_TREE', '/var/www/html/fastpbx'); // Added by Revisr
define('DB_NAME', 'fastpbx2feb'); 
//define('DB_NAME', 'fastpbxlive'); 
/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345');

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
define('AUTH_KEY',         'ComiuD0,s~*7&qn[|`]x}l{ReAPpZ,8P(!Q.H^yuFGnnND)NXxDwslnzVV]-hpSS');
define('SECURE_AUTH_KEY',  '~qi5+q~/peIG{X/al<I3BqF~,nI=[>3SaSvGZD}8a[$Ii_,f{BpMblv]a~w#D:$>');
define('LOGGED_IN_KEY',    '#7!w,v(_Dd2BCy>Khxy0OK4,7jLiX^.=wy_x9^Gtenxe$<#Epp.B*]r&y(s:a2R+');
define('NONCE_KEY',        'b~na.wF8khBfa{81cNt#cL{N!0yV3nm9i32ma*R)BS3pp_ml@#n}!Lk4jk<?azK$');
define('AUTH_SALT',        'J-l{N^&}au^&q@rD1tRvI]5LDT[_l{Z]4D?QD!S-OBUX2+2f&rP7~9+A^a/c)<y.');
define('SECURE_AUTH_SALT', 'u6L=]ARp2.PS@UKU>+Wr JW(@BxDy?_nR.P~+f-`pKwnb+!e<U%~$E7@uI}oiCt@');
define('LOGGED_IN_SALT',   'J[#3Ys?u&&L6 )yzC fCHSK<=%ygt/dGCe7>5&cHZ,H(u=I#78l|O,%S/qhZ$|#.');
define('NONCE_SALT',       '9ou&&E0K8,g[/}vKL+53dXAGx4ZLj3Z,Lp~fB(]f<}pk>R<c?r3NoZ{-/i5Y4@Py');

/**#@-*/
define('REVISR_GIT_DIR', '/var/www/html/fastpbx/.git'); // Added by Revisr
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pbx_';

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
