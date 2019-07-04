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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ljPthF5LUyG3xuwWJfkszjSkmXWC1+z4n57LGuBvOPiRnzGa7r+JMisDXtx2H5+jTnitMqiVEfdyFEiN3A4TMA==');
define('SECURE_AUTH_KEY',  't5H00eF0tSR4c5GZqH7QMNQ4Fie4WTcgRVAgTEfeXxtIjN6gfRmgfi/BtSgvSzu8djDER5CTBajUkXc1zuDMdA==');
define('LOGGED_IN_KEY',    'iNbc7hIO6ckbPvZ+F3Vpu/5fEaupgGQyEXIb6pU6R8K+FbBkB+Shneah/c/BM+BXE0MB7ucjUZSNiZmENmBRKA==');
define('NONCE_KEY',        'vVLLIToDyTclxKUr7zMCW9KbfpsaQinyHAqmebL71XqunWZaftVR/tq8nOOZN0aKbd7brrhvc4+Gnc574KL9UQ==');
define('AUTH_SALT',        '40IBdHMTi9ShCyWhSH7wv+tJUYn/m9zKwyEC0ZJbg2hbGtay1d4YgyLmydisz89NfmDpvUG9CHoEcRyZfSr7eA==');
define('SECURE_AUTH_SALT', 'fJGN3BQwFzCQTrPtGwn4iDNMm4GMLJ/2OFO7W4PVoF+k/U6WEuJFBm6MyaM3yCsFWpxi/HDoTguACZEZsqonWA==');
define('LOGGED_IN_SALT',   'S9Y0DH909VDiXBRMs8l6lH4yKl2XuK+2Ak2r56J6rG/HMROd2Xm4o6BbPR0M5TB6cqJvO1h6dmiJYdDyGMHKVw==');
define('NONCE_SALT',       'GXcsaQ92Z9aeFcAgxye+1lOfA9Uk0jyjWtT4MhLbb4pSD4s4jmi3qFwH4gdJIqGIDJFAH1IXiHLamK2xz7qFdQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
