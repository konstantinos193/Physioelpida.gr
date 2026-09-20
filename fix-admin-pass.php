<?php
/**
 * One-off: re-hash admin user_pass so WP can authenticate it.
 * The DB stores 'Kk.25102002' as plaintext — WP expects a hash.
 * Delete this file after use.
 */
header( 'Content-Type: text/plain; charset=utf-8' );

if ( ! isset( $_GET['key'] ) || $_GET['key'] !== 'ea-migrate-7f3d9a2c-live' ) {
	http_response_code( 403 );
	exit( "forbidden\n" );
}

require __DIR__ . '/wp-load.php';

$user = get_user_by( 'login', 'admin' );
if ( ! $user ) {
	exit( "admin user not found\n" );
}

echo 'user_pass before: ' . substr( $user->user_pass, 0, 10 ) . "...\n";

// Only fix if it's stored as plaintext (no hash prefix).
if ( 0 === strpos( $user->user_pass, '$' ) ) {
	exit( "already hashed — nothing to do\n" );
}

wp_set_password( 'Kk.25102002', $user->ID );
$fresh = get_user_by( 'login', 'admin' );
echo 'user_pass after: ' . substr( $fresh->user_pass, 0, 10 ) . "...\n";
echo 'check: ' . ( wp_check_password( 'Kk.25102002', $fresh->user_pass, $user->ID ) ? 'OK — admin / Kk.25102002 works' : 'FAILED' ) . "\n";
echo "DONE — delete fix-admin-pass.php\n";
