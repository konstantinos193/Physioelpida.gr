<?php 
class BdevsRoutinePost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_admin_init', array( $this, 'add_educational_meta' ) );
	}
	
	
	public function register_custom_post_type() {

		$labels = array(
			'name'               => __( 'Routines', 'Post Type General Name', 'bdevs-toolkit'),
			'singular_name'      => __( 'Routine', 'Post Type Singular Name', 'bdevs-toolkit'),
			'menu_name'          => __( 'Routines', 'bdevs-toolkit'),
			'parent_item_colon'  => __( 'Parent Routine', 'bdevs-toolkit'),
			'all_items'          => __( 'All  Routines', 'bdevs-toolkit'),
			'view_item'          => __( 'View  Routine', 'bdevs-toolkit'),
			'add_new_item'       => __( 'Add New  Routine', 'bdevs-toolkit'),
			'add_new'            => __( 'Add New  Routine', 'bdevs-toolkit'),
			'edit_item'          => __( 'Edit  Routine', 'bdevs-toolkit'),
			'update_item'        => __( 'Update  Routine', 'bdevs-toolkit'),
			'search_items'       => __( 'Search  Routine', 'bdevs-toolkit'),
			'not_found'          => __( 'Not found', 'bdevs-toolkit'),
			'not_found_in_trash' => __( 'Not found in Trash', 'bdevs-toolkit'),
		);

		$args   = array(
			'label'               => __( 'Routine', 'bdevs-toolkit'),
			'description'         => __( 'Create and manage all BDevs Routine', 'bdevs-toolkit'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => 'routine', 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-id-alt',
		);

		register_post_type( 'bdevs-routine', $args );
	}
	
	public function create_cat() {

		$name = 'Routine';

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
			'rewrite'           => array( 'slug' => 'routine_cat' ),
		);

		register_taxonomy('routine_categories','bdevs-routine', $args );
	}


	public function add_educational_meta() {

		$education = new_cmb2_box( array(
			'title'   => 'DR Routine Section',
			'id'    => 'dr-routine-section',
			'object_types'  => array('bdevs-routine')
		));
		

		$group_field_id = $education->add_field( array(
			'id'          => 'rutine_info_repeat_group',
			'type'        => 'group',
			'description' => __( 'Routine in details', 'bdevs-toolkit' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
			'group_title'   => __( 'Routine Extra Info', 'bdevs-toolkit' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'bdevs-toolkit' ),
			'remove_button' => __( 'Remove Entry', 'bdevs-toolkit' ),
			'sortable'      => true, // beta
			'closed'     => false, // true to have the groups closed by default
		),
		) );

		// your name
		$education->add_group_field( $group_field_id, array(
			'name' => esc_html__('Dr. Name','bdevs-toolkit'),
			'type' => 'text',
			'id' => 'dr_name'
		) );

		// your picture
		$education->add_group_field( $group_field_id, array(
			'name' => esc_html__('Time Period','bdevs-toolkit'),
			'type' => 'text',
			'id' => 'dr_time'
		) );

	}


}

new BdevsRoutinePost();
