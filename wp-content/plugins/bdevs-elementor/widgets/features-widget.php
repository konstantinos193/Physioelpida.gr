<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsFeatures extends \Elementor\Widget_Base {

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
		return 'bdevs-features';
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
		return __( 'Features List', 'bdevs-elementor' );
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
		return 'eicon-favorite';
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
		return [ 'features' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'bdevs-elementor'),
	        'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
	        'center'        => esc_html__('Center', 'bdevs-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
	    ];

	    return $position_options;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'features_section',
			[
				'label' => esc_html__( 'Heading Section', 'bdevs-elementor' ),
			]	
		);


		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'feature-style-1'  => esc_html__( 'Feature Style 1', 'bdevs-elementor' ),
					'feature-style-2' => esc_html__( 'Feature Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'feature-style-1',
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_features',
			[
				'label' => esc_html__( 'Features', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Feature Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Feature One', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'Focus On Email Marketing', 'bdevs-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Feature Two', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'Support Content Marketing', 'bdevs-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Feature Three', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'Focus On Email Marketing', 'bdevs-elementor' ),
					],
				],
				'fields' => [	
				    [
						'name'    => 'tab_icon',
						'label'   => esc_html__( 'Feature Icon', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],				    
					[
						'name'    => 'tab_icon_bg',
						'label'   => esc_html__( 'Feature Icon BG', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],				    
					[
						'name'    => 'tab_icon_color_bg',
						'label'   => esc_html__( 'Feature Icon BG', 'bdevs-elementor' ),
						'type'    => Controls_Manager::COLOR,
						'dynamic' => [ 'active' => true ],
					],			
					[
						'name'        => 'tab_number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Feature Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],		
					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Feature Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::WYSIWYG,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Feature Content', 'bdevs-elementor' ),
						'show_label' => false,
					],
					[
						'name'       => 'tab_link_text',
						'label'      => esc_html__( 'Link Text', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Feature Content', 'bdevs-elementor' ),
						'show_label' => false,
					],
					[
						'name'        => 'tab_link',
						'label'       => esc_html__( 'Link', 'bdevs-elementor' ),
						'type'        => Controls_Manager::URL,
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'http://your-link.com',
						'default'     => [
							'url' => '#',
						],
					],
				],
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
				'default'      => 'center',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_button',
			[
				'label'     => esc_html__( 'Button', 'bdevs-elementor' ),
				'condition' => [
					'show_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Read More', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
			]
		);

		$this->end_controls_section();


	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);

		if( $chose_style == 'feature-style-1' ): ?>

			<!-- How It Works  -->
	        <section class="howitworks">
	            <div class="container">
	                <div class="row pos-rel d-flex justify-content-between">
						<?php 
						$number = 1;
						foreach ( $settings['tabs'] as $item ) :

							$this->add_render_attribute(
								[
									'feature-link' => [
										'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
										'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
									]
								], '', '', true
							); ?>

							<div class="col-lg-3 col-md-4">
		                        <div class="howit-box text-center mb-40">
		                        	<?php 
		                        	if (!empty($item['tab_icon'])) : 
										$icon_src = wp_get_attachment_image_src( $item['tab_icon']['id'], 'full' );
										$icon_url = $icon_src ? $icon_src[0] : '';
		                        		?>
		                           		<i><img src="<?php print esc_url($icon_url); ?>" alt=""></i>
									<?php 
									endif; ?>

									<?php 
									if (!empty($item['tab_title'])) : ?>
										<h3><?php echo wp_kses_post($item['tab_title']); ?></h3>
									<?php 
									endif; ?>	

									<?php 
									if (!empty($item['tab_content'])) : ?>
										<p><?php echo wp_kses_post($item['tab_content']); ?></p>
									<?php 
									endif; ?>	

									<?php 
									if($number <= 2): ?>
		                            	<img src="<?php print get_template_directory_uri(); ?>/img/icon/move-icon.png" alt="Move Icon" class="move-icon">
		                        	<?php 
		                        	endif; ?>
		                        </div>
		                    </div>
						<?php
						$number++;
						endforeach;
						?>

	                </div>
	            </div>
	        </section>
	        <!-- How It Works end -->

		<?php elseif ($chose_style == 'feature-style-2') : ?>

	        <!-- about-area start -->
	        <section class="about-area">
	            <div class="container">
	                <div class="row no-gutters">
						<?php 
						$number = 1;
						foreach ( $settings['tabs'] as $item ) :

							$this->add_render_attribute(
								[
									'feature-link' => [
										'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
										'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
									]
								], '', '', true
							); ?>
			                    <div class="col-lg-4 mb-30">
			                        <div class="h5services-wrapper" style="background-color: <?php print esc_attr( $item['tab_icon_color_bg']); ?>">
			                            
				                        <?php 
			                        	if (!empty($item['tab_icon_bg'])) : 
											$icon_bg_src = wp_get_attachment_image_src( $item['tab_icon_bg']['id'], 'full' );
											$icon_bg_url = $icon_bg_src ? $icon_bg_src[0] : '';
			                        		?>
			                           		<i class="h5sicon-bg"><img src="<?php print esc_url($icon_bg_url); ?>" alt="bg icon"></i>
										<?php 
										endif; ?>

			                            <div class="h5services-content">
					                        <?php 
				                        	if (!empty($item['tab_icon'])) : 
												$icon_src = wp_get_attachment_image_src( $item['tab_icon']['id'], 'full' );
												$icon_url = $icon_src ? $icon_src[0] : '';
				                        		?>
				                           		<i class="h5services-icon"><img src="<?php print esc_url($icon_url); ?>" alt="Icon"></i>
											<?php 
											endif; ?>
			                        
					                        <?php 
											if (!empty($item['tab_title'])) : ?>
												<h3 class="white-color h5services-title"><?php echo wp_kses_post($item['tab_title']); ?></h3>
											<?php 
											endif; ?>	

											<?php 
											if (!empty($item['tab_content'])) : ?>
												<p><?php echo wp_kses_post($item['tab_content']); ?></p>
											<?php 
											endif; ?>
											
											<?php 
											if( $number <= 2): ?>
			                                	<a <?php echo $this->get_render_attribute_string( 'feature-link' ); ?> class="green-color text-uppercase f-500"><span class="plus">+</span><span class="link"><?php echo wp_kses_post($item['tab_link_text']); ?></span></a>
			                            	<?php 
			                            	endif; ?>
			                            </div>
			                        </div>
			                    </div>
			            <?php
						$number++;
						endforeach;
						?>    
	                </div>
	            </div>
	        </section>
	        <!-- about-area end -->

		<?php endif; ?>	

	<?php
	}

}