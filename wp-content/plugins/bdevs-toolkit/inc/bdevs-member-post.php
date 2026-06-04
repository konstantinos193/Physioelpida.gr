<?php
 
class BdevsMemberPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
		add_filter( 'cmb2_admin_init', array( $this, 'add_educational_meta' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_social_profiles_meta' ) );
		add_filter( 'template_include', array( $this, 'member_template_include' ) );
	}
	
	public function member_template_include( $template ) {
		if ( is_singular( 'bdevs-member' ) ) {
			return $this->get_template( 'single-bdevs-member.php');
		}
		return $template;
	}
	
	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} 
		else {
			$file = BDEVS_TOOLKIT_DIR . '/template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}
	
	
	public function register_custom_post_type() {
		$medidove_mem_name = get_theme_mod('medidove_mem_name','Member'); 
		$medidove_mem_slug = get_theme_mod('medidove_mem_slug','member'); 
		$labels = array(
			'name'               => __( $medidove_mem_name, 'Post Type General Name', 'bdevs-toolkit'),
			'singular_name'      => __( 'Member', 'Post Type Singular Name', 'bdevs-toolkit'),
			'menu_name'          => __( 'Member', 'bdevs-toolkit'),
			'parent_item_colon'  => __( 'Parent member', 'bdevs-toolkit'),
			'all_items'          => __( 'All  Members', 'bdevs-toolkit'),
			'view_item'          => __( 'View  Member', 'bdevs-toolkit'),
			'add_new_item'       => __( 'Add New  member', 'bdevs-toolkit'),
			'add_new'            => __( 'Add New  member', 'bdevs-toolkit'),
			'edit_item'          => __( 'Edit  Member', 'bdevs-toolkit'),
			'update_item'        => __( 'Update  Member', 'bdevs-toolkit'),
			'search_items'       => __( 'Search  Member', 'bdevs-toolkit'),
			'not_found'          => __( 'Not found', 'bdevs-toolkit'),
			'not_found_in_trash' => __( 'Not found in Trash', 'bdevs-toolkit'),
		);

		$args   = array(
			'label'               => __( 'Member', 'bdevs-toolkit'),
			'description'         => __( 'Create and manage all bdevs member', 'bdevs-toolkit'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => $medidove_mem_slug, 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-id-alt',
		);

		register_post_type( 'bdevs-member', $args );
	}
	
	public function create_cat() {

		$name = 'Member';

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
			'rewrite'           => array( 'slug' => 'member_cat' ),
		);

		register_taxonomy('member_categories','bdevs-member', $args );
	}

	public function add_meta(array $bdevs) {

		$bdevs[] = array(
			'id'           => 'bdevs-member-section',
			'title'        => esc_html__( 'Member Details Info', 'bdevs-toolkit' ),
			'object_types' => array( 'bdevs-member'),
			'fields'       => array(
				array(
			        'name' => esc_html__('Designation','bdevs-toolkit'),
			        'type' => 'text',
			        'id' => 'member_designation'
		      	),				
		      	array(
			        'name' => esc_html__('Member Map Lat ','bdevs-toolkit'),
			        'type' => 'text',
			        'id' => 'place_lat'
		      	),		      	
		      	array(
			        'name' => esc_html__('Member Map Long ','bdevs-toolkit'),
			        'type' => 'text',
			        'id' => 'place_long'
		      	),
			)
		);
		
		return $bdevs;
	}


	public function add_educational_meta() {

		$education = new_cmb2_box( array(
			'title'   => 'Educational Section',
			'id'    => 'educational-section',
			'object_types'  => array('bdevs-member')
		));
		

		$group_field_id = $education->add_field( array(
			'id'          => 'educational_info_repeat_group',
			'type'        => 'group',
			'description' => __( 'Educational in details', 'bdevs-toolkit' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
			'group_title'   => __( 'Educational Extra Info', 'bdevs-toolkit' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'bdevs-toolkit' ),
			'remove_button' => __( 'Remove Entry', 'bdevs-toolkit' ),
			'sortable'      => true, // beta
			'closed'     => false, // true to have the groups closed by default
		),
		) );

		// name
		$education->add_group_field( $group_field_id, array(
			'name' => esc_html__('Subject Icon','bdevs-toolkit'),
			'type' => 'file',
			'id' => 'subject_icon'
		) );

		// your status
		$education->add_group_field( $group_field_id, array(
			'name' => esc_html__('Subject Name','bdevs-toolkit'),
			'type' => 'text',
			'id' => 'subject_name'
		) );

		// your picture
		$education->add_group_field( $group_field_id, array(
			'name' => esc_html__('Institute Name','bdevs-toolkit'),
			'type' => 'text',
			'id' => 'institute_name'
		) );

	}


	public function add_social_profiles_meta(array $bdevs) {

		$bdevs[] = array(
			'id'           => 'bdevs-social-profile-section',
			'title'        => esc_html__( 'Social Profiles', 'bdevs-toolkit' ),
			'object_types' => array( 'bdevs-member'),
			'fields'       => array(
		      	array(
			        'name' => esc_html__( 'Facebook Url', 'bdevs-toolkit'),
			        'id'   => 'profile_fb_url',
			        'type' => 'text_url',
			    ),
			    array(
			        'name' => esc_html__( 'Twitter Url', 'bdevs-toolkit'),
			        'id'   => 'profile_twitter_url',
			        'type' => 'text_url',
			    ),
			    array(
			        'name' => esc_html__( 'Behance Url', 'bdevs-toolkit'),
			        'id'   => 'profile_behance_url',
			        'type' => 'text_url',
			    ),
			    array(
			        'name' => esc_html__( 'Pinterest Url', 'bdevs-toolkit'),
			        'id'   => 'profile_pinterest_url',
			        'type' => 'text_url',
			    ),
			    array(
			        'name' => esc_html__( 'LinkedIn Url', 'bdevs-toolkit'),
			        'id'   => 'profile_linkedin_url',
			        'type' => 'text_url',
			    )
			)
		);
		
		return $bdevs;
	}

}

new BdevsMemberPost();
