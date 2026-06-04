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
class BdevsServicePost extends \Elementor\Widget_Base {

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
		return 'bdevs-service-post';
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
		return __( 'Post Services', 'bdevs-elementor' );
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
		return [ 'service-post' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Section Heading', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your prefix Heading', 'bdevs-elementor' ),
				'default'     => __( 'Awesome Features', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'back_heading',
			[
				'label'       => __( 'Back Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => 'service_icon_border',
				],
			]
		);

		$this->add_control(
			'sec_text',
			[
				'label'       => __( 'Heading Info', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your info text', 'bdevs-elementor' ),
				'default'     => __( 'It is service description', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => 'service_icon_no_bg',
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'bdevs-elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'bdevs-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [
					'chose_style' => 'service_thumb',
				],
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'more services ', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => 'service_thumb',
				],
			]
		);

		$this->add_control(
			'overlay_image',
			[
				'label'   => esc_html__( 'Overlay Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Overlay Image', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['service_thumb_bg']
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_service_post',
			[
				'label' => esc_html__( 'Section Service Post', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'service_icon'  => esc_html__( 'Service Icon', 'bdevs-elementor' ),
					'service_icon_no_bg' => esc_html__( 'Service Icon No BG', 'bdevs-elementor' ),
					'service_thumb' => esc_html__( 'Service Thumb', 'bdevs-elementor' ),
					'service_thumb_bg' => esc_html__( 'Service Thumb BG', 'bdevs-elementor' ),
					'service_thumb_doctor' => esc_html__( 'Service Thumb Doctor', 'bdevs-elementor' ),
					'service_icon_border' => esc_html__( 'Service Icon Border', 'bdevs-elementor' ),
				],
				'default'   => 'service_icon',
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__( '3', 'bdevs-elementor' ),
					'6' => esc_html__( '6', 'bdevs-elementor' ),
					'9' => esc_html__( '9', 'bdevs-elementor' ),
					'12' => esc_html__( '12', 'bdevs-elementor' ),
					'15' => esc_html__( '15', 'bdevs-elementor' ),
					'-1' => esc_html__( 'All', 'bdevs-elementor' ),
				],
				'default'   => '3',
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
			'post_order',
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

		$service_cats = get_terms('service_categories', array('order' => 'DESC'));
		$cat_array = array( '' => 'Select One' );
		foreach($service_cats as $cat) {
		    $cat_array[$cat->slug] = $cat->name;
		}


		$this->add_control(
			'service_cat',
			[
				'label'     => esc_html__( 'Category Slug', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $cat_array,
				'default'   => '',
			]
		);

		$this->add_control(
			'post_contnet_alignment',
			[
				'label'     => esc_html__( 'Content Alignment', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'text-left'  => esc_html__( 'Left', 'bdevs-elementor' ),
					'text-center' => esc_html__( 'Center', 'bdevs-elementor' ),
					'text-right' => esc_html__( 'Right', 'bdevs-elementor' ),
				],
				'default'   => 'text-left',
			]
		);

		$this->add_control(
			'service_link_text',
			[
				'label'       => esc_html__( 'Service Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More ', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
			]
		);		

		$this->add_control(
			'service_icon_name',
			[
				'label'       => esc_html__( 'Service btn Icon Name', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'fas fa-angle-double-right', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'icon name here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'service_btn_on',
			[
				'label'   => esc_html__( 'Service BTN Switch', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'service_icon_on',
			[
				'label'   => esc_html__( 'Service icon Switch', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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

		$this->add_control(
			'show_service_link',
			[
				'label'   => esc_html__( 'Show Service Link', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_sub_heading',
			[
				'label'   => esc_html__( 'Show Sub Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_heading',
			[
				'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_back_heading',
			[
				'label'   => esc_html__( 'Show Back Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'section_title_icon',
			[
				'label'   => esc_html__( 'Section Title Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->add_control(
			'section_title_line',
			[
				'label'   => esc_html__( 'Section Title Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		extract( $settings );
		$order = $settings['post_order'];
		$post_number = $settings['post_number'];
		$chose_style = $settings['chose_style'];


		$this->add_render_attribute(
			[
				'link' => [
					'class' => [
						'btn btn-icon ml-0',
					],
					'href'   => !empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#',
					'target' => !empty($settings['link']['is_external']) ? '_blank' : '_self'
				]
			], '', '', true
		);

		$text_alignment = !empty( $settings['post_contnet_alignment'] ) ? $settings['post_contnet_alignment'] : '';

		?>

		<?php if( $chose_style == 'service_icon' ): ?>
        <!-- services-area start -->
        <section class="servcies-area">
            <div class="container">
                <div class="row">
					<?php 
                    if( !empty($service_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-service',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'service_categories',
							   'field' => 'slug',
							   'terms' => $service_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-service',
						    'posts_per_page'=> $post_number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));

                    }


					if($q->have_posts()):
						$number = 0;
						while($q->have_posts()): $q->the_post(); 
						$number++;
						$icon_url = function_exists('get_field') ? get_field( 'service_icon_thumb_id' ) : NULL;
						?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-box <?php print esc_attr( $text_alignment ); ?> mb-30">
                            <div class="service-thumb">
                                <img src="<?php print esc_url($icon_url['url']); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="service-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php print wp_trim_words(get_the_content(), 16, ''); ?></p>

                                <?php if ( $settings['service_btn_on'] ) : ?>
                                <a class="service-link" href="<?php the_permalink(); ?>">
                                	<?php echo wp_kses_post($settings['service_link_text']); ?>
                                	<?php if ( $settings['service_icon_on'] ) : ?>
                                	<i class="<?php echo wp_kses_post($settings['service_icon_name']); ?>"></i>
                                	<?php endif; ?>	
                                </a>
                                <?php endif; ?>	

                            </div>
                        </div>
                    </div>
					<?php endwhile; 
					wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>
        <!-- services-area end -->
        <?php elseif( $chose_style == 'service_icon_no_bg' ): ?>
        <!-- services-area start -->
        <section class="servcies-area">
            <div class="container">
                <div class="row">
					<?php 
                    if( !empty($service_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-service',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'service_categories',
							   'field' => 'slug',
							   'terms' => $service_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-service',
						    'posts_per_page'=> $post_number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));

                    }


					if($q->have_posts()):
						$number = 0;
						while($q->have_posts()): $q->the_post(); 
						$number++;
						$icon_url = function_exists('get_field') ? get_field( 'service_icon_thumb_id' ) : NULL;
						?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-box service-box-border <?php print esc_attr( $text_alignment ); ?> mb-30">
                            <div class="service-thumb">
                                <img src="<?php print esc_url($icon_url['url']); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="service-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php print wp_trim_words(get_the_content(), 16, ''); ?></p>

                                <?php if ( $settings['service_btn_on'] ) : ?>
                                <a class="service-link" href="<?php the_permalink(); ?>">
                                	<?php echo wp_kses_post($settings['service_link_text']); ?>
                                	<?php if ( $settings['service_icon_on'] ) : ?>
                                	<i class="<?php echo wp_kses_post($settings['service_icon_name']); ?>"></i>
                                	<?php endif; ?>	
                                </a>
                                <?php endif; ?>	
                            </div>
                        </div>
                    </div>
					<?php endwhile; 
					wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>
        <!-- services-area end -->
        <?php elseif( $chose_style == 'service_thumb' ): ?>
        <!-- services-area start -->
        <section class="servcies-area">
            <div class="container">
                <div class="row">
				    <?php 

                    if( !empty($service_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-service',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'service_categories',
							   'field' => 'slug',
							   'terms' => $service_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-service',
						    'posts_per_page'=> $post_number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));

                    }

					if($q->have_posts()):
						$number = 0;
						while($q->have_posts()): $q->the_post(); 
						$number++;
						$icon_url = function_exists('get_field') ? get_field( 'service_icon_thumb_id' ) : NULL;
					?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="service-box-3 mb-30 <?php print esc_attr( $text_alignment ); ?>">
                            <div class="service-thumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            
                            <div class="service-content-box">
                                <div class="service-content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php print wp_trim_words(get_the_content(), 16, ''); ?></p>
                                </div>

                                <?php if ( $settings['service_btn_on'] ) : ?>
                                <a href="<?php the_permalink(); ?>" class="service-link">
                                	<?php echo wp_kses_post($settings['service_link_text']); ?>
                                	<?php if ( $settings['service_icon_on'] ) : ?>
                                	 <i class="<?php echo wp_kses_post($settings['service_icon_name']); ?>"></i>
                                	 <?php endif; ?>	
                                </a>
                                <?php endif; ?>	

                            </div>
                        </div>
                    </div>
                    <?php endwhile; 
					wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>
        <!-- services-area end -->

        <?php elseif( $chose_style == 'service_thumb_bg' ): ?>

	        <!-- services-area start -->
	        <section class="services-area pos-rel pb-160">
	            <span class="h4services-bg">
                    <?php 
				   	if ( '' !== $settings['overlay_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $settings['overlay_image']['id'], 'full' );
						$overlay_image = $image_src ? $image_src[0] : ''; 
				   		?>
					   <img src="<?php print esc_url($overlay_image); ?>" alt="Overlay Image">
					<?php 
					endif; ?>
	            </span>
	            <div class="container">
	                <div class="row h4service-active">
					    <?php 
		                    if( !empty($service_cat)  ){
								$q = new \WP_Query(array(
			                    	'posts_per_page' => $post_number,
			                        'post_type' => 'bdevs-service',
						        	'orderby' 		=> 'menu_order '.$orderby, 
						        	'order'         => $order,
								   	'tax_query' => array(
									  array(
									   'taxonomy' => 'service_categories',
									   'field' => 'slug',
									   'terms' => $service_cat
									  )
									)
			                    ));
		                    }
		                    else{
								$q = new \WP_Query(array(
									'post_type'     => 'bdevs-service',
								    'posts_per_page'=> $post_number,
								    'orderby' 		=> 'menu_order '.$orderby,
								   	'order'			=> $order,
								));

		                    }

						if($q->have_posts()):
							$number = 0;
							while($q->have_posts()): $q->the_post(); 
							$number++;
							$icon_url = function_exists('get_field') ? get_field( 'service_icon_thumb_id' ) : NULL;
						?>
		                    <div class="col-xl-4 col-lg-6 col-md-6">
		                        <div class="h4service-box white-bg mb-30 <?php print esc_attr( $text_alignment ); ?>">
		                            <div class="service-thumb pos-rel mb-0">
		                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		                                <?php 
				                            $cats = get_the_terms(get_the_ID(), 'service_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                 	$term_link = get_term_link( $cat );

				                                    if( $count <= 1){

				                                    }else{
				                                    	break;
				                                    }
				                                    ?>
				                                    <a class="h4services-tag green-bg white-color text-uppercase f-700" href="<?php print esc_url( $term_link ); ?>"><?php print esc_html($cat->slug ); ?></a>
													<?php 
				                                    $count++;
				                                }
				                            }
				                        ?>
		                                
		                            </div>
		                            <div class="service-content h4services-content">
                						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                						<p><?php print wp_trim_words(get_the_content(), 16, ''); ?></p>
				                        <?php 
				                        if ( $settings['service_btn_on'] ) : ?>
			                                <a href="<?php the_permalink(); ?>" class="service-link">
			                                	<?php echo wp_kses_post($settings['service_link_text']); ?>
			                                	<?php 
			                                	if ( $settings['service_icon_on'] ) : ?>
			                                		<i class="<?php echo wp_kses_post($settings['service_icon_name']); ?>"></i>
			                                	<?php 
			                                	endif; ?>	
			                                </a>
		                                <?php 
		                            	endif; ?>	
		                            </div>
		                        </div>
		                    </div>
	                    <?php endwhile; 
						wp_reset_postdata(); 
						endif; 
						?>
	                </div>
	            </div>
	        </section>
	        <!-- services-area end -->
	    <?php elseif( $chose_style == 'service_thumb_doctor' ): ?>      
        <!-- services-area start -->
        <section class="services-area pos-rel">
            <div class="container">
                <div class="row h4service-active h5service-active">
                   
	                   	<?php 
		                    if( !empty($service_cat)  ){
								$q = new \WP_Query(array(
			                    	'posts_per_page' => $post_number,
			                        'post_type' => 'bdevs-service',
						        	'orderby' 		=> 'menu_order '.$orderby, 
						        	'order'         => $order,
								   	'tax_query' => array(
									  array(
									   'taxonomy' => 'service_categories',
									   'field' => 'slug',
									   'terms' => $service_cat
									  )
									)
			                    ));
		                    }
		                    else{
								$q = new \WP_Query(array(
									'post_type'     => 'bdevs-service',
								    'posts_per_page'=> $post_number,
								    'orderby' 		=> 'menu_order '.$orderby,
								   	'order'			=> $order,
								));

		                    }


						if($q->have_posts()):
							$number = 0;
							while($q->have_posts()): $q->the_post(); 
							$number++;
							$icon_url = function_exists('get_field') ? get_field( 'service_icon_thumb_id' ) : NULL;
							$extra_icon_url = function_exists('get_field') ? get_field( 'extra_icon' ) : NULL;
							$extra_title = function_exists('get_field') ? get_field( 'extra_title' ) : NULL;
						?>

		                    <div class="col-xl-4 col-lg-6 col-md-6">
		                        <div class="h4service-box white-bg mb-30 <?php print esc_attr( $text_alignment ); ?>">
		                            <div class="service-thumb pos-rel mb-0">
		                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		                                <?php 
				                            $cats = get_the_terms(get_the_ID(), 'service_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                 	$term_link = get_term_link( $cat );

				                                    if( $count <= 1){

				                                    }else{
				                                    	break;
				                                    }
				                                    ?>
				                                    <a class="h4services-tag green-bg white-color text-uppercase f-700" href="<?php print esc_url( $term_link ); ?>"><?php print esc_html($cat->slug); ?></a>
													<?php 
				                                    $count++;
				                                }
				                            }
				                        ?>
		                            </div>
		                            <div class="service-content h4services-content h6services-content">
		                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		                                <p class="mb-20"><?php print wp_trim_words(get_the_content(), 16, ''); ?></p>
		                                <div class="h5services-bottom">
		                                    <span><i><img src="<?php print esc_url( $extra_icon_url['url'] ); ?>" alt="icon"></i><span class="f-500"><?php print wp_kses_post( $extra_title ); ?></span></span>
		                                </div>
		                            </div>
		                        </div>
		                    </div>

	                    <?php endwhile; 
						wp_reset_postdata(); 
						endif; 
						?>

                </div>
            </div>
        </section>
        <!-- services-area end -->
        <?php 
	    elseif( $chose_style == 'service_icon_border' ): ?>  

        <!-- services-area start -->
        <section class="servcies-area">
            <div class="container">
                <div class="row">
					<?php 
                    if( !empty($service_cat)  ){
						$q = new \WP_Query(array(
	                    	'posts_per_page' => $post_number,
	                        'post_type' => 'bdevs-service',
				        	'orderby' 		=> 'menu_order '.$orderby, 
				        	'order'         => $order,
						   	'tax_query' => array(
							  array(
							   'taxonomy' => 'service_categories',
							   'field' => 'slug',
							   'terms' => $service_cat
							  )
							)
	                    ));
                    }
                    else{
						$q = new \WP_Query(array(
							'post_type'     => 'bdevs-service',
						    'posts_per_page'=> $post_number,
						    'orderby' 		=> 'menu_order '.$orderby,
						   	'order'			=> $order,
						));

                    }


					if($q->have_posts()):
						$number = 0;
						while($q->have_posts()): $q->the_post(); 
						$number++;
						$icon_url = function_exists('get_field') ? get_field( 'service_icon_thumb_id' ) : NULL;
						?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-box <?php print esc_attr( $text_alignment ); ?> mb-30">
                            <div class="service-thumb">
                                <img src="<?php print esc_url($icon_url['url']); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="service-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php print wp_trim_words(get_the_content(), 16, ''); ?></p>

                                <?php if ( $settings['service_btn_on'] ) : ?>
                                <a class="service-link" href="<?php the_permalink(); ?>">
                                	<?php echo wp_kses_post($settings['service_link_text']); ?>
                                	<?php if ( $settings['service_icon_on'] ) : ?>
                                	<i class="<?php echo wp_kses_post($settings['service_icon_name']); ?>"></i>
                                	<?php endif; ?>	
                                </a>
                                <?php endif; ?>	

                            </div>
                        </div>
                    </div>
					<?php endwhile; 
					wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>
        <!-- services-area end -->

		<?php endif; ?>	

	<?php
	}

}