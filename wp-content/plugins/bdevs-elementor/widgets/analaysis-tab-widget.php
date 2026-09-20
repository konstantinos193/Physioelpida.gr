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
class Bdevs_analysis_tab  extends \Elementor\Widget_Base {

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
		return 'analysis_tab_widget';
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
		return __( 'Analysis Tab', 'bdevs-elementor' );
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
		return [ 'bdevs-elementor' ];
	}

	public function get_keywords() {
		return [ 'analysis' ];
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
			'section_content_wedo',
			[
				'label' => esc_html__( 'Analysis Tab', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'analysis_tabs',
			[
				'label' => esc_html__( 'Analysis Tab Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Analysis #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Analysis #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'analysis_menu',
						'label'       => esc_html__( 'Analysis Menu', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Industry analysis' , 'bdevs-elementor' ),
						'label_block' => true,
					],	
					[
						'name'    => 'tab_image_icon',
						'label'   => esc_html__( 'Tab Icon Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],				
					[
						'name'        => 'tab_sub_title',
						'label'       => esc_html__( 'Sub Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Its Sub Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],					
					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Its Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Its Content', 'bdevs-elementor' ),
						'show_label' => true,
					],
					[
						'name'        => 'tab_link',
						'label'       => esc_html__( 'Link Left Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::URL,
						'dynamic'     => [ 'active' => true ],
						'placeholder' => 'http://your-link.com',
						'default'     => [
							'url' => '#',
						],
					],
					[
						'name'        => 'tab_button_text',
						'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Make Appointment', 'bdevs-elementor' ),
						'placeholder' => esc_html__( 'Make Appointment', 'bdevs-elementor' ),
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


		$this->add_control(
			'show_image',
			[
				'label'   => esc_html__( 'Show Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->end_controls_section();


	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract( $settings );

		?>

        <!-- analysis-area start -->
        <section class="analysis-area pos-rel theme-bg pb-90">
            <div class="analysis-bg-icon">
                <img src="<?php print get_template_directory_uri(); ?>/img/analysis/analysis-bg-icon.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav nav-pills mb-65" id="pills-tab" role="tablist">
						<?php $counter = 1; ?>
						<?php foreach ( $settings['analysis_tabs'] as  $key => $item ) : ?>
							<?php 
							$tab_active = ($key == 0 ) ? 'active' : '';
							?>

							<?php 
						   	if ( '' !== $item['tab_image_icon'] )  : 
						   		$image_src = wp_get_attachment_image_src( $item['tab_image_icon']['id'], 'full' );
								$image_icon = $image_src ? $image_src[0] : ''; 
						   		?>
							<?php 
							endif; ?>
                            <li class="nav-item">
                                <a class="nav-link <?php print $tab_active; ?>" id="pills-home-<?php print esc_attr($key); ?>" data-toggle="pill" href="#pills-<?php print esc_attr($key); ?>" role="tab"
                                    aria-controls="pills-<?php print esc_attr($key); ?>" aria-selected="true">

                                    <img src="<?php print esc_url($image_icon); ?>" alt="">
                                    <h6><?php echo wp_kses_post($item['analysis_menu']); ?></h6>
                                    
                                </a>
                            </li>
                            <?php
							$counter++;
							endforeach;
							?> 
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tab-content" id="pills-tabContent">
						<?php $counter_content = 1; ?>
						<?php foreach ( $settings['analysis_tabs'] as  $key => $item ) : ?>

							<?php 
							$tab_pane_active = ($key == 0 ) ? 'show active' : '';
							$this->add_render_attribute(
								[
									'wedo-link' => [
										'class' => [
											'btn btn-icon ml-0',
										],
										'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
										'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
									]
								], '', '', true
							);
						   	if ( '' !== $item['tab_image'] )  : 
						   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
								$image = $image_src ? $image_src[0] : ''; 
						   		?>
							<?php 
							endif; ?>
                            <div class="tab-pane fade  <?php print $tab_pane_active; ?>" id="pills-<?php print esc_attr($key); ?>" role="tabpanel" aria-labelledby="pills-home-<?php print esc_attr($key); ?>">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="section-title pos-rel mb-40">
                                            <div class="section-text section-text-white section-text-green pos-rel">
												<?php if (!empty($item['tab_sub_title'])) : ?>
													<h5>
														<?php echo wp_kses_post($item['tab_sub_title']); ?>
													</h5>
												<?php endif; ?>	

												<?php if (!empty($item['tab_title'])) : ?>
													<h2 class="sec-title white-color"><?php echo wp_kses_post($item['tab_title']); ?></h2>
												<?php endif; ?>	

                                                <?php if ( !empty($item['tab_content']) ) : ?>
													<p>
														<?php echo $this->parse_text_editor( $item['tab_content'] ); ?>
													</p>
												<?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="section-button section-button-left mb-30">
										<?php if (!empty($item['tab_link']['url'])): ?>
		                                    <a <?php echo $this->get_render_attribute_string( 'wedo-link' ); ?>>
		                                    	<span><?php print esc_html_e('+', 'bdevs-elementor'); ?> </span> <?php echo wp_kses_post($item['tab_button_text']); ?>
		                                    </a>
										<?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4">
                                        <div class="analysis-chart mb-30">
                                            <img src="<?php print esc_url($image); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
							$counter_content++;
							endforeach;
							?> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- analysis-area end -->

	<?php
	}

}
