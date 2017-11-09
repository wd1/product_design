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
define('DB_NAME', 'bloomcol_instantmock');

/** MySQL database username */
define('DB_USER', 'bloomcol_instantmock');

/** MySQL database password */
define('DB_PASSWORD', '$s_+C={DV)sn');

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
define('AUTH_KEY',         '3X8`>x34XqvN7slS86-E*GXaQmt3)Uqo{Ro 1-_](}DT(h~B%A9uHP}$vb.V}%%n');
define('SECURE_AUTH_KEY',  'IL/~{+Jx!duMU2b>^):GtrO;KHJXkRFNtX#N+Rm5)GvZ|~T-#;tfO-le}JaNtAy3');
define('LOGGED_IN_KEY',    'R/TwO]a1,so( 8M?:@8uSA)n|kmyds*Fp8tlb,2+?J,`9o{4JG>0?aTP8NxZR>q(');
define('NONCE_KEY',        '+njN7*lEUv|VMn*/us$U*0Qj6GYb4e`+ym)oQ<`_-`7fRA%Vb`6atY%@3TXPZF>k');
define('AUTH_SALT',        'ya/*^GuoOUX[:V1{bH2wDGi$yI*59-FN,4Ety*)7A!,0YWc`Q*UK2c.MN=/J~9Hw');
define('SECURE_AUTH_SALT', 'kzg6*l(2-|!/5r3qp)g<y<2.Qmaq9c3:<|B@Zj)p]B.a^f&=lit$> .=pTHD)]U9');
define('LOGGED_IN_SALT',   '/<MuP^Vzcb`+n!#kr>,D$l-J4A1%.I*P*}z<>{{2<A!^U /ENy7Vr$h0!tw|P;@o');
define('NONCE_SALT',       '#5ZKuK#u-#ZPPYpvADWrsTN@<B_H$lQiag_rP0(;)g{S= WXNc<7x<JcsVeBSxPZ');

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
