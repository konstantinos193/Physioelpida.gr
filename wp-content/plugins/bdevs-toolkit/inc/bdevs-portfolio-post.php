<?php 
class BdevsPortfolioPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
		add_filter( 'template_include', array( $this, 'portfolio_template_include' ) );
	}
	
	public function portfolio_template_include( $template ) {
		if ( is_singular( 'bdevs-portfolio' ) ) {
			return $this->get_template( 'single-bdevs-portfolio.php');
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
		$medidove_port_name = get_theme_mod('medidove_port_name','Portfolio'); 
		$medidove_port_slug = get_theme_mod('medidove_port_slug','portfolio'); 
		$labels = array(
			'name'               => __( $medidove_port_name, 'Post Type General Name', 'bdevs-toolkit'),
			'singular_name'      => __( 'Portfolio', 'Post Type Singular Name', 'bdevs-toolkit'),
			'menu_name'          => __( 'Portfolio', 'bdevs-toolkit'),
			'parent_item_colon'  => __( 'Parent portfolio', 'bdevs-toolkit'),
			'all_items'          => __( 'All  portfolio', 'bdevs-toolkit'),
			'view_item'          => __( 'View  portfolio', 'bdevs-toolkit'),
			'add_new_item'       => __( 'Add New  portfolio', 'bdevs-toolkit'),
			'add_new'            => __( 'Add New  portfolio', 'bdevs-toolkit'),
			'edit_item'          => __( 'Edit  portfolio', 'bdevs-toolkit'),
			'update_item'        => __( 'Update  portfolio', 'bdevs-toolkit'),
			'search_items'       => __( 'Search  portfolio', 'bdevs-toolkit'),
			'not_found'          => __( 'Not found', 'bdevs-toolkit'),
			'not_found_in_trash' => __( 'Not found in Trash', 'bdevs-toolkit'),
		);

		$args   = array(
			'label'               => __( 'Portfolio', 'bdevs-toolkit'),
			'description'         => __( 'Create and manage all bdevs portfolio', 'bdevs-toolkit'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => $medidove_port_slug, 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-awards',
		);

		register_post_type( 'bdevs-portfolio', $args );
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
			'rewrite'           => array( 'slug' => 'category' ),
		);

		register_taxonomy('portfolio_categories','bdevs-portfolio', $args );
	}



	
	public function add_meta(array $bdevs) {

		$bdevs[] = array(
			'id'           => 'bdevs-portfolio',
			'title'        => esc_html__( 'Portfolio Info', 'bdevs-toolkit' ),
			'object_types' => array( 'bdevs-portfolio'),
			'fields'       => array(
				array(
		          'name' => esc_html__( 'Date', 'bdevs-toolkit'),
		          'id'   => 'portfolio_date',
		          'type' => 'text_date',
		        ),
		        array(
		          'name' => esc_html__( 'Company Name', 'bdevs-toolkit'),
		          'id'   => 'company_name',
		          'type' => 'text',
		        ),        
		        array(
		          'name' => esc_html__( 'Company Location', 'bdevs-toolkit'),
		          'id'   => 'company_location',
		          'type' => 'text',
		        ),
		        array(
		          'name' => esc_html__( 'Gallery Image', 'bdevs-toolkit'),
		          'id'   => 'project_images',
		          'type' => 'file_list',
		        ),
		        array(
		          'name' => esc_html__( 'Project URL', 'bdevs-toolkit'),
		          'id'   => 'project_link',
		          'type' => 'text',
		        ),		        
				array(
			        'name' => esc_html__('Details Image','bdevs-toolkit'),
			        'type' => 'file',
			        'id' => 'portfolio_thumb'
		      	)
			)
		);
		
		return $bdevs;
	}

}

new BdevsPortfolioPost();