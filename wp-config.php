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
define( 'DB_NAME', 'krushqbd_newsk' );

/** MySQL database username */
define( 'DB_USER', 'krushqbd_newsk' );

/** MySQL database password */
define( 'DB_PASSWORD', '(Ypf6j5-S6' );

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
define( 'AUTH_KEY',         'ok5wwog0sl7vbstv3wfb0m1gqul0mw63z260q0bbc7lf3jyjnbcnwabsddqvaqqm' );
define( 'SECURE_AUTH_KEY',  'rowqdixduawgjdfyv0xtrzmg1xcricxqf35srdm0mzkrm0ckgjgrrktve0troifl' );
define( 'LOGGED_IN_KEY',    'xzyerq5eczzzxoew5n3na3tz2bmuvlogulnattbagyqzuvi1rva9onxkr5b2pwhk' );
define( 'NONCE_KEY',        'qm3aptihlfgknkhfxztuv8o7btumuspg4ffyzymkezbwxsqsxeby6mp6btrddycf' );
define( 'AUTH_SALT',        'zdrqfaupxvaqsjhozp3w3amebti2ugtdzcx5iqfpjqxpl2a73taedliei10huj3p' );
define( 'SECURE_AUTH_SALT', 'stvdalsm29mdbsxjrffg2k3f4qk9nkuzsxjkckvzhy2iii8qbmdtvzv8vnvf7l1w' );
define( 'LOGGED_IN_SALT',   '425blw2rfvpcy51fsqvfol7d7ktkd8cfbw6e0bjylmwx8jrldv74omz5oqjisluk' );
define( 'NONCE_SALT',       'poocdioqldvxxfph5d7v3hpdtlhrqhcctmr5rzfkgoixi8uap86g5xlml3gswbhy' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp5o_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
