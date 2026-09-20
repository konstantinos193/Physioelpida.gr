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
class BdevsSubscribe extends \Elementor\Widget_Base {

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
		return 'bdevs-subscribe';
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
		return __( 'Subscribe', 'bdevs-elementor' );
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
		return [ 'subscribe' ];
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
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title Here...', 'bdevs-elementor' ),
				'default'		=> __('It is title', 'bdevs-elementor'),
				'placeholder'	=> __('Subscribe For Get Update', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subtitle Here...', 'bdevs-elementor' ),
				'default'		=> __('It is subtitle', 'bdevs-elementor'),
				'placeholder'		=> __('Subscribe For Get Update', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'desc',
			[
				'label'       => esc_html__( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'get a consultant', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Enter the content', 'bdevs-elementor' ),
				'default'		=> __('it is content', 'bdevs-elementor')
			]
		);

		$this->add_control(
			'background_bg',
			[
				'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Background Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label'   => esc_html__( 'Shortcode', 'bdevs-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Subscribe shortcode here', 'bdevs-elementor' ),
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
		extract( $settings);

	   	$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url = $bg_src ? $bg_src[0] : ''; 
	   	?>
        <section class="news-letter-area" data-background="<?php print esc_url($bg_url); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-6 col-lg-8 offset-lg-4">
                        <div class="news-letter-box">
                            <div class="about-title news-letter-title mb-20">
                            	<?php if (!empty($sub_title)) : ?>
					                <h5><?php print wp_kses_post( $sub_title ); ?></h5>
					            <?php endif; ?> 

					            <?php if (!empty($title)) : ?>
					                <h2 class="sec-title"> <?php print wp_kses_post( $title ); ?></h2>
					            <?php endif; ?> 
                            </div>
                            <?php if (!empty($desc)) : ?>
                            <div class="news-letter-text mb-30">
                                <p><?php print wp_kses_post( $desc ); ?></p>
                            </div>
                            <?php endif; ?>
                            <div class="subscribe-form">
                            	<?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php
	}

}