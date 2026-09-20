<?php
/** One-off: regenerate Elementor's per-post CSS files (uploads/elementor/css). */
define( 'WP_USE_THEMES', false );
require '/var/www/html/wp-load.php';
 
if ( ! class_exists( '\Elementor\Plugin' ) ) {
	echo "Elementor not loaded\n";
	exit( 1 );
}
 
\Elementor\Plugin::$instance->files_manager->clear_cache();
echo "Elementor CSS cache cleared and regenerated.\n";
 