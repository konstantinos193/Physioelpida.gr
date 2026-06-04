<?php 
class BdevsPriceTablePost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
	}
	

	
	
	public function register_custom_post_type() {

		$labels = array(
			'name'               => __( 'Price Tables', 'Post Type General Name', 'bdevs-toolkit'),
			'singular_name'      => __( 'Price Tables', 'Post Type Singular Name', 'bdevs-toolkit'),
			'menu_name'          => __( 'Price Tables', 'bdevs-toolkit'),
			'parent_item_colon'  => __( 'Parent Price Table', 'bdevs-toolkit'),
			'all_items'          => __( 'All  Price Tables', 'bdevs-toolkit'),
			'view_item'          => __( 'View  Price Table', 'bdevs-toolkit'),
			'add_new_item'       => __( 'Add New  Price Table', 'bdevs-toolkit'),
			'add_new'            => __( 'Add New  Price Table', 'bdevs-toolkit'),
			'edit_item'          => __( 'Edit  Price Table', 'bdevs-toolkit'),
			'update_item'        => __( 'Update  Price Table', 'bdevs-toolkit'),
			'search_items'       => __( 'Search  Price Table', 'bdevs-toolkit'),
			'not_found'          => __( 'Not found', 'bdevs-toolkit'),
			'not_found_in_trash' => __( 'Not found in Trash', 'bdevs-toolkit'),
		);

		$args   = array(
			'label'               => __( 'Price Tables', 'bdevs-toolkit'),
			'description'         => __( 'Create and manage all bdevs biography', 'bdevs-toolkit'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => 'price-tables', 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-grid-view',
		);

		register_post_type( 'bdevs-pricetables', $args );
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
			'rewrite'           => array( 'slug' => 'price-table-cat' ),
		);

		register_taxonomy('price_tables_categories','bdevs-pricetables', $args );
	}


	public function add_meta(array $bdevs) {
		$prefix = 'price_table_';
		$bdevs[] = array(
			'id'           => 'bdevs-pricetable-sec',
			'title'        => esc_html__( 'Pricing Info Detials', 'bdevs-toolkit' ),
			'object_types' => array( 'bdevs-pricetables'),
			'fields'       => array(
				
		      	array(
			        'name' => esc_html__('Price','bdevs-toolkit'),
			        'type' => 'text',
			        'id'   => $prefix . 'price'
		      	),				
		      	array(
			        'name' => esc_html__('Info Text','bdevs-toolkit'),
			        'type' => 'textarea',
			        'id'   => $prefix . 'info_text'
		      	),				
		      	array(
			        'name' => esc_html__('Button Url','bdevs-toolkit'),
			        'type' => 'text',
			        'id'   => $prefix . 'link_url'
		      	),
			)
		);
		
		return $bdevs;
	}

}

new BdevsPriceTablePost();