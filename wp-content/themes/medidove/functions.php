<?php
/**
 * medidove functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package medidove
 */

if ( ! function_exists( 'medidove_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function medidove_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on medidove, use a find and replace
		 * to change 'medidove' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'medidove', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'medidove' ),
			'header-top-menu' => esc_html__( 'Header Top Menu', 'medidove'),
			'category-menu' => esc_html__( 'Category Menu', 'medidove' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'medidove' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'medidove_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Enable custom header
		 */
		add_theme_support('custom-header');

		// enable woocommerce
		add_theme_support('woocommerce');
		
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );

		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		remove_theme_support( 'widgets-block-editor' );

		add_image_size( 'medidove-team-thumb', 450, 530,array('center','center') );
		add_image_size( 'medidove-team-circle', 270, 270,array('center','center') );
		add_image_size( 'medidove-latest-blog', 740, 1000,array('center','center') );

	}
endif;
add_action( 'after_setup_theme', 'medidove_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function medidove_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'medidove_content_width', 640 );
}
add_action( 'after_setup_theme', 'medidove_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function medidove_widgets_init() {

	/**
	* blog sidebar
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'medidove' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'medidove' ),
		'before_widget' => '<div id="%1$s" class="widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title mb-30">',
		'after_title'   => '</h3>',
	) );

    register_sidebar(array(
        'name' => esc_html__('Product Sidebar', 'medidove'),
        'id' => 'product-sidebar',
        'before_widget' => '<div id="%1$s" class="product-widgets side-cat %2$s mb-45">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="product-widget-title">',
        'after_title' => '</h6>',

    ));
	

	/**
	* Footer Widget 
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'medidove' ),
		'id'            => 'footer-widget',
		'description'   => esc_html__( 'Default Footer Widget', 'medidove' ),
		'before_widget' => '<div class="col-xl-3 col-lg-3 col-md-6">
                        		<div id="%1$s" class="footer-widget mb-40 %2$s">
		',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="footer-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	/**
	* Footer Widget Style 2
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Style 2 : Left', 'medidove' ),
		'id'            => 'footer-widget-left',
		'description'   => esc_html__( 'Footer 2 Column Widget', 'medidove' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );	

	/**
	* Footer Widget Style 2
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Style 2 : Center', 'medidove' ),
		'id'            => 'footer-widget-center',
		'description'   => esc_html__( 'Footer Style 2 : Center', 'medidove' ),
		'before_widget' => '<div class="col-xl-2 offset-xl-1 col-lg-3 col-md-4">
                            <div class="footer-widget mb-30">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<div class="footer-title"><h3>',
		'after_title'   => '</h3></div><div class="footer-menu">',
	) );
	/**
	* Footer Widget Style 2
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Style 2 : Right', 'medidove' ),
		'id'            => 'footer-widget-right',
		'description'   => esc_html__( 'Footer Style 2 : Right', 'medidove' ),
		'before_widget' => '<div class="col-xl-2 offset-xl-1 col-lg-3 d-md-none d-lg-block">
                            <div class="footer-widget mb-30">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<div class="footer-title"><h3>',
		'after_title'   => '</h3></div><div class="footer-menu">',
	) );

	/**
	* Footer Top Widget
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top', 'medidove' ),
		'id'            => 'footer-top-widget',
		'description'   => esc_html__( 'Footer Top Widget', 'medidove' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );	

	/**
	* Footer Widget Style 3
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Style 3', 'medidove' ),
		'id'            => 'footer-widget-3',
		'description'   => esc_html__( 'Default Footer Widget', 'medidove' ),
		'before_widget' => '<div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="footer-widget mb-40">
                            ',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="footer-title"><h3>',
		'after_title'   => '</h3></div>',
	) );


	/**
	* Footer Widget Style 4 er 1st Widget 
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Style 4 : Company Info', 'medidove' ),
		'id'            => 'footer-widget-style-4-er-first-widget',
		'description'   => esc_html__( '1st Widget of Footer Widget Style 4', 'medidove' ),
		'before_widget' => ' <div id="%1$s" class="footer-contact-info footer-contact-info-3 mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title">
                                    <h3>',
		'after_title'   => '</h3></div>',
	) );

	/**
	* Footer Widget Style 4 er 2nd Widget
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Style 4 : More Links', 'medidove' ),
		'id'            => 'footer-widget-style-4-er-second-widget',
		'description'   => esc_html__( '2nd Widget of Footer Widget Style 4', 'medidove' ),
		'before_widget' => '<div id="%1$s" class="footer-widget h4footer-widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	/**
	* Footer Widget Style 4 er 3rd Widget
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Style 4 : Recent News', 'medidove' ),
		'id'            => 'footer-widget-style-4-er-third-widget',
		'description'   => esc_html__( '3rd Widget of Footer Widget Style 4', 'medidove' ),
		'before_widget' => '<div id="%1$s" class="footer-widget h4footer-widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title">
                                    <h3>',
		'after_title'   => '</h3></div>',
	) );

	/**
	* Footer Widget Style 4 er 4th Widget
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Style 4 : Opening Hours', 'medidove' ),
		'id'            => 'footer-widget-style-4-er-fourth-widget',
		'description'   => esc_html__( '4th Widget of Footer Widget Style 4', 'medidove' ),
		'before_widget' => '<div id="%1$s" class="footer-widget h4footer-widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title">
                                    <h3>',
		'after_title'   => '</h3></div>',
	) );

	$footer_style_5_switch = get_theme_mod('footer_style_5_switch', false );
	$footer_style_6_switch = get_theme_mod('footer_style_6_switch', false );
	$footer_widgets = get_theme_mod('footer_widget_number', 4);

	// footer 5
	if ( $footer_style_5_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Style 5: '. $num, 'medidove'),
				'id'            => 'footer-5-'. $num,
				'description'   => esc_html__( 'Footer Style 5: '. $num, 'medidove' ),
				'before_widget' => '<div id="%1$s" class="footer-widget footer-widget-6 custom-footer-'.$num.' mb-40 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="footer-title"><h3>',
				'after_title'   => '</h3></div>',
			) );			
		}
	}

	// footer 6
	if ( $footer_style_6_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Style 6: '. $num, 'medidove'),
				'id'            => 'footer-6-'. $num,
				'description'   => esc_html__( 'Footer Style 6: '. $num, 'medidove' ),
				'before_widget' => '<div id="%1$s" class="footer-widget footer-widget7 custom-footer-'.$num.' mb-40 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="footer-title"><h3>',
				'after_title'   => '</h3></div>',
			) );			
		}
	}


	/**
	* Member Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Member Sidebar', 'medidove' ),
			'id' 			=> 'members-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Member Details Sidebar.', 'medidove' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                                <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget mb-80 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);

	/**
	* Service Widget
	*/
	
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Service Sidebar', 'medidove' ),
			'id' 			=> 'services-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'medidove' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);

	/**
	* Portfolio Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Portfolio Sidebar', 'medidove' ),
			'id' 			=> 'portfolio-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Portfolio Details Sidebar.', 'medidove' ),
			'before_title' 	=> '<h3>',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="portfolio-sidebar  %2$s">',
			'after_widget' 	=> '</div>',
		)
	);
}
add_action( 'widgets_init', 'medidove_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
define('MEDIOVE_THEME_DIR', get_template_directory() );
define('MEDIOVE_THEME_URI', get_template_directory_uri());
define('MEDIOVE_THEME_CSS_DIR', MEDIOVE_THEME_URI.'/css/');
define('MEDIOVE_THEME_JS_DIR', MEDIOVE_THEME_URI.'/js/');
define('MEDIOVE_THEME_INC', MEDIOVE_THEME_DIR.'/inc/');

/** 
 * medidove_scripts description
 * @return [type] [description]
 */
function medidove_scripts() {
	/**
	* all css files
	*/

	wp_enqueue_style( 'medidove-fonts', medidove_fonts_url(), array(), '1.0.0' );
	if( is_rtl() ){
		wp_enqueue_style( 'bootstrap-rtl', MEDIOVE_THEME_CSS_DIR.'bootstrap.min-rtl.css', array() );
	}else{
		wp_enqueue_style( 'bootstrap', MEDIOVE_THEME_CSS_DIR.'bootstrap.min.css', array() );
	}

	wp_enqueue_style( 'owl-carousel', MEDIOVE_THEME_CSS_DIR.'owl.carousel.min.css', array() );
	wp_enqueue_style( 'animate', MEDIOVE_THEME_CSS_DIR.'animate.min.css', array() );
	wp_enqueue_style( 'magnific-popup', MEDIOVE_THEME_CSS_DIR.'magnific-popup.css', array() );
	wp_enqueue_style( 'fontawesome-all', MEDIOVE_THEME_CSS_DIR.'fontawesome-all.min.css', array() );
	wp_enqueue_style( 'meanmenu', MEDIOVE_THEME_CSS_DIR.'meanmenu.css', array() );
	wp_enqueue_style( 'slick', MEDIOVE_THEME_CSS_DIR.'slick.css', array() );
	wp_enqueue_style( 'medidove-default', MEDIOVE_THEME_CSS_DIR.'default.css', array() );
	wp_enqueue_style( 'medidove-shop', MEDIOVE_THEME_CSS_DIR.'shop.css', array() );
	wp_enqueue_style( 'medidove-gutenberg-editor-styles', MEDIOVE_THEME_CSS_DIR.'gutenberg-custom.css', array() );
	wp_enqueue_style( 'medidove-main', MEDIOVE_THEME_CSS_DIR.'main.css', array() );
	wp_enqueue_style( 'medidove-style', get_stylesheet_uri() );
	wp_enqueue_style( 'medidove-responsive', MEDIOVE_THEME_CSS_DIR.'responsive.css', array() );

	// all js
	wp_enqueue_script( 'popper', MEDIOVE_THEME_JS_DIR.'popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', MEDIOVE_THEME_JS_DIR.'bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', MEDIOVE_THEME_JS_DIR.'owl.carousel.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'isotope-pkgd', MEDIOVE_THEME_JS_DIR.'isotope.pkgd.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'slick', MEDIOVE_THEME_JS_DIR.'slick.min.js', array('jquery','imagesloaded'), false, true );
	wp_enqueue_script( 'jquery-meanmenu', MEDIOVE_THEME_JS_DIR.'jquery.meanmenu.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'wow', MEDIOVE_THEME_JS_DIR.'wow.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-nice-select', MEDIOVE_THEME_JS_DIR.'jquery.nice-select.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-scrollup', MEDIOVE_THEME_JS_DIR.'jquery.scrollUp.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-counterup', MEDIOVE_THEME_JS_DIR.'jquery.counterup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'waypoints', MEDIOVE_THEME_JS_DIR.'waypoints.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-magnific-popup', MEDIOVE_THEME_JS_DIR.'jquery.magnific-popup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'waypoints', MEDIOVE_THEME_JS_DIR.'waypoints.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-counterup', MEDIOVE_THEME_JS_DIR.'jquery.counterup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-countdown', MEDIOVE_THEME_JS_DIR.'jquery.countdown.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'medidove-main', MEDIOVE_THEME_JS_DIR.'main.js', array('jquery'), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'medidove_scripts' );

/*
Register Fonts
*/
function medidove_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'medidove' ) ) {
        $font_url =  'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&family=Rubik:wght@400;500;600;700&display=swap';
    }
    return $font_url;
}


