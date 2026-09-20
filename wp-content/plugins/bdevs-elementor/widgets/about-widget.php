<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsAbout extends \Elementor\Widget_Base {

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
		return 'bdevs-about';
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
		return __( 'About', 'bdevs-elementor' );
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
		return [ 'about' ];
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
			'section_content_features',
			[
				'label' => esc_html__( 'About', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'about-style-1'  => esc_html__( 'About With Author', 'bdevs-elementor' ),
					'about-style-2' => esc_html__( 'About With List', 'bdevs-elementor' ),
					'about-style-3' => esc_html__( 'About With Video', 'bdevs-elementor' ),
					'about-style-4' => esc_html__( 'About With BG', 'bdevs-elementor' ),
					'about-style-5' => esc_html__( 'About Author Singnature', 'bdevs-elementor' ),
					'about-style-6' => esc_html__( 'About With Icon', 'bdevs-elementor' ),
				],
				'default'   => 'about-style-1',
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

		$this->add_control(
			'desc',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is content', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'phone_number',
			[
				'label'       => __( 'Phone Number', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your phone number', 'bdevs-elementor' ),
				'default'     => __( 'It is phone number', 'bdevs-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['about-style-5']
				],
			]
		);	

		$this->add_control(
			'phone_icon',
			[
				'label'   => esc_html__( 'Phone Icon', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Phone Icon Image', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-5']
				],
			]
		);	

		
		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'About Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your About Image', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-1', 'about-style-5', 'about-style-6']
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
					'chose_style' => ['about-style-5']
				],
			]
		);

		$this->end_controls_section();

		/** facts section **/
		$this->start_controls_section(
			'facts_section',
			[
				'label' => esc_html__( 'Facts', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-2','about-style-3','about-style-6']
				],
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Fact Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Fact #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Fact #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					],
				],
				'fields' => [					
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Upload Icon from here', 'bdevs-elementor' ),
					],					
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => __( 'It is Heading.', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'show_label' => false,
					],
				],
			]
		);

		$this->end_controls_section();


		/** 
		*	content list section 
		**/

		$this->start_controls_section(
			'content_lists_section',
			[
				'label' => esc_html__( 'Lists', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-1', 'about-style-2','about-style-4'],
				]
			]
		);

		$this->add_control(
			'tab_lists',
			[
				'label' => esc_html__( 'List Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'List #1', 'bdevs-elementor' ),
					]
				],
				'fields' => [										
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.', 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();



		/** 
		*	Author section 
		**/
		$this->start_controls_section(
			'section_content_author',
			[
				'label' => esc_html__( 'Author Info', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-1', 'about-style-5']
				],
			]
		);
		$this->add_control(
			'image_author',
			[
				'label'   => esc_html__( 'Author Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Groth Image', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'author_heading',
			[
				'label'       => __( 'Author Name', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Author Name', 'bdevs-elementor' ),
				'default'     => __( 'Rosalina D. Williamson', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'author_designation',
			[
				'label'       => __( 'Author Designation', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Author Designation', 'bdevs-elementor' ),
				'default'     => __( 'Founder', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	

		$this->add_control(
			'author_desc',
			[
				'label'       => __( 'Author Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Author Description', 'bdevs-elementor' ),
				'default'     => __( 'Description content here', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);		

		$this->end_controls_section();		

		/** 
		*	Video section 
		**/
		$this->start_controls_section(
			'video_section',
			[
				'label' => esc_html__( 'Video Section', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-3']
				],
			]
		);
		$this->add_control(
			'preview_image',
			[
				'label'   => esc_html__( 'Preview Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Preview Image', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'video_link',
			[
				'label'       => __( 'Video Link', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter vidoe link', 'bdevs-elementor' ),
				'default'     => __( 'https://www.youtube.com/watch?v=I3u3lFA9GX4', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();		



		/** 
		*	Link section 
		**/
		$this->start_controls_section(
			'link_section_content',
			[
				'label' => esc_html__( 'Link Info', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-2','about-style-4']
				],
			]
		);		

		$this->add_control(
			'link_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'bdevs-elementor' ),
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


		/** 
		*	Layout section 
		**/
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

		$this->add_control(
			'show_list',
			[
				'label'   => esc_html__( 'Show List', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);			
		
		$this->add_control(
			'show_shape',
			[
				'label'   => esc_html__( 'Show Shape', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);		

		$this->add_control(
			'show_shape_circle',
			[
				'label'   => esc_html__( 'Show Shape Circle', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
		        'global' => array( 'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY ),
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
		        'global' => array( 'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT ),
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
		        'global' => array( 'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT ),
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
		        'global' => array( 'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT ),
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
		extract($settings);

		$this->add_render_attribute(
			[
				'link' => [
					'class' => [
						'btn btn-icon ml-0 tp-el-btn',
					],
					'href'   => !empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#',
					'target' => !empty($settings['link']['is_external']) ? '_blank' : '_self'
				]
			], '', '', true
		);
		
		if( $chose_style == 'about-style-1' ): ?>
        <section class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                    	<?php if( $settings['show_shape_circle'] ): ?>
                        <div class="medical-icon-brand-2">
                        	<img src="<?php print get_template_directory_uri(); ?>/img/about/medical-brand-icon-border.png" alt="">
                        </div>
                        <?php endif; ?>
                        <div class="about-left-side pos-rel mb-30">
                            <div class="about-front-img">
                                <?php 
							   	if ( '' !== $settings['image'] )  : 
							   		$image_src = wp_get_attachment_image_src( $settings['image']['id'], 'full' );
									$image = $image_src ? $image_src[0] : ''; 
							   		?>
								   <img src="<?php print esc_url($image); ?>" alt="<?php print wp_kses_post($settings['sub_heading']); ?>">
								<?php 
								endif; ?>
                            </div>

                            <?php if( $settings['show_shape'] ): ?>
                            <div class="about-shape">
                                <img src="<?php print get_template_directory_uri(); ?>/img/about/about-shape.png" alt="">
                            </div>
                        	<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="about-right-side tp-el-content pt-55 mb-30">
                            <div class="about-title mb-20">
								<?php if ( '' !== $settings['sub_heading'] ) : ?>
								<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php endif; ?>	 

								<?php if ( '' !== $settings['heading'] ) : ?>
								<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
								<?php endif; ?>	
                            </div>
                            <div class="about-text">
                               <?php echo wp_kses_post($settings['desc']); ?>
                            </div>
							<?php if( $settings['show_list'] ) : ?>
							<div class="about-text-list mt-15 mb-40">
                                <ul>
			                        <?php foreach ( $settings['tab_lists'] as $item ) : 
										extract($item);
										if(!empty($title)) :
									?>
			                            <li><i class="fa fa-check"></i><span><?php print wp_kses_post($title); ?></span></li>
				                    <?php
									endif;
									endforeach;
									?>
                                </ul>
                            </div>
							<?php endif; ?>
                            <div class="about-author d-flex align-items-center">
								<?php if ( '' !== $settings['image_author'] )  : 
						   		$image_src = wp_get_attachment_image_src( $settings['image_author']['id'], 'full' );
								$image_author = $image_src ? $image_src[0] : ''; 
						   		?>
                                <div class="author-ava">
									<img src="<?php print esc_url($image_author); ?>" alt="<?php print wp_kses_post( $settings['tab_title'] ?? '' ); ?>">
                                </div>
                                <?php endif; ?>

                                <div class="author-desination">
									<?php if (( '' !== $settings['author_heading'] )) : ?>
									<h4><?php echo wp_kses_post($settings['author_heading']); ?></h4>
									<?php endif; ?>	 

									<?php if (( '' !== $settings['author_designation'] )) : ?>
									<h6><?php echo wp_kses_post($settings['author_designation']); ?></h6>
									<?php endif; ?>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php elseif( $chose_style == 'about-style-2' ): ?>
		<section class="about-area about-area-mid">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="row">
	                    <?php foreach ( $settings['tabs'] as $item ) : 
							extract($item);
						?>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="feature-box mb-40">
									<?php
									if ( '' !== $icon['id'] )  :  
										$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
										$image_url = $image_src ? $image_src[0] : '';
									?>
                                    <div class="feature-small-icon mb-35">
										<img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
									</div>
                                	<?php endif; ?>

                                    <div class="feature-small-content">
                                        <h3><?php print wp_kses_post($title); ?></h3>
                                        <?php if ( '' !== $tab_content ) : ?>
										<p><?php print wp_kses_post($this->parse_text_editor( $tab_content )); ?></p>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>

	                    <?php
						endforeach;
						?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-11">
                        <div class="about-right-side pt-25 mb-30 tp-el-content">
                            <div class="about-title mb-20">
                            	<?php if (  $sub_heading ) : ?>
								<h5 class="tp-el-subtitle"><?php echo wp_kses_post( $sub_heading ); ?></h5>
								<?php endif; ?>	 

								<?php if ( $heading ) : ?>
								<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($heading); ?></h2>
								<?php endif; ?>
                            </div>
                            <div class="about-text">
                               <?php echo wp_kses_post($settings['desc']); ?>
                            </div>
                            <div class="about-text-list mb-40">
                                <ul>
			                        <?php foreach ( $settings['tab_lists'] as $item ) : 
										extract($item);
									?>

			                            <li><i class="fa fa-check"></i><span><?php print wp_kses_post($title); ?></span></li>

				                    <?php
									endforeach;
									?>
                                </ul>
                            </div>
                           
                           <?php if ( ! empty( $settings['link']['url'] )): ?>
                            <div class="button-area">
		                        <a <?php echo $this->get_render_attribute_string( 'link' ); ?>><span><?php print esc_html_e('+', 'bdevs-elementor'); ?></span> <?php echo esc_html($settings['link_text']); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'about-style-3' ): ?>

        <section class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="about-left-side pos-rel mb-30">
                            <div class="about-front-img pos-rel">
                        		<?php
								if ( '' !== $preview_image['id'] )  :  
									$image_src = wp_get_attachment_image_src( $preview_image['id'], 'full' );
									$image_url = $image_src ? $image_src[0] : '';
								?>
                                    <img src="<?php print esc_url($image_url); ?>" alt="Preview Image">
                                <?php endif; ?>
                               	<?php if( !empty($video_link) ): ?>
                                <a class="popup-video about-video-btn white-video-btn" href="<?php print esc_url( $video_link ); ?>"><i class="fas fa-play"></i></a>
                                <?php endif; ?>
                            </div>
                            <?php if( $settings['show_shape'] ): ?>
                            <div class="about-shape">
                                <img src="<?php print get_template_directory_uri(); ?>/img/about/about-shape.png" alt="">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="about-right-side pt-55 mb-30">
                            <div class="about-title mb-20 tp-el-content">
                            	<?php if ( '' !== $sub_heading )  : ?>
								<h5 class="tp-el-subtitle"><?php echo wp_kses_post( $sub_heading ); ?></h5>
								<?php endif; ?>	 

								<?php if ( '' !== $heading ) : ?>
								<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($heading); ?></h2>
								<?php endif; ?>
                            </div>
                            <div class="about-text mb-50">
                                <?php echo wp_kses_post($settings['desc']); ?>
                            </div>
                            <div class="our-destination">
                                <?php 
		                        $x = 1;
		                        foreach ( $settings['tabs'] as $item ) : 
									extract($item);
									if( $x == 1 ){
										$class = 'mb-30';
									}
									$x++;
								?>
                                <div class="single-item <?php print esc_attr( $class ); ?>">
									<?php
									if ( '' !== $icon['id'] )  :  
										$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
										$image_url = $image_src ? $image_src[0] : '';
									?>
                                    <div class="mv-icon f-left">
                                        <img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
                                    </div>
                                    <?php endif; ?>

                                    <div class="mv-title fix">
                                        <h3><?php print wp_kses_post($title); ?></h3>
                                        <?php if ( '' !== $tab_content ) : ?>
										<p><?php print wp_kses_post($this->parse_text_editor( $tab_content )); ?></p>
										<?php endif; ?>
                                    </div>
                                </div>
	                    <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'about-style-4' ): 
        
	   		$image_src = wp_get_attachment_image_src( $settings['image']['id'], 'full' );
			$bg_url = $image_src ? $image_src[0] : ''; 
			$this->add_render_attribute(
				[
					'link' => [
						'class' => [
							'btn',
						],
						'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
						'target' => $settings['link']['is_external'] ? '_blank' : '_self'
					]
				], '', '', true
			);

		?>

        <section class="appoinment-section" data-background="<?php print esc_url($bg_url); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="appoinment-box white tp-el-content">
                            <div class="appoinment-content">
                            	<?php if ( '' !== $settings['sub_heading'] ) : ?>
								<span class="small-text tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
								<?php endif; ?>	 

								<?php if ( '' !== $settings['heading'] ) : ?>
								<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
								<?php endif; ?>	
                                <?php echo wp_kses_post($settings['desc']); ?>
								<ul class="professinals-list pt-30 mb-60">                               
								        <?php foreach ( $settings['tab_lists'] as $item ) : 
										extract($item);
									?>
								        <li><i class="fa fa-check"></i><?php print wp_kses_post($title); ?></li>
								    <?php
									endforeach;
									?>
								</ul>
                            </div>

                            <?php if (( ! empty( $settings['link']['url'] )) ): ?>
							<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
							 	<?php echo esc_html($settings['link_text']); ?> <i class="fas fa-angle-double-right"></i>
							 </a>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'about-style-5' ): ?>

        <!-- about-area start -->
        <section class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="h4about-thumb pos-rel">
                            <?php 
						   	if ( '' !== $settings['image'] )  : 
						   		$image_src = wp_get_attachment_image_src( $settings['image']['id'], 'full' );
								$image = $image_src ? $image_src[0] : ''; 
						   		?>
							   <img src="<?php print esc_url($image); ?>" alt="<?php print wp_kses_post($settings['sub_heading']); ?>">
							<?php 
							endif; ?>                           

                            <a href="mailto:<?php echo $settings['phone_number']; ?>" class="call-btn f-700 white-color green-bg">
                            	<i class="call-icon">
	                            	<?php 
	                            	if ( '' !== $settings['phone_icon'] ) : 
									   	$image_src = wp_get_attachment_image_src( $settings['phone_icon']['id'], 'full' );
										$phone_icon_url = $image_src ? $image_src[0] : ''; 
									   	?>
										   <img src="<?php print esc_url($phone_icon_url); ?>" alt="Phone Icon">
									<?php 
									endif; ?> 
                            	</i>

                            	<?php 
                            	if ( '' !== $settings['phone_number'] ) : ?>
									<span><?php echo wp_kses_post($settings['phone_number']); ?></span>
								<?php 
								endif; ?>
                            </a>
                            
                            <?php 
						   	if ( '' !== $settings['overlay_image'] )  : 
						   		$image_src = wp_get_attachment_image_src( $settings['overlay_image']['id'], 'full' );
								$overlay_image = $image_src ? $image_src[0] : ''; 
						   		?>
							   <img class="about-overlap__thumb" src="<?php print esc_url($overlay_image); ?>" alt="Overlay Image">
							<?php 
							endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="about-right-side h4about-right mb-30 tp-el-content">
                            <div class="about-title mb-20">
                            	<?php 
                            	if ( '' !== $settings['sub_heading'] ) : ?>
									<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php 
								endif; ?>
                                
								<?php 
								if ( '' !== $settings['heading'] ) : ?>
									<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
								<?php 
								endif; ?>
                            </div>
                            <div class="about-text">
								<?php echo wp_kses_post($settings['desc']); ?>
                            </div>
                            <div class="about-author d-flex align-items-center">
                                <div class="author-ava h4author-ava">
                                    <?php 
									if ( '' !== $settings['image_author'] )  : 
									   	$image_src = wp_get_attachment_image_src( $settings['image_author']['id'], 'full' );
										$image_author = $image_src ? $image_src[0] : ''; 
									   	?>
										   <img src="<?php print esc_url($image_author); ?>" alt="Author Name">
									<?php 
									endif; ?>
                                </div>
                                <div class="author-desination h4author-destination">
                                    <?php 
                                    if (( '' !== $settings['author_desc'] )) : ?>
										<p><?php echo wp_kses_post($settings['author_desc']); ?></p>
									<?php endif; ?>                                    

									<?php 
                                    if (( '' !== $settings['author_heading'] )) : ?>
										<h4 class="mb-0"><?php echo wp_kses_post($settings['author_heading']); ?></h4>
									<?php endif; ?>	 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area end -->
		<?php 
		elseif( $chose_style == 'about-style-6' ): ?>

	        <section class="about-area about-style-6">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-6 col-lg-5">
	                        <div class="about-left-side pos-rel mb-30">
	                            <div class="about-img pos-rel">
		                            <?php 
								   	if ( '' !== $settings['image'] )  : 
								   		$image_src = wp_get_attachment_image_src( $settings['image']['id'], 'full' );
										$image = $image_src ? $image_src[0] : ''; 
								   		?>
									   <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('About Image', 'bdevs-elementor'); ?>">
									<?php 
									endif; ?>  
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xl-6 col-lg-7">
	                        <div class="about-right-side mb-30 tp-el-content">
	                            <div class="about-title mb-20">
	                            	<?php if ( '' !== $sub_heading ) : ?>
									<h5 class="sec-sub tp-el-subtitle"><span></span><?php echo wp_kses_post( $sub_heading ); ?></h5>
									<?php endif; ?>	 

									<?php if ( '' !== $heading ) : ?>
									<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($heading); ?></h2>
									<?php endif; ?>
	                            </div>
	                            <div class="about-text mb-50">
	                                <?php echo wp_kses_post($settings['desc']); ?>
	                            </div>
	                            <div class="our-destination">
	                                <?php 
			                        $x = 1;
			                        foreach ( $settings['tabs'] as $item ) : 
										extract($item);
										if( $x == 1 ){
											$class = 'mb-30';
										}
										$x++;
									?>
		                                <div class="single-item <?php print esc_attr( $class ); ?>">
											<?php
											if ( '' !== $icon['id'] )  :  
												$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
												$image_url = $image_src ? $image_src[0] : '';
											?>
		                                    <div class="mv-icon f-left">
		                                        <img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
		                                    </div>
		                                    <?php endif; ?>

		                                    <div class="mv-title fix">
		                                        <h3><?php print wp_kses_post($title); ?></h3>
		                                        <?php if ( '' !== $tab_content ) : ?>
												<p><?php print wp_kses_post($this->parse_text_editor( $tab_content )); ?></p>
												<?php endif; ?>
		                                    </div>
		                                </div>
			                    	<?php 
			                    	endforeach; ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>

		<?php endif; ?>	
	<?php
	}

}