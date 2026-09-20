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
class BdevsWhatwedo  extends \Elementor\Widget_Base {

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
		return 'whatwe_do';
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
		return __( 'What We Do ', 'bdevs-elementor' );
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
		return [ 'whatwedo ', 'service' ];
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
			]
		);
		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your prefix Heading', 'bdevs-elementor' ),
				'default'     => __( 'Awesome Features', 'bdevs-elementor' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_wedo',
			[
				'label' => esc_html__( 'Waht We Do', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'wedo_tabs',
			[
				'label' => esc_html__( 'Waht We Do Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Waht We Do #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Waht We Do #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
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
						'show_label' => false,
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
				'default'      => 'left',
			]
		);

		$this->add_control(
			'show_button',
			[
				'label'   => esc_html__( 'Show Button', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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

		$this->end_controls_section();


	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract( $settings);
		?>

        <!-- services-area start -->
        <section class="servcies-area">
            <div class="container">
                <div class="row">
				<?php $counter = 1; ?>
				<?php foreach ( $settings['wedo_tabs'] as $item ) : ?>

					<?php 
					$this->add_render_attribute(
						[
							'wedo-link' => [
								'class' => [
									'service-link',
								],
								'href'   => $item['tab_link']['url'] ? esc_url($item['tab_link']['url']) : '#',
								'target' => $item['tab_link']['is_external'] ? '_blank' : '_self'
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
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="service-box service-box-2 mb-30 pos-rel">
                            <div class="service-thumb">
                                <img src="<?php print esc_url($image); ?>" alt="">
                            </div>
                            <div class="service-content service-content-2">
								<?php 
								if (!empty($item['tab_sub_title'])) : ?>
									<h6 class="green-color text-up-case letter-spacing mb-20">
										<?php echo wp_kses_post($item['tab_sub_title']); ?>
									</h6>
								<?php 
								endif; ?>	
								<?php 
								if (!empty($item['tab_title'])) : ?>
									<h3><?php echo wp_kses_post($item['tab_title']); ?></h3>
								<?php 
								endif; ?>

                                <?php 
                                if ( '' !== $item['tab_content'] ) : ?>
									<p>
										<?php echo $this->parse_text_editor( $item['tab_content'] ); ?>
									</p>
								<?php 
								endif; ?>

								<?php 
								if ( ! empty( $item['tab_link']['url'] )): ?>
                                    <a <?php echo $this->get_render_attribute_string( 'wedo-link' ); ?>>
                                    	<?php echo esc_html($settings['button_text']); ?> <i class="fas fa-angle-double-right"></i>
                                    </a>
								<?php 
								endif; ?>
                            </div>
                            <div class="service-number">
                                <h2 class="service-big-number">0<?php print esc_html__($counter,'bdevs-elementor'); ?></h2>
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
        <!-- services-area end -->

	<?php
	}

}