/**
 * Implement the Custom Header feature.
 */
require MEDIOVE_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require MEDIOVE_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require MEDIOVE_THEME_INC . 'template-helper.php';


/**
* include medidove functions file
*/
require_once MEDIOVE_THEME_INC . 'class-breadcrumb.php';
require_once MEDIOVE_THEME_INC . 'medidove_navwalker.php';
require_once MEDIOVE_THEME_INC . 'medidove_customizer.php';
require_once MEDIOVE_THEME_INC . 'medidove_customizer_data.php';
require_once MEDIOVE_THEME_INC . 'class-tgm-plugin-activation.php';
require_once MEDIOVE_THEME_INC . 'medidove_add_plugin.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (!defined('MEDIOVE_WOOCOMMERCE_ACTIVED')){
	define( 'MEDIOVE_WOOCOMMERCE_ACTIVED', in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
}

define('MEDIDOVE_WISHLIST_ACTIVED', in_array('yith-woocommerce-wishlist/init.php', apply_filters('active_plugins', get_option('active_plugins'))));

define('MEDIDOVE_QUICK_VIEW_ACTIVED', in_array('yith-woocommerce-quick-view/init.php', apply_filters('active_plugins', get_option('active_plugins'))));

if(MEDIOVE_WOOCOMMERCE_ACTIVED) {
	require_once MEDIOVE_THEME_INC . 'medidove-woocommerce.php';
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function medidove_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'medidove_pingback_header' );

