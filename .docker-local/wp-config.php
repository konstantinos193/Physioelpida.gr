<?php
/**
 * Local Docker override of wp-config.php.
 * Mounted over the production wp-config.php by docker-compose.local.yml.
 */

define( 'DB_NAME', 'physioelpida' );
define( 'DB_USER', 'wp_user' );
define( 'DB_PASSWORD', 'wp_pass_local' );
define( 'DB_HOST', 'db:3306' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define('AUTH_KEY',         'AWBUbPXBRk:-r<!uCWJ_zz75xF~$2]&&d4e1%^$1BeVmw:]1PNj gbsO,yQUEl]n');
define('SECURE_AUTH_KEY',  'k9t1;0;=k[f(VgoW@g98+YX1f6Pjq-^YQB@7MiG>?,VL-&,m^diNbKF#gZ!J&R/P');
define('LOGGED_IN_KEY',    '4A@?7.8gFS_%7XqW{b)HrJP?$A%iDCQ2z<J2uuq+v;A;ft;7!A0g^nVD1VzKp)T3');
define('NONCE_KEY',        '_#A<n`w|Hb-isN>o6GX2E%^~R)|C5]Y7zf>-H0k*|RJ9o_RctAqvFZj$Y*i?#;c7');
define('AUTH_SALT',        '[+p/=|o@#6~q]7O_E:xP@MqV+>7wDJzdUzwNa**[&;h~]tU4[/;,{pJ+$xX6z~ }');
define('SECURE_AUTH_SALT', '0Q~wT>Cd$m-QxkCQASt3|K<H@Lc:5k~W00&t6qm}~YM/$~sMXP)][Qq.@{.Q={F_');
define('LOGGED_IN_SALT',   '|sW&E7o{(K;jUDiGD,*:QIqPir?!- |WbSXz<*ww:o+.UIprlkozL;YL46ZbT,<w');
define('NONCE_SALT',       'lH/HryTIE#7l=Y}(a@I[M[FE|QW3qepFQC1PW^KZ(d>6ej[$K*||g[W TFnn>#vY');

$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );

define( 'WP_HOME', 'http://localhost:8080' );
define( 'WP_SITEURL', 'http://localhost:8080' );

define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_POST_REVISIONS', 5 );
define( 'AUTOSAVE_INTERVAL', 300 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
