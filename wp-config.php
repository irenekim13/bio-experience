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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bio_experience' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2wJBUH`[plMQ>BBXt)1{=GB%MiC``zwefB%m1/q;rakPc5Le~|{/?,0Z3hiPCbcr' );
define( 'SECURE_AUTH_KEY',  'K5gLecO&hXWx q_L!M([Oq645hU_U!Zf0.Qu^@8 2d(>7oOjQ!N5T-GR5Z _]0VP' );
define( 'LOGGED_IN_KEY',    ')^oPURv` XY{]V9@0w4NQY2.#K_klQH%T,y66KD#XK@7__)mZriN%;[S0aUplB`|' );
define( 'NONCE_KEY',        '%Ve(QEupI0}+^T^OGmt?@<xL_8(nw!W5^u +@urWK5/.m@`=_*]Z].V(,0721~,@' );
define( 'AUTH_SALT',        'ydo01OdauUjM(aZq{xF)PlpC*dODTx5,jqDR=@1RsQbHL8Sx5ipz.lV<9;%Ev3$C' );
define( 'SECURE_AUTH_SALT', '?7%p}[v:,FVE,+{<+83bJ_3eQM? =;G$I6Y0|W;H+l:({5IyG%%n%Q>#}YUL7+1]' );
define( 'LOGGED_IN_SALT',   'y~,?:l9f1a#|q$T%X~*K4W1.o@ [2flmWzzzU@s6~Ju6~73|!c&3G2NGGdq(`@u^' );
define( 'NONCE_SALT',       'A6u[G%ww&V}6vKQtkDzx<;.3B_I_]Y^cS8lF,(,1/W`sc(kcKEt?WWni>}rN3@2,' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
