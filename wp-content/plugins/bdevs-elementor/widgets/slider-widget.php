<?php
namespace BdevsElementor\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;

defined( 'ABSPATH' ) || die();
/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsSlider extends \Elementor\Widget_Base {

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
		return 'bdevs-slider';
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
		return __( 'Slider', 'bdves-elementor' );
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
		return 'eicon-slideshow';
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
		return [ 'bdves-elementor' ];
	}

	public function get_keywords() {
		return [ 'slides', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdves-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'bdves-elementor'),
	        'top-left'      => esc_html__('Top Left', 'bdves-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'bdves-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'bdves-elementor') ,
	        'center'        => esc_html__('Center', 'bdves-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'bdves-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'bdves-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'bdves-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'bdves-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'bdves-elementor') ,
	    ];

	    return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_sliders',
			[
				'label' => esc_html__( 'Sliders', 'bdves-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdves-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'slider_default'  => esc_html__( 'Slider Default', 'bdves-elementor' ),
					'slider_transparent' => esc_html__( 'Slider Transparent', 'bdves-elementor' ),
					'slider_content_box' => esc_html__( 'Slider Content Box', 'bdves-elementor' ),
					'slider_style_4' => esc_html__( 'Slider Style 4', 'bdves-elementor' ),
					'slider_style_5' => esc_html__( 'Slider Style 5', 'bdves-elementor' ),
					'slider_style_6' => esc_html__( 'Slider Style 6', 'bdves-elementor' ),
				],
				'default'   => 'slider_default',
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Slider Items', 'bdves-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdves-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdves-elementor' ),
						'tab_sub_titless' => esc_html__( 'dddd', 'bdves-elementor' ),
					]
				],
				'fields' => [  
                    [
                        'name' => 'field_condition',
                        'label' => __( 'Field condition', 'bdves-elementor' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                            'style_1' => __( 'Style 1', 'bdves-elementor' ),
                            'style_2' => __( 'Style 2', 'bdves-elementor' ),
                            'style_3' => __( 'Style 3', 'bdves-elementor' ),
                            'style_4' => __( 'Style 4', 'bdves-elementor' ),
                            'style_5' => __( 'Style 5', 'bdves-elementor' ),
                        ],
                        'default' => 'style_1',
                        'dynamic'     => [ 'active' => true ],      
                    ],

					[
						'name'        => 'tab_sub_title',
						'label'       => esc_html__( 'Sub Title', 'bdves-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Slide Sub Title' , 'bdves-elementor' ),
						'label_block' => true,
					],
					// [
					// 	'name'        => 'tab_sub_titless',
					// 	'label' => __( 'Icon', 'text-domain' ),
					// 	'type' => Controls_Manager::ICONS,
					// 	'default' => [
					// 		'value' => 'fas fa-star',
					// 		'library' => 'solid',
					// 	],
					// ],					
					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'bdves-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Slide Title' , 'bdves-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Image', 'bdves-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'bdves-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Slide Content', 'bdves-elementor' ),
						'show_label' => true,
					],
					[
						'name'       => 'tab_content_list',
						'label'      => esc_html__( 'Content List', 'bdves-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Content List', 'bdves-elementor' ),
						'show_label' => true,
						'condition' => [
                            'field_condition' => ['style_4'],
                        ],
					],
					[
						'name'        => 'tab_button_text', 
						'label'       => esc_html__( 'Button Text', 'bdves-elementor' ),
						'type'        => Controls_Manager::TEXT, 
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'Button Text',
						'default'    => esc_html__( 'Button Text', 'bdves-elementor' ),
					],
					[
						'name'        => 'icon_plus', 
						'label'       => esc_html__( 'Icon Name', 'bdves-elementor' ),
						'type'        => Controls_Manager::TEXT, 
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'fal fa-plus',
						'default'    => esc_html__( 'fal fa-plus', 'bdves-elementor' ),
					],
					[
						'name'        => 'tab_link', 
						'label'       => esc_html__( 'Button URL', 'bdves-elementor' ),
						'type'        => Controls_Manager::URL, 
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'http://your-link.com',
						'default'     => [
							'url' => '#',
						],
					],

					[
						'name'        => 'tab_link_right',
						'label'       => esc_html__( 'Video URL', 'bdves-elementor' ),
						'type'        => Controls_Manager::URL,
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'http://your-link.com',
						'default'     => [
							'url' => '#',
						],
					],
					[
						'name'        => 'tab_button_text2', 
						'label'       => esc_html__( 'Button Text 2', 'bdves-elementor' ),
						'type'        => Controls_Manager::TEXT, 
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'Button Text',
						'default'    => esc_html__( 'Button Text', 'bdves-elementor' ),
						'condition' => [
                            'field_condition' => ['style_4','style_5'],
                        ],
					],
					[
						'name'        => 'tab_link2', 
						'label'       => esc_html__( 'Button URL 2', 'bdves-elementor' ),
						'type'        => Controls_Manager::URL, 
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'http://your-link.com',
						'default'     => [
							'url' => '#',
						],
						'condition' => [
                            'field_condition' => ['style_4','style_5'],
                        ],
					],


				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Booking Section', 'bdves-elementor' ),
				'condition' => [
					'chose_style' => 'slider_transparent',
				],
			]
		);
		$this->add_control(
			'booking_sub_title',
			[
				'label'       => __( 'Booking Sub Heading', 'bdves-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdves-elementor' ),
				'default'     => __( 'We are here for you', 'bdves-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'booking_title',
			[
				'label'       => __( 'Booking Heading', 'bdves-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdves-elementor' ),
				'default'     => __( 'Find A Care Giver', 'bdves-elementor' ),
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label'       => __( 'Booking Shortcode', 'bdves-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter shortcode', 'bdves-elementor' ),
				'default'     => __( 'shortcode', 'bdves-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_button',
			[
				'label'     => esc_html__( 'Button', 'bdves-elementor' ),
				'condition' => [
					'show_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'icon_plus',
			[
				'label'       => esc_html__( 'Appointment Button Icon', 'bdves-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'fas fa-plus', 'bdves-elementor' ),
				'placeholder' => esc_html__( 'Fontawesome Icon Fonts', 'bdves-elementor' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdves-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Make Appointment', 'bdves-elementor' ),
				'placeholder' => esc_html__( 'Make Appointment', 'bdves-elementor' ),
			]
		);

		$this->add_control(
			'button_text_right',
			[
				'label'       => esc_html__( 'Button Right Text', 'bdves-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Our Services', 'bdves-elementor' ),
				'placeholder' => esc_html__( 'Our Services', 'bdves-elementor' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Video Icon', 'bdves-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'fas fa-play', 'bdves-elementor' ),
				'placeholder' => esc_html__( 'Fontawesome Icon Fonts', 'bdves-elementor' ),
			]
		);		
		$this->end_controls_section();

		// style tab section
		$this->start_controls_section(
		    '_section_style_content',
		    [
		        'label' => __( 'Title / Content', 'bdevselement' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'content_padding',
		    [
		        'label' => __( 'Content Padding', 'bdevselement' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
		        'name' => 'content_background',
		        'selector' => '{{WRAPPER}} .tp-el-content',
		        'exclude' => [
		            'image'
		        ]
		    ]
		);

		// Title
		$this->add_control(
		    '_heading_title',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => __( 'Title', 'bdevselement' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'title_spacing',
		    [
		        'label' => __( 'Bottom Spacing', 'bdevselement' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'title_color',
		    [
		        'label' => __( 'Text Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'title',
		        'selector' => '{{WRAPPER}} .tp-el-title',
		        'scheme' => Typography::TYPOGRAPHY_2,
		    ]
		);

		// Subtitle    
		$this->add_control(
		    '_heading_subtitle',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => __( 'Subtitle', 'bdevselement' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'subtitle_spacing',
		    [
		        'label' => __( 'Bottom Spacing', 'bdevselement' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'subtitle_color',
		    [
		        'label' => __( 'Text Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-subtitle' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'subtitle',
		        'selector' => '{{WRAPPER}} .tp-el-subtitle',
		        'scheme' => Typography::TYPOGRAPHY_3,
		    ]
		);

		// description
		$this->add_control(
		    '_content_description',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => __( 'Description', 'bdevselement' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'description_spacing',
		    [
		        'label' => __( 'Bottom Spacing', 'bdevselement' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'description_color',
		    [
		        'label' => __( 'Text Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-content p' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'description',
		        'selector' => '{{WRAPPER}} .tp-el-content p',
		        'scheme' => Typography::TYPOGRAPHY_4,
		    ]
		);
		$this->end_controls_section();

		// Button 1 style
		$this->start_controls_section(
		    '_section_style_button',
		    [
		        'label' => __( 'Button', 'bdevselement' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'button_padding',
		    [
		        'label' => __( 'Padding', 'bdevselement' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'button_typography',
		        'selector' => '{{WRAPPER}} .tp-el-btn',
		        'scheme' => Typography::TYPOGRAPHY_4,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_border',
		        'selector' => '{{WRAPPER}} .tp-el-btn',
		    ]
		);

		$this->add_control(
		    'button_border_radius',
		    [
		        'label' => __( 'Border Radius', 'bdevselement' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_box_shadow',
		        'selector' => '{{WRAPPER}} .tp-el-btn',
		    ]
		);

		$this->add_control(
		    'hr',
		    [
		        'type' => Controls_Manager::DIVIDER,
		        'style' => 'thick',
		    ]
		);

		$this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
		    '_tab_button_normal',
		    [
		        'label' => __( 'Normal', 'bdevselement' ),
		    ]
		);

		$this->add_control(
		    'button_color',
		    [
		        'label' => __( 'Text Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_bg_color',
		    [
		        'label' => __( 'Background Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		    '_tab_button_hover',
		    [
		        'label' => __( 'Hover', 'bdevselement' ),
		    ]
		);

		$this->add_control(
		    'button_hover_color',
		    [
		        'label' => __( 'Text Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_hover_bg_color',
		    [
		        'label' => __( 'Background Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_hover_border_color',
		    [
		        'label' => __( 'Border Color', 'bdevselement' ),
		        'type' => Controls_Manager::COLOR,
		        'condition' => [
		            'button_border_border!' => '',
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'border-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();


	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		$chose_style = $settings['chose_style'];
		extract( $settings);

		?>

		<?php if( $chose_style == 'slider_default' ): ?>
        <section class="hero-area">
            <div class="hero-slider">
                <div class="slider-active">
				<?php $counter = 1; ?>
				<?php foreach ( $settings['tabs'] as $item ) : ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link' => [
								'class' => [
									'btn btn-icon ml-0 tp-el-btn',
								],
								'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
								'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link-right' => [
								'class' => [
									'play-btn popup-video',
								],
								'href'   => $item['tab_link_right']['url'] ? esc_url($item['tab_link_right']['url']) : '#',
								'target' => $item['tab_link_right']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
					<?php 
					endif; ?>
                    <div class="single-slider slider-height d-flex align-items-center <?php echo $this->get_render_attribute_string( 'slide-item' ); ?>" data-background="<?php print esc_url($image); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8 col-md-10">
                                    <div class="hero-text tp-el-content">
                                        <div class="hero-slider-caption ">
										<?php if (!empty($item['tab_sub_title'])) : ?>
											<h5 class="tp-el-subtitle" data-animation="fadeInUp" data-delay=".2s"><?php echo wp_kses_post($item['tab_sub_title']); ?></h5>
										<?php endif; ?>											

										<?php if (!empty($item['tab_title'])) : ?>
											<h2 class="tp-slider-title tp-el-title" data-animation="fadeInUp" data-delay=".4s"><?php echo wp_kses_post($item['tab_title']); ?></h2>
										<?php endif; ?>
                                            
										<?php if (!empty($item['tab_content'])) : ?>
											<p data-animation="fadeInUp" data-delay=".6s"><?php echo $this->parse_text_editor( $item['tab_content'] ); ?></p>
										<?php endif; ?>
                                        </div>

										
                                        <div class="hero-slider-btn">
                                        	<?php if ( ! empty( $item['tab_link']['url'] )) : ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link' ); ?> data-animation="fadeInLeft" data-delay=".6s">
                                            	<span><i class="<?php echo esc_attr($item['icon_plus']); ?>"></i></span>
                                            	
                                            	<?php echo esc_html($item['tab_button_text']); ?>
                                            </a>
                                            <?php endif; ?>

											<?php if ( ! empty( $item['tab_link_right']['url'] )) : ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link-right' ); ?> data-animation="fadeInRight" data-delay="1.0s">
												<i class="fal fa-play"></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
					$counter++;
					endforeach;
					?>
                </div>
            </div>
        </section>
       <?php elseif( $chose_style == 'slider_transparent' ): ?>
        <!-- hero-area start -->
        <section class="hero-area">
            <div class="hero-slider">
                <div class="slider-active">
				<?php $counter = 1; ?>
				<?php foreach ( $settings['tabs'] as $item ) : ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link' => [
								'class' => [
									'btn btn-icon btn-icon-blue ml-0 tp-el-btn',
								],
								'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
								'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link-right' => [
								'class' => [
									'play-btn popup-video',
								],
								'href'   => $item['tab_link_right']['url'] ? esc_url($item['tab_link_right']['url']) : '#',
								'target' => $item['tab_link_right']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
					<?php 
					endif; ?>
                    <div class="single-slider slider-height slider-height-2 d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-10">
                                    <div class="hero-text hero-text-2 pt-35 tp-el-content">
                                        <div class="hero-slider-caption hero-slider-caption-2">
										<?php if (!empty($item['tab_sub_title'])) : ?>
											<h5 class="tp-el-subtitle"  data-animation="fadeInUp" data-delay=".2s"><?php echo wp_kses_post($item['tab_sub_title']); ?></h5>
										<?php endif; ?>											

										<?php if (!empty($item['tab_title'])) : ?>
											<h2 class="tp-slider-title white-text tp-el-title"  data-animation="fadeInUp" data-delay=".4s"><?php echo wp_kses_post($item['tab_title']); ?></h2>
										<?php endif; ?>
                                        </div>

										
                                        <div class="hero-slider-btn">
                                        	<?php if ( ! empty( $item['tab_link']['url'] )): ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link' ); ?> data-animation="fadeInLeft" data-delay=".6s">
                                            	<span><i class="<?php echo esc_attr($item['icon_plus']); ?>"></i></span>
                                            	
                                            	<?php echo esc_html($item['tab_button_text']); ?>
                                            </a>
                                            <?php endif; ?>

                                            <?php if ( ! empty( $item['tab_link_right']['url'] )) : ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link-right' ); ?> data-animation="fadeInRight" data-delay="1.0s">
												<i class="fal fa-play"></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>
										
                                    </div>
                                </div>
                                <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-12">
                                    <div class="slider-right-2">
                                        <div class="caregive-box">
                                            <div class="search-form">
		                                    	<?php if (( '' !== $settings['booking_sub_title'] )) : ?>	
												<span class="sub-heading"><?php echo wp_kses_post($settings['booking_sub_title']); ?></span>
												<?php endif; ?>

												<?php if (( '' !== $settings['booking_title'] )) : ?>
												<h3><?php echo wp_kses_post($settings['booking_title']); ?></h3>
												<?php endif; ?>	
                                            </div>
                                            <div class="hero-form">
                                                <?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
					$counter++;
					endforeach;
					?>
                </div>
            </div>
        </section>
        <!-- hero-area end -->

	   <?php elseif( $chose_style == 'slider_content_box' ): ?>
        <!-- hero-area start -->
        <section class="hero-area">
            <div class="hero-slider">
                <div class="slider-fix">
				<?php $counter = 1; ?>
				<?php foreach ( $settings['tabs'] as $item ) : ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link' => [
								'class' => [
									'btn btn-icon ml-0',
								],
								'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
								'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link-right' => [
								'class' => [
									'play-btn popup-video',
								],
								'href'   => $item['tab_link_right']['url'] ? esc_url($item['tab_link_right']['url']) : '#',
								'target' => $item['tab_link_right']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
					<?php 
					endif; ?>
                    <div class="single-slider slider-height slider-height-3 d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9">
                                    <div class="hero-text hero-text-box tp-el-content">
                                        <div class="hero-slider-caption ">
											<?php if (!empty($item['tab_sub_title'])) : ?>
												<h5 class="tp-el-subtitle" data-animation="fadeInUp" data-delay=".2s"><?php echo wp_kses_post($item['tab_sub_title']); ?></h5>
											<?php endif; ?>											

											<?php if (!empty($item['tab_title'])) : ?>
												<h2 class="tp-slider-title tp-el-title" data-animation="fadeInUp" data-delay=".4s"><?php echo wp_kses_post($item['tab_title']); ?></h2>
											<?php endif; ?>
	                                            
											<?php if (!empty($item['tab_content'])) : ?>
												<p data-animation="fadeInUp" data-delay=".6s"><?php echo $this->parse_text_editor( $item['tab_content'] ); ?></p>
											<?php endif; ?>
                                        </div>
										
                                        <div class="hero-slider-btn">
                                        	<?php if ( ! empty( $item['tab_link']['url'] )) : ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link' ); ?> data-animation="fadeInLeft" data-delay=".6s">
                                            	<span><i class="<?php echo esc_attr($item['icon_plus']); ?>"></i></span>
  
                                            	<?php echo esc_html($item['tab_button_text']); ?>
                                            </a>
                                            <?php endif; ?>


                                            <?php if ( ! empty( $item['tab_link_right']['url'] )): ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link-right' ); ?> data-animation="fadeInRight" data-delay="1.0s">
												<i class="fal fa-play"></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
					$counter++;
					endforeach;
					?>
                </div>
            </div>
        </section>
        <!-- hero-area end -->   
	   <?php elseif( $chose_style == 'slider_style_4' ): ?>
	        <!-- hero-area start -->
	        <section class="hero-area">
	            <div class="hero-slider">
	                <div class="slider-active">
				<?php $counter = 1; ?>
				<?php foreach ( $settings['tabs'] as $item ) : ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link' => [
								'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
								'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link-right' => [
								'href'   => $item['tab_link2']['url'] ? esc_url($item['tab_link2']['url']) : '#',
								'target' => $item['tab_link2']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
					<?php 
					endif; ?>
	                    <div class="single-slider h4slider-bg pos-rel d-flex align-items-center pl-55" data-background="<?php print esc_url($image); ?>">
	                        <div class="container-fluid">
	                            <div class="row">
	                                <div class="col-xl-8 col-lg-12 col-md-10">
	                                    <div class="hero-text">
	                                        <div class="hero-slider-caption h4hero-content mb-35 tp-el-content">								
												<?php if (!empty($item['tab_sub_title'])) : ?>
													<h2 class="tp-slider-title white-text tp-el-title" data-animation="fadeInUp" data-delay=".4s"><?php echo wp_kses_post($item['tab_title']); ?></h2>
												<?php 
												endif; ?>
		                                            
												<?php if (!empty($item['tab_sub_title'])) : ?>
													<p  data-animation="fadeInUp" data-delay=".6s"><?php echo $this->parse_text_editor( $item['tab_content'] ); ?></p>
												<?php 
												endif; ?>

												<?php if (  !empty($item['tab_content_list']) ) : ?>
	                                            <div class="h4-span" data-animation="fadeInUp" data-delay=".8s">
	                                            	<?php echo $this->parse_text_editor( $item['tab_content_list'] ); ?>
												</div>
												<?php endif; ?>
	                                        </div>
	                                        <div class="hero-slider-btn h4hero-btn">
	                                        	<?php if ( ! empty( $item['tab_link']['url'] )): ?>
	                                            	<a data-animation="fadeInLeft" data-delay=".9s" <?php echo $this->get_render_attribute_string( 'slider-link' ); ?> class="btn btn-icon ml-0 tp-el-btn">
	                                            		<span><i class="<?php echo esc_attr($item['icon_plus']); ?>"></i></span>
	                                            		<?php echo esc_html($item['tab_button_text']); ?>
	                                            	</a>
	                                        	<?php endif; ?>

												<?php if ( ! empty( $item['tab_link2']['url'] )): ?>
	                                            	<a data-animation="fadeInLeft" data-delay="1s" <?php echo $this->get_render_attribute_string( 'slider-link-right' ); ?> class="btn btn-icon btn-icon-green ml-0">
	                                            		<span><i class="<?php echo esc_attr($item['icon_plus']); ?>"></i></span>
	                                            		<?php print wp_kses_post( $item['tab_button_text2'] ); ?></a>
	                                            <?php endif; ?>
	                                        </div>


	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                <?php
					$counter++;
					endforeach;
					?>
	                </div>
	            </div>
	        </section>
	        <!-- hero-area end -->

		<?php elseif( $chose_style == 'slider_style_5' ): ?>

        <section class="hero-area slider-style-6">
            <div class="hero-slider">
                <div class="slider-active">
				<?php $counter = 1; ?>
				<?php foreach ( $settings['tabs'] as $item ) : ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link' => [
								'class' => [
									'btn btn-icon ml-0 tp-el-btn',
								],
								'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
								'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link-right' => [
								'class' => [
									'button-border tp-el-secbtn',
								],
								'href'   => $item['tab_link_right']['url'] ? esc_url($item['tab_link_right']['url']) : '#',
								'target' => $item['tab_link_right']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
					<?php 
					endif; ?>
                    <div class="single-slider slider-height d-flex align-items-center <?php echo $this->get_render_attribute_string( 'slide-item' ); ?>" data-background="<?php print esc_url($image); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8 col-md-10 offset-xl-1">
                                    <div class="hero-text">
                                        <div class="hero-slider-caption tp-el-content">
											<?php if ( '' !== $item['tab_sub_title'] ) : ?>
												<h5 class="hero-sub tp-el-subtitle" data-animation="fadeInUp" data-delay=".2s"><?php echo wp_kses_post($item['tab_sub_title']); ?></h5>
											<?php endif; ?>											

											<?php if ( '' !== $item['tab_title'] ) : ?>
												<h2 class="tp-slider-title white-text tp-el-title" data-animation="fadeInUp" data-delay=".4s"><?php echo wp_kses_post($item['tab_title']); ?></h2>
											<?php endif; ?>
	                                            
                                        </div>

										
                                        <div class="hero-slider-btn">
                                        	<?php if ( ! empty( $item['tab_link']['url'] )): ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link' ); ?> data-animation="fadeInLeft" data-delay=".6s">
                                            	<span><i class="<?php echo esc_attr($item['icon_plus']); ?>"></i></span>
                                            	
                                            	<?php echo esc_html($item['tab_button_text']); ?>
                                            </a>
                                            <?php endif; ?>

											<?php if ( ! empty( $item['tab_link2']['url'] )): ?>
                                            <a <?php echo $this->get_render_attribute_string( 'slider-link-right' ); ?> data-animation="fadeInRight" data-delay="1.0s">
												<?php print wp_kses_post( $item['tab_button_text2'] ); ?> 
                                            </a>
                                            <?php endif; ?>
                                        </div>
										

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
					$counter++;
					endforeach;
					?>
                </div>
            </div>
        </section>


         <?php elseif( $chose_style == 'slider_style_6' ): ?>
	        <!-- hero-area start -->
	        <section class="hero-area">
	            <div class="hero-slider">
	                <div class="slider-active">
				<?php $counter = 1; ?>
				<?php foreach ( $settings['tabs'] as $item ) : ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link' => [
								'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
								'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
					$this->add_render_attribute(
						[
							'slider-link-right' => [
								'href'   => $item['tab_link_right']['url'] ? esc_url($item['tab_link_right']['url']) : '#',
								'target' => $item['tab_link_right']['is_external'] ? '_blank' : '_self'
							]
						], '', '', true
					); ?>

					<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
					<?php 
					endif; ?>
	                    <div class="single-slider h4slider-bg pos-rel d-flex align-items-center pl-55 slider-style-7" data-background="<?php print esc_url($image); ?>">
	                        <div class="container-fluid">
	                            <div class="row">
	                                <div class="col-xl-8 col-lg-12 col-md-10">
	                                    <div class="hero-text">
	                                        <div class="hero-slider-caption h4hero-content mb-35 tp-el-content">								

												<?php if ( !empty($item['tab_sub_title']) ) : ?>
													<h5 class="tp-el-subtitle" data-animation="fadeInUp" data-delay=".2s"><?php echo wp_kses_post($item['tab_sub_title']); ?></h5>
												<?php endif; ?>

												<?php if ( !empty($item['tab_title']) ) : ?>
													<h2 class="tp-slider-title tp-el-title" data-animation="fadeInUp" data-delay=".4s"><?php echo wp_kses_post($item['tab_title']); ?></h2>
												<?php endif; ?>
		                                            
												<?php if ( !empty($item['tab_content'])  ) : ?>
													<p  data-animation="fadeInUp" data-delay=".6s"><?php echo $this->parse_text_editor( $item['tab_content'] ); ?></p>
												<?php endif; ?>
	                                        </div>
	                                        <div class="hero-slider-btn h4hero-btn">
	                                        	<?php if ( ! empty( $item['tab_link']['url'] )): ?>
	                                            	<a data-animation="fadeInLeft" data-delay=".9s" class="tp-el-btn" <?php echo $this->get_render_attribute_string( 'slider-link' ); ?> class="btn btn-icon ml-0"><span>+</span><?php echo esc_html($settings['button_text']); ?></a>
	                                        	<?php 
	                                        	endif; ?>

												<?php if ( ! empty( $item['tab_link_right']['url'] )): ?>
	                                            	<a data-animation="fadeInLeft" data-delay="1s" <?php echo $this->get_render_attribute_string( 'slider-link-right' ); ?> class="btn btn-icon btn-icon-green ml-0"><span>+</span><?php print wp_kses_post( $settings['button_text_right'] ); ?></a>
	                                            <?php endif; ?>
	                                        </div>


	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                <?php
					$counter++;
					endforeach;
					?>
	                </div>
	            </div>
	        </section>
	        <!-- hero-area end -->


       <?php endif; ?>	

	<?php
	}

}