/**
*
* comment section
*
*/
add_filter('comment_form_default_fields', 'medidove_comment_form_default_fields_func');

function medidove_comment_form_default_fields_func($default){
	$default['author'] = '<div class="row">
                            <div class="col-xl-6">
                            	<div class="contacts-name">
                            		<label>'.esc_html__('Your name *','medidove').'</label>
                                	<input type="text" name="author">
                                </div>
                            </div>';
	$default['email'] = '<div class="col-xl-6">
							<div class="contacts-email ">
							<label>'.esc_html__('Your email *','medidove').'</label>
                            <input type="text" name="email">
                        	</div>
                        </div>';
	$default['url'] = '';

	$default['clients_commnet'] = '<div class="col-xl-12">
									<div class="contacts-message">
									<label>'.esc_html__('Comments *','medidove').'</label>
                                     <textarea id="comment" name="comment" cols="30" rows="10"></textarea>
                                    </div>';
	return $default;
}

add_filter('comment_form_defaults', 'medidove_comment_form_defaults_func');

function medidove_comment_form_defaults_func($info){
	if( !is_user_logged_in() ){
		$info['comment_field'] = '';
		$info['submit_field'] = '%1$s %2$s</div></div>';
	}else {
		$info['comment_field'] = '<div class="comments-textarea contacts-message contact-icon">
											<label>'.esc_html__('Comments *','medidove').'</label>
                                                <textarea id="comment" name="comment" cols="30" rows="10"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
	}


	$info['submit_button'] = '<button class="btn cm-form-btn" type="submit">'.esc_html__('Post Comment','medidove').' </button>';

	$info['title_reply_before'] = '<div class="post-comments-title">
                                        <h2>';
	$info['title_reply_after'] = '</h2></div>';
	$info['comment_notes_before'] = '';

	return $info;
}

