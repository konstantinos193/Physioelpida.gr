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
class BdevsCTA extends \Elementor\Widget_Base {

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
		return 'bdevs-cta';
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
		return __( 'Call To Action', 'bdevs-elementor' );
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
		return [ 'cta' ];
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
			'section_content_heading',
			[
				'label' => esc_html__( 'Section Heading', 'bdevs-elementor' ),
				// 'condition' => [
				// 	'chose_style' => 'service_icon',
				// ],
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'cta-style-1'  => esc_html__( 'CTA Style 1', 'bdevs-elementor' ),
					'cta-style-2' => esc_html__( 'CTA Style 2', 'bdevs-elementor' ),
					'cta-style-3' => esc_html__( 'CTA Style 3', 'bdevs-elementor' ),
					'cta-style-4' => esc_html__( 'CTA Style 4', 'bdevs-elementor' ),
				],
				'default'   => 'cta-style-1',
			]
		);


		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'It is sub heading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter your sub heading Here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'It is heading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter Heading Here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'get a consultant', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
				'label_block' => true,
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
				'label_block' => true,
			]
		);

		$this->add_control(
			'background_bg',
			[
				'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Backgrond Image', 'bdevs-elementor' ),
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

		
	}

	public function render() {
		$settings  = $this->get_settings_for_display(); 
		extract($settings);
		
		$this->add_render_attribute(
			[
				'link' => [
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	   	$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url = $bg_src ? $bg_src[0] : ''; 

		if( $chose_style == 'cta-style-1' ): ?>
	        <section class="cta-area pos-rel pt-115 pb-120" data-background="<?php print esc_url($bg_url); ?>">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-10 offset-xl-1 col-md-12">
	                        <div class="cta-text text-center tp-el-content">
	                            <div class="section-title pos-rel mb-50">
	                                <div class="section-text section-text-white pos-rel"> 
							            <?php 
							            if (!empty($sub_title)) : ?>
							                <h5 class="tp-el-subtitle"><?php print wp_kses_post( $sub_title ); ?></h5>
							            <?php 
							        	endif; ?> 

										<?php 
										if (!empty($title)) : ?>
							                <h2 class="sec-title white-text tp-el-title"><?php print wp_kses_post( $title ); ?></h2>
							            <?php 
							        	endif; ?> 
	                                </div>
	                            </div>
			                    <?php 
			                    if (!empty($link['url'])) : ?>
			                        <div class="section-button section-button-left">
			                            <a class="btn btn-icon btn-icon-green ml-0" <?php echo $this->get_render_attribute_string( 'link' ); ?>><span>+</span> <?php echo esc_html($settings['link_text']); ?></a>
			                        </div>
			                    <?php 
			                	endif; ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>

        <?php elseif ($chose_style == 'cta-style-2'): ?>
        	
	       	<section class="fact-area fact-map green-bg pos-rel pt-115 pb-60">
	            <div class="container">
	                <div class="row align-items-center">
	                    <div class="col-xl-9 col-lg-8 col-md-12">
	                        <div class="section-title tp-el-content pos-rel mb-45">
	                            <div class="section-text section-text-white pos-rel">
	                            	<?php 
	                            	if (!empty($sub_title)) : ?>
							            <h5 class="tp-el-subtitle"><?php print wp_kses_post( $sub_title ); ?></h5>
							        <?php 
							    	endif; ?> 

									<?php 
									if (!empty($title)) : ?>
						                <h2 class="sec-title white-text tp-el-title"><?php print wp_kses_post( $title ); ?></h2>
						            <?php 
						        	endif; ?> 
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xl-3 col-lg-4">
	                    	<?php if (!empty($link['url'])) : ?>
		                        <div class="section-button section-button-left mb-30">
		                            <a class="btn btn-icon btn-icon-dark ml-0" <?php echo $this->get_render_attribute_string( 'link' ); ?>><span><?php print esc_html_e('+', 'bdevs-elementor'); ?></span> <?php echo esc_html($settings['link_text']); ?></a>
		                        </div>
		                    <?php endif; ?>
	                    </div>
	                </div>
	            </div>
	        </section>

        <?php elseif ($chose_style == 'cta-style-3'): ?>
        	<style>
        		.fact-map::before {
					background-image: url(<?php print esc_url($bg_url); ?>);
				}
        	</style>

	        <!-- fact-area start -->
	        <section class="fact-area fact-map pos-rel">
	            <div class="container">
	                <div class="row align-items-center">
	                    <div class="col-xl-10 offset-xl-1">
	                        <div class="section-title pos-rel tp-el-content">
	                            <div class="section-text section-text-white pos-rel ">
		                            <?php 
		                            if (!empty($sub_title)) : ?>
							            <h5 class="tp-el-subtitle f-400"><?php print wp_kses_post( $sub_title ); ?></h5>
							        <?php 
							    	endif; ?> 

									<?php 
									if (!empty($title)) : ?>
						                <h2 class="tp-el-title sec-title mb-0"><?php print wp_kses_post( $title ); ?></h2>
						            <?php 
						        	endif; ?> 
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>
	        <!-- fact-area end -->

	        <?php elseif ($chose_style == 'cta-style-4'): ?>
	        	<style>
	        		.fact-map::before {
						background-image: url(<?php print esc_url($bg_url); ?>);
					}
	        	</style>

		       	<section class="fact-area fact-map pos-rel pt-115 pb-60">
		            <div class="container">
		                <div class="row align-items-center">
		                    <div class="col-xl-9 col-lg-8 col-md-12">
		                        <div class="section-title pos-rel mb-45">
		                            <div class="section-text section-text-white pos-rel tp-el-content">
		                            	<?php 
		                            	if (!empty( $sub_title)) : ?>
								            <h5 class="tp-el-subtitle"><?php print wp_kses_post( $sub_title ); ?></h5>
								        <?php 
								    	endif; ?> 

										<?php 
										if (!empty($title)) : ?>
							                <h2 class="sec-title tp-el-title"><?php print wp_kses_post( $title ); ?></h2>
							            <?php 
							        	endif; ?> 
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-xl-3 col-lg-4">
		                    	<?php if (!empty($link['url'])) : ?>
			                        <div class="section-button section-button-left mb-30">
			                            <a class="btn btn-icon btn-icon-dark ml-0" <?php echo $this->get_render_attribute_string( 'link' ); ?>><span><?php print esc_html_e('+', 'bdevs-elementor'); ?></span> <?php echo esc_html($settings['link_text']); ?></a>
			                        </div>
			                    <?php endif; ?>
		                    </div>
		                </div>
		            </div>
		        </section> 

        <?php endif; ?>
	<?php
	}

}