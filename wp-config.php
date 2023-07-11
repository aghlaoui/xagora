<?php
define('WP_CACHE', true); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if (strstr($_SERVER['SERVER_NAME'], 'xagora.local')) {
	define('DB_NAME', 'local');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
} else {
	define('DB_NAME', 'if0_34592535_xagora');
	define('DB_USER', 'if0_34592535');
	define('DB_PASSWORD', 'jS64ycTOV17');
	define('DB_HOST', '127.0.0.1');
}

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hXE9xZaKNSZcocpxhoHlzcAVxhghcfaqnrV/T+PsJBdw2rNM+7l6JhuXCstJ93gQhPbtdXz3NvjYrkVYAxcgWQ==');
define('SECURE_AUTH_KEY',  'U5o7lnEZKEHFqPCsnHv9W+ZObQZQ7llxzIbnfNQh2lgDq6KjaC9bomK+UOw0JimW2CWe0hSAOiEg+0zThqIZJQ==');
define('LOGGED_IN_KEY',    'Rn2TCCoud8X9YpNHW6isYnFoPPhKgdkvEHnG8dy+Jyql9XQe52FsQcSODpOWlhzEGqvEHntqE0gvZcV7mEoBZA==');
define('NONCE_KEY',        'pWUvww1zrnL41B0muL4Y7W9xr6mQPb27+v9/JqKCSWfKT+v7Tkcw7fzg2XQ8+5Ckjzx9OwY1LBnSpkGrmYq9kQ==');
define('AUTH_SALT',        'HFbXTNIMt3hNOKnbyBiX9EtmjZB1hHKx22UD4/gvSUh+fL4NK5xCZxKK39D2If8h03rOfWwLNSxi7vscO0wBgQ==');
define('SECURE_AUTH_SALT', 'rgXaYowqatetOkcD/oYxgZ+GdylInNOpIw6k3RAuSIcbmtuludjt4rTnuYjzucYa9kYMUMsrAW9PpsjF1dLuGA==');
define('LOGGED_IN_SALT',   'v3pXapWA5gQUBrXZJtmL9oQ1fwvSlC+mGA89CMR6qGBtLZgzd3pdLXKYvDgVkjl06onj1o6n+NxDJG4kbpCk6w==');
define('NONCE_SALT',       'hJ0xnrIODewzxRjFQscxzouJGdzZEWKZ5eCPEMMJlvp9qiJVGx4mkJBQw7w+O1cycF87A1XJCNRpyIouabnLdw==');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

define('WP_ENVIRONMENT_TYPE', 'local');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
