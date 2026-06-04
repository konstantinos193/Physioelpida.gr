<?php 
class BdevsServicePost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
		add_filter( 'template_include', array( $this, 'service_template_include' ) );
	}
	
	public function service_template_include( $template ) {
		if ( is_singular( 'bdevs-service' ) ) {
			return $this->get_template( 'single-bdevs-service.php');
		}
		return $template;
	}
	
	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = BDEVS_TOOLKIT_DIR . '/template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}
	
	
	public function register_custom_post_type() {

		$medidove_sv_name = get_theme_mod('medidove_sv_name','Services'); 
		$medidove_sv_slug = get_theme_mod('medidove_sv_slug','service'); 

		$labels = array(
			'name'               => __( $medidove_sv_name, 'Post Type General Name', 'bdevs-toolkit'),
			'singular_name'      => __( 'Service', 'Post Type Singular Name', 'bdevs-toolkit'),
			'menu_name'          => __( 'Service', 'bdevs-toolkit'),
			'parent_item_colon'  => __( 'Parent Service', 'bdevs-toolkit'),
			'all_items'          => __( 'All  Service', 'bdevs-toolkit'),
			'view_item'          => __( 'View  Service', 'bdevs-toolkit'),
			'add_new_item'       => __( 'Add New  Service', 'bdevs-toolkit'),
			'add_new'            => __( 'Add New  Service', 'bdevs-toolkit'),
			'edit_item'          => __( 'Edit  Service', 'bdevs-toolkit'),
			'update_item'        => __( 'Update  Service', 'bdevs-toolkit'),
			'search_items'       => __( 'Search  Service', 'bdevs-toolkit'),
			'not_found'          => __( 'Not found', 'bdevs-toolkit'),
			'not_found_in_trash' => __( 'Not found in Trash', 'bdevs-toolkit'),
		);

		$args   = array(
			'label'               => __( 'Service', 'bdevs-toolkit'),
			'description'         => __( 'Create and manage all bdevs Service', 'bdevs-toolkit'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => $medidove_sv_slug, 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-smiley',
		);

		register_post_type( 'bdevs-service', $args );
	}
	
	public function create_cat() {

		$name = 'Category';

		$labels = array(
			'name'              => esc_html($name),
			'singular_name'     => esc_html($name),
			'search_items'      => sprintf(esc_html__( 'Search %s:', 'bdevs-toolkit' ),$name),
			'all_items'      	=> sprintf(esc_html__( 'All %s:', 'bdevs-toolkit' ),$name),
			'parent_item'      	=> sprintf(esc_html__( 'Parent  %s:', 'bdevs-toolkit' ),$name),
			'parent_item_colon' => sprintf(esc_html__( 'Parent  %s:', 'bdevs-toolkit' ),$name),
			'edit_item'     	=> sprintf(esc_html__( 'Edit  %s:', 'bdevs-toolkit' ),$name),
			'update_item'     	=> sprintf(esc_html__( 'Update %s:', 'bdevs-toolkit' ),$name),
			'add_new_item'      => sprintf(esc_html__( 'Add New %s:', 'bdevs-toolkit' ),$name),
			'new_item_name'     => sprintf(esc_html__( 'New  %s Name:', 'bdevs-toolkit' ),$name),
			'menu_name'      	=> esc_html($name),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'services-category' ),
		);

		register_taxonomy('service_categories','bdevs-service', $args );
	}



	
	public function add_meta(array $bdevs) {

		$bdevs[] = array(
			'id'           => 'bdevs-service',
			'title'        => esc_html__( 'Service Details Image', 'bdevs-toolkit' ),
			'object_types' => array( 'bdevs-service'),
			'fields'       => array(
				array(
			        'name' => esc_html__('Service Subtitle','bdevs-toolkit'),
			        'type' => 'text',
			        'id' => 'service_subtitle'
		      	),
		      	array(
			        'name' => esc_html__('Service Category','bdevs-toolkit'),
			        'type' => 'text',
			        'id' => 'service_cat'
		      	),	
				array(
			        'name' => esc_html__('Service Icon Image','bdevs-toolkit'),
			        'type' => 'file',
			        'id' => 'service_icon_thumb_id'
		      	),				
		      	array(
			        'name' => esc_html__('Service Image','bdevs-toolkit'),
			        'type' => 'file',
			        'id' => 'service_thumb'
		      	),				
		      	array(
			        'name' => esc_html__('Extra Title','bdevs-toolkit'),
			        'type' => 'text',
			        'id' => 'extra_title'
		      	),				
		      	array(
			        'name' => esc_html__('Extra Icon','bdevs-toolkit'),
			        'type' => 'file',
			        'id' => 'extra_icon'
		      	),
			)
		);
		
		return $bdevs;
	}

}



new BdevsServicePost();