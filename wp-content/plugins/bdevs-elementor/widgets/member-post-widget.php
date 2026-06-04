<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsMemberPost extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-member-post';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Member Posts', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-content';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bdevs-elementor' ];
	}

	public function get_keywords() {
		return [ 'member-post' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_html__( 'Heading Section', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'label_block' => true,
				'default'     => __( 'Its Sub Title', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type section title here', 'bdevs-elementor' ),
				'label_block' => true,
				'default'     => __( 'Its Title', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Make Appointment', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'appointment_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_service_post',
			[
				'label' => esc_html__( 'Member Post', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'member-style-1'  => esc_html__( 'Member Style 1', 'bdevs-elementor' ),
					'member-style-2' => esc_html__( 'Member Style 2', 'bdevs-elementor' ),
					'member-style-3' => esc_html__( 'Member Style 3', 'bdevs-elementor' ),
					'member-style-4' => esc_html__( 'Member Style 4', 'bdevs-elementor' ),
					'member-style-5' => esc_html__( 'Member Style 5', 'bdevs-elementor' ),
					'member-style-6' => esc_html__( 'Member Style 6', 'bdevs-elementor' ),
				],
				'default'   => 'member-style-1',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'ID'  => esc_html__( 'Post ID', 'bdevs-elementor' ),
					'title'  => esc_html__( 'Title', 'bdevs-elementor' ),
					'date' => esc_html__( 'Date', 'bdevs-elementor' ),
					'modified' => esc_html__( 'Last Modified Date', 'bdevs-elementor' ),
					'rand' => esc_html__( 'Random Order', 'bdevs-elementor' ),
					'comment_count' => esc_html__( 'Popular Post', 'bdevs-elementor' ),
				],
				'default'   => 'ID',
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'desc',
			]
		);		

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__( '3', 'bdevs-elementor' ),
					'4'  => esc_html__( '4', 'bdevs-elementor' ),
					'6' => esc_html__( '6', 'bdevs-elementor' ),
					'9' => esc_html__( '9', 'bdevs-elementor' ),
					'12' => esc_html__( '12', 'bdevs-elementor' ),
					'15' => esc_html__( '15', 'bdevs-elementor' ),
					'-1' => esc_html__( 'All', 'bdevs-elementor' ),
				],
				'default'   => '3',
			]
		);

		$member_cats = get_terms('member_categories', array('order' => 'DESC'));
		$cat_array = array( '' => 'Select One' );
		foreach($member_cats as $cat) {
		    $cat_array[$cat->slug] = $cat->name;
		}


		$this->add_control(
			'member_cat',
			[
				'label'     => esc_html__( 'Category Slug', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $cat_array,
				'default'   => '',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'eicon-h-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);	

		$this->end_controls_section();

	}

	public function render() {
	$settings  = $this->get_settings_for_display(); 
	extract($settings);

	$target = $appointment_link['is_external'] ? ' target="_blank"' : '';
	$nofollow = $appointment_link['nofollow'] ? ' rel="nofollow"' : '';

	$this->add_render_attribute(
		[
			'appointment_link' => [
				'class' => [
					'btn btn-icon ml-0',
				],
				'href'   => $settings['appointment_link']['url'] ? esc_url($settings['appointment_link']['url']) : '#',
				'target' => $settings['appointment_link']['is_external'] ? '_blank' : '_self'
			]
		], '', '', true
	);

	if( $chose_style == 'member-style-1' ): ?>
        <section class="team-area">
            <div class="container">
                <div class="row">
				<?php 
                    if( !empty($member_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-member',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'member_categories',
							   'field' => 'slug',
							   'terms' => $member_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-member',
						    'posts_per_page'=> $number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));
                    }

				if($q->have_posts()):
					while($q->have_posts()): $q->the_post(); 
						$designation = function_exists('get_field') ? get_field( 'member_designation' ) : NULL;
					?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="team-box text-center mb-60">
                            <div class="team-thumb thumb-circle mb-45 pos-rel">
                                <?php the_post_thumbnail('medidove-team-circle'); ?>
                                <a class="team-link" href="<?php the_permalink(); ?>"><?php print esc_html_e('+', 'bdevs-elementor'); ?></a>
                            </div>
                            <div class="team-content">
                                <h3><?php the_title(); ?></h3>
                                <h6><?php echo wp_kses_post( $designation ); ?></h6>
                            </div>
                        </div>
                    </div>
					<?php 
					endwhile; 
					wp_reset_postdata(); 
				endif; 
				?>
                </div>
            </div>
        </section>
	<?php elseif( $chose_style == 'member-style-2' ): ?>
        <section class="team-area">
            <div class="container">
                <div class="row team-activation">
                	<?php 
                    if( !empty($member_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-member',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'member_categories',
							   'field' => 'slug',
							   'terms' => $member_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-member',
						    'posts_per_page'=> $number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));
                    }
					if($q->have_posts()):
						while($q->have_posts()): $q->the_post(); 
							$designation = function_exists('get_field') ? get_field( 'member_designation' ) : NULL;
						?>
		                    <div class="col-xl-12">
		                        <div class="team-box pos-rel mb-50">
		                            <div class="team-thumb">
		                            	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		                            </div>
		                            <div class="team-author-info">
		                                <span><?php echo wp_kses_post( $designation ); ?></span>
		                                <h6><?php the_title(); ?></h6>
		                            </div>
		                        </div>
		                    </div>
						<?php 
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>

    	<?php elseif( $chose_style == 'member-style-3' ): ?>
        <section class="team-area">
            <div class="container">
                <div class="row">
                	<?php 
                    if( !empty($member_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-member',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'member_categories',
							   'field' => 'slug',
							   'terms' => $member_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-member',
						    'posts_per_page'=> $number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));
                    }
					if($q->have_posts()):
						while($q->have_posts()): $q->the_post(); 
							$designation = function_exists('get_field') ? get_field( 'member_designation' ) : NULL;
							$facebook = function_exists('get_field') ? get_field( 'profile_fb_url' ) : NULL;
							$twitter = function_exists('get_field') ? get_field( 'profile_twitter_url' ) : NULL;
							$instagram = function_exists('get_field') ? get_field( 'profile_instagram_url' ) : NULL;
							$youtube = function_exists('get_field') ? get_field( 'profile_youtube_url' ) : NULL;
							$linkedin = function_exists('get_field') ? get_field( 'profile_linkedin_url' ) : NULL;
						?>
	                    <div class="col-xl-4 col-lg-4 col-md-6">
	                        <div class="team-wrapper team-box-2 text-center mb-30">
	                            <div class="team-thumb">
	                                <?php the_post_thumbnail(); ?>
	                            </div>
	                            <div class="team-member-info mt-35 mb-20">
	                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                                <h6 class="f-500 text-up-case letter-spacing pink-color"><?php print wp_kses_post( $designation ); ?></h6>
	                            </div>
	                            <div class="team-social-profile mb-15">
	                                <ul>
		                                	<?php if (!empty($facebook)): ?>
		                                    <li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
		                                	<?php endif; ?>

		                                	<?php if (!empty($twitter)): ?>
		                                    <li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($instagram)): ?>
		                                    <li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($youtube)): ?>
		                                    <li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($linkedin)): ?>
		                                    <li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
		                                    <?php endif; ?>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
						<?php 
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>
    <?php elseif( $chose_style == 'member-style-4' ): ?>
        
        <!-- team-area start -->
        <section class="team-area">
            <div class="container">
                <div class="row">
                	<?php 
                    if( !empty($member_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-member',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'member_categories',
							   'field' => 'slug',
							   'terms' => $member_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-member',
						    'posts_per_page'=> $number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));
                    }
					if($q->have_posts()):
						$counter = 1;
						while($q->have_posts()): $q->the_post();
							$designation = function_exists('get_field') ? get_field( 'member_designation' ) : NULL;
							$facebook = function_exists('get_field') ? get_field( 'profile_fb_url' ) : NULL;
							$twitter = function_exists('get_field') ? get_field( 'profile_twitter_url' ) : NULL;
							$instagram = function_exists('get_field') ? get_field( 'profile_instagram_url' ) : NULL;
							$youtube = function_exists('get_field') ? get_field( 'profile_youtube_url' ) : NULL;
							$linkedin = function_exists('get_field') ? get_field( 'profile_linkedin_url' ) : NULL;
						?>
		                    <div class="col-xl-3 col-lg-4 col-md-6">
		                        <div class="team-box text-center mb-60">
		                            <div class="team-thumb h4team-thumb mb-25 pos-rel">
		                                 <?php the_post_thumbnail(); ?>
		                                <a class="team-link" href="<?php the_permalink(); ?>">0<?php print wp_kses_post( $counter ); ?></a>
		                            </div>
		                            <div class="team-content h4team-content mb-15">
			                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		                                <h6><?php print wp_kses_post( $designation ); ?></h6>
		                            </div>
		                            <div class="h4team-social">
		                                <ul class="list-inline">
		                                	<?php if (!empty($facebook)): ?>
		                                    <li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
		                                	<?php endif; ?>

		                                	<?php if (!empty($twitter)): ?>
		                                    <li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($instagram)): ?>
		                                    <li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($youtube)): ?>
		                                    <li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($linkedin)): ?>
		                                    <li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
		                                    <?php endif; ?>
		                                </ul>
		                            </div>
		                        </div>
		                    </div>
						<?php 
						$counter++;
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>
        <!-- team-area end -->

    <?php elseif( $chose_style == 'member-style-5' ): ?>    

        <section class="team-area">
            <div class="container">
                <div class="row">
                	<?php 
                    if( !empty($member_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-member',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'member_categories',
							   'field' => 'slug',
							   'terms' => $member_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-member',
						    'posts_per_page'=> $number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));
                    }
					if($q->have_posts()):
						while($q->have_posts()): $q->the_post(); 
							$designation = function_exists('get_field') ? get_field( 'member_designation' ) : NULL;
							$facebook = function_exists('get_field') ? get_field( 'profile_fb_url' ) : NULL;
							$twitter = function_exists('get_field') ? get_field( 'profile_twitter_url' ) : NULL;
							$instagram = function_exists('get_field') ? get_field( 'profile_instagram_url' ) : NULL;
							$youtube = function_exists('get_field') ? get_field( 'profile_youtube_url' ) : NULL;
							$linkedin = function_exists('get_field') ? get_field( 'profile_linkedin_url' ) : NULL;
						?>
	                    <div class="col-xl-3 col-lg-3 col-md-6">
	                        <div class="team-wrapper team-box-2 text-center mb-30">
	                            <div class="team-thumb">
	                                <?php the_post_thumbnail(); ?>
	                            </div>
	                            <div class="team-member-info mt-35 mb-20">
	                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                                <h6 class="f-500 text-up-case letter-spacing pink-color"><?php print wp_kses_post( $designation ); ?></h6>
	                            </div>
	                            <div class="team-social-profile mb-15">
	                                <ul>
	                                	<?php if (!empty($facebook)): ?>
	                                    <li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
	                                	<?php endif; ?>

	                                	<?php if (!empty($twitter)): ?>
	                                    <li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
	                                    <?php endif; ?>

	                                    <?php if (!empty($instagram)): ?>
	                                    <li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
	                                    <?php endif; ?>

	                                    <?php if (!empty($youtube)): ?>
	                                    <li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
	                                    <?php endif; ?>

	                                    <?php if (!empty($linkedin)): ?>
	                                    <li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
	                                    <?php endif; ?>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
						<?php 
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>

        <?php elseif( $chose_style == 'member-style-6' ): ?>
        <section class="team-area style-6">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="section-title text-center pos-rel mb-70">	
                            <div class="section-text pos-rel">
                            	<?php 
                            	if (!empty($sub_title)) : ?>
									<h5><?php echo wp_kses_post( $sub_title ); ?></h5>
								<?php 
								endif; ?>	

								<?php 
								if (!empty($title)) : ?>
									<h1><?php echo wp_kses_post( $title ); ?></h1>
								<?php 
								endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<?php 
                    if( !empty($member_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-member',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'member_categories',
							   'field' => 'slug',
							   'terms' => $member_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-member',
						    'posts_per_page'=> $number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));
                    }
					if($q->have_posts()):
						while($q->have_posts()): $q->the_post(); 
							$designation = function_exists('get_field') ? get_field( 'member_designation' ) : NULL;
							$facebook = function_exists('get_field') ? get_field( 'profile_fb_url' ) : NULL;
							$twitter = function_exists('get_field') ? get_field( 'profile_twitter_url' ) : NULL;
							$instagram = function_exists('get_field') ? get_field( 'profile_instagram_url' ) : NULL;
							$youtube = function_exists('get_field') ? get_field( 'profile_youtube_url' ) : NULL;
							$linkedin = function_exists('get_field') ? get_field( 'profile_linkedin_url' ) : NULL;
						?>
	                    <div class="col-xl-3 col-lg-3 col-md-6">
	                        <div class="single-team-item text-center mb-30">
	                            <div class="team-thumb">
	                                <?php the_post_thumbnail(); ?>
	                            </div>
	                            <div class="team-member-info mt-35 mb-20">
	                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                                <h6 class="f-500 text-up-case letter-spacing pink-color"><?php print wp_kses_post( $designation ); ?></h6>
		                            <div class="team-social-profile mb-15">
		                                <ul>
		                                	<?php if (!empty($facebook)): ?>
		                                    <li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
		                                	<?php endif; ?>

		                                	<?php if (!empty($twitter)): ?>
		                                    <li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($instagram)): ?>
		                                    <li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($youtube)): ?>
		                                    <li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
		                                    <?php endif; ?>

		                                    <?php if (!empty($linkedin)): ?>
		                                    <li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
		                                    <?php endif; ?>
		                                </ul>
		                            </div>
	                            </div>

	                        </div>
	                    </div>
						<?php 
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>    


	<?php endif; ?>

	<?php
	}

}