if( !function_exists('medidove_comment') ) {
	function medidove_comment($comment, $args, $depth) {
		$GLOBAL['comment'] = $comment;
		extract($args, EXTR_SKIP);
		$args['reply_text'] = '<i class="fas fa-reply-all"></i>'.esc_html__('Reply','medidove').'';
		$replayClass = 'comment-depth-' . esc_attr($depth);
		?>
			<li id="comment-<?php comment_ID(); ?>" <?php comment_class($replayClass); ?>>
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar($comment, 102, null, null, array('class'=> array())); ?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link(); ?></h5>
							<span><?php comment_time( get_option('date_format') ); ?></span>
						</div>
						<?php comment_text(); ?>
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>
					</div>
				</div>
		<?php
	}
}

/**
* shortcode supports for removing extra p, spance etc
*
*/
add_filter( 'the_content', 'medidove_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function medidove_shortcode_extra_content_remove( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}

// medidove_search_filter_form
if(!function_exists('medidove_search_filter_form')){
  function medidove_search_filter_form( $form ) {
    
    $form = sprintf( 
    	'<div class="sidebar-form"><form class="search-form" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="fas fa-search"></i>  </button>
		</form></div>',
		esc_url( home_url('/')),
		esc_attr( get_search_query()),
		esc_html__('Search','medidove')
	);

    return $form;
  }
  add_filter( 'get_search_form','medidove_search_filter_form');
}

function _html_markup_render( $markup ){
	return $markup;
}

add_action('admin_enqueue_scripts', 'medidove_admin_custom_scripts');
function medidove_admin_custom_scripts(){
	wp_enqueue_media();
	wp_register_script('medidove-admin-custom', get_template_directory_uri().'/inc/js/admin_custom.js', array('jquery'), '', true);
	wp_enqueue_script('medidove-admin-custom');

}

