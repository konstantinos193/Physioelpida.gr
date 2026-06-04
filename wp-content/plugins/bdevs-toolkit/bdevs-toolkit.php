<?php 
if ( !defined('ABSPATH') )
    exit;

/*
Plugin Name: Bdevs Toolkit
Plugin URI: http://bdevs.net/
Description: Bdevs Toolkit Plugin
Version: 1.1.1
Author: BDevs
Author URI: http://bdevs.net
*/

define( 'BDEVS_TOOLKIT_VER', '1.1.1' );
define( 'BDEVS_TOOLKIT_DIR', plugin_dir_path( __FILE__ ) );
define( 'BDEVS_TOOLKIT_URL', plugin_dir_url( __FILE__ ) );

define( 'BDEVS_TOOLKIT_METABOX_ACTIVED', in_array( 'cmb2/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

final class Bdevs_toolkit {

	private static $instance;

	function __construct() {

		require_once BDEVS_TOOLKIT_DIR . '/inc/class-ocdi-importer.php';
		require_once BDEVS_TOOLKIT_DIR . '/inc/bdevs-member-post.php';
		require_once BDEVS_TOOLKIT_DIR . '/inc/bdevs-portfolio-post.php';
		require_once BDEVS_TOOLKIT_DIR . '/inc/bdevs-service-post.php';
		require_once BDEVS_TOOLKIT_DIR . '/inc/bdevs-price-tables-post.php';
		require_once BDEVS_TOOLKIT_DIR . '/inc/bdevs-routine-post.php';
    	require_once BDEVS_TOOLKIT_DIR . '/inc/bdevs-meta-boxes.php';

    	/**
		* widgets
		*/
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-info-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-profile-number-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-author-profile-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-company-profile-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-menu-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-profile-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-recent-post.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-service-request-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-extra-info.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-subscriber-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-subscriber-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-footer-subscriber-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-latest-posts-sidebar.php';

    	add_filter( 'template_include', array( $this, '_portfolio_template_include' ) );
    	add_filter( 'template_include', array( $this, '_service_template_include' ) );

		add_filter('excerpt_length', array($this,'custom_post_excerpt'));
		add_filter('excerpt_more', array($this,'custom_new_excerpt_more'));
	}

	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Bdevs_toolkit ) ) {
			self::$instance = new Bdevs_toolkit;
		}
		return self::$instance;
	}

	public function _portfolio_template_include( $template ) {
		if ( is_singular( 'bdevs-portfolio' ) ) {
			return $this->_get_portfolio_template( 'single-bdevs-portfolio.php');
		}
		return $template;
	}
	
	public function _get_portfolio_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = BDEVS_TOOLKIT_DIR . 'template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}

	public function _service_template_include( $template ) {
		if ( is_singular( 'bdevs-service' ) ) {
			return $this->_get_service_template( 'single-bdevs-service.php');
		}
		return $template;
	}
	
	public function _get_service_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = BDEVS_TOOLKIT_DIR . 'template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}

	
	function custom_post_excerpt($length){
		global $post;
		if ($post->post_type == 'bdevs-service')
			return 15;
		return $length;
	}

	function custom_new_excerpt_more( $more ) {
		global $post;
		if ($post->post_type == 'bdevs-service')
			return '';
		return $more;
	}
}

function Bdevs_toolkit() {

	return Bdevs_toolkit::instance();
}

Bdevs_toolkit();


/**
* taxonomy category
*/
function bdevs_get_terms($id,$tax){
    $terms = get_the_terms( get_the_ID(), $tax ); 
    $list = '';
    if ( $terms && ! is_wp_error( $terms ) ) : 
        $i=1;
        $cats_count = count($terms);
        foreach ( $terms as $term ) {
            $exatra = ( $cats_count > $i ) ? ', ' : '';
            $list .= $term->name . $exatra;
            $i++;
        }
    endif;
    return trim($list,',');
}


// Load textdomain
function medidove_load_plugin_textdomain() {
	load_plugin_textdomain( 'bdevs-toolkit', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'medidove_load_plugin_textdomain' );


