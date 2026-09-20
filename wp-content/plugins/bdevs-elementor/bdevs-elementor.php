<?php
/**
 * Plugin Name: Bdevs Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  http://bdevs.net/plugins/bdevs-elementor/
 * Version:     1.0.7
 * Author:      Nasir Uddin Mandal
 * Author URI:  http://bdevs.net
 * Text Domain: bdevs-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Bdevs Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class BdevsElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.5';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var BdevsElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return BdevsElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {
		// Load textdomain
		load_plugin_textdomain( 'bdevs-elementor', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Bdevs Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Bdevs Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Bdevs Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('bdevs-elementor',
	      	array(
					'title' => __( 'Bdevs Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/bdevs-elementor.js', array( 'jquery' ), self::VERSION );
	}

	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
	wp_register_style( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/bdevs-elementor.css', self::VERSION );
	}




	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once plugin_dir_path( __FILE__ ) . 'includes/bdevs-woo.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/slider-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/about-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/about-info-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/service-post-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/member-post-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/challenge-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/pricing-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/cta-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog-post-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/fact-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/mission-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/subscribe-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/appointment-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/whatwedo-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/counter-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/brands-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/experience-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/testimonial-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/premium-membership-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/faq-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/analaysis-tab-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/heading-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/portfolio-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/contact-info-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/contact-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/map-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/why-choose-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/features-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/carousel-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/medical-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/doctor-routine-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/video-content-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/iconbox-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/member-list-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/product-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/btn-widget.php';

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsSlider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsAboutInfo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsAbout() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsServicePost() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsChallenge() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsPring() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsCTA() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsBlogPost() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsCounter() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsFaq() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsMemberPost() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsFact() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsMission() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsSubscribe() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsTestimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsAppointment() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsWhatwedo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsBrand() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsExperience() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsPremiumMembership() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\Bdevs_analysis_tab() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsHeading() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsPortfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsContactInfo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsContact() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsMap() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsWhyChoose() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsFeatures() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsCarousel() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsMedical() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsDoctorRoutine() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsVideo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsIconbox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsMemberlist() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsProductPost() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \BdevsElementor\Widget\BdevsBtn() );
	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

BdevsElementor::instance();
