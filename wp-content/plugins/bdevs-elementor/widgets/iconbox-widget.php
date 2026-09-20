<?php
namespace BdevsElementor\Widget;
use \Elementor\Utils;
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
class BdevsIconbox extends \Elementor\Widget_Base {

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
		return 'bdevs-icon-box';
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
		return __( 'Icon Box', 'bdevs-elementor' );
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
		return [ 'Icon Box' ];
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
			'info_style_section',
			[
				'label' => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]	
		);


        $this->add_control(
            'chose_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevs-elementor' ),
                    // 'style_2' => __( 'Style 2', 'bdevs-elementor' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'iconbox_info',
			[
				'label' => esc_html__( 'Icon Box', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label'   => esc_html__( 'BG Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add BG Image', 'bdevs-elementor' ),
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
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your about text', 'bdevs-elementor' ),
				'default'     => __( 'About Content Here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => __( 'Link', 'bdevs-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'bdevs-elementor' ),
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
				'default'      => 'left',
			]
		);		


		$this->end_controls_section();


	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);

		if (!empty($image['id'])) {
			$image = wp_get_attachment_image_url( $image['id'], 'full' );
		}

		if (!empty($bg_image['id'])) {
			$bg_image = wp_get_attachment_image_url( $bg_image['id'], 'full' );
		}

		

		$this->add_render_attribute(
			[
				'button_link' => [
					'class' => [
						'button-border',
					],
					'href'   => $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : '#',
					'target' => $settings['button_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		$this->add_render_attribute(
			[
				'heading_link' => [
					'class' => [
						'heading-link',
					],
					'href'   => $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : '#',
					'target' => $settings['button_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	?>		

		<?php if( $settings['chose_style'] == 'style_1' ) : ?>
		<div class="service-box icon-box text-center" style="background-image:url(<?php print esc_url($bg_image); ?>)">
			<div class="info-shape"></div>
			<?php if (( ! empty( $image )) ): ?>
            <div class="service-thumb">
                <img src="<?php print esc_url($image); ?>" alt="icon">
            </div>
            <?php endif; ?>
            <div class="service-content">
            	<?php if (( ! empty( $settings['heading'] )) ): ?>
                <h3><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h3>
                <?php endif; ?>
                <?php if (( ! empty( $settings['desc'] )) ): ?>
                <p><?php echo esc_html($settings['desc']); ?></p>
                <?php endif; ?>

                <?php if (( ! empty( $settings['button_link']['url'] )) ): ?>
                <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?>>
                	<?php echo wp_kses_post($settings['button_text']); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <?php elseif($settings['chose_style'] == 'style_02' ): ?>

		<?php endif; ?>
	<?php
	}

}