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
define('DB_NAME', 'i4959665_wp3');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'qNe=l OJCf^yD>%SPb9$M7WRe7Gt7qz czBHMf{K&IZG18P]Q@;t;*C*@vN*7?11');
define('SECURE_AUTH_KEY',  'p3>Vu1?|I)?B#}r5&Zx| z;vk|R3:Fj}^c$bR=*xUK~3*-+hX@9Cr9<4~# Vn?a[');
define('LOGGED_IN_KEY',    'N8J[e5uYz(1:wp7t%KSlpVsTXUMj*BBzDifY-W0!0d$C._:6E<stC?,aN/C8(KB[');
define('NONCE_KEY',        '6H))_M}YV.Ceh^a+@[<`EDv96gpV:]_$XS0TRDt&{>z]8[}K8^32saADVt2S88M-');
define('AUTH_SALT',        'y&yKNJDEvWt8-d>hR!dL`->!v7Tr#l >$<yRzhd3xz[&YfrLakJcXJ  m-6h4Okf');
define('SECURE_AUTH_SALT', 'm[$cJ&RKb HB&w@o8t}Rg>5mZec`ZmJ{p8#i,$>sxv)G>b6@aWGG`9QMjKTuR[|G');
define('LOGGED_IN_SALT',   'wz-^Mta_Dud0zajah<8u!0oPJ(v.05,S4PHOn&%De@_O215|4)Ok8kyO#{oZmGO(');
define('NONCE_SALT',       'a#6[d*HyYr.3&&r1kIRG6]iqevp)%qWbT0B#.R-T2Io!7_?5&ySZsnx*GzN7AuGu');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pw_g54373_';

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
