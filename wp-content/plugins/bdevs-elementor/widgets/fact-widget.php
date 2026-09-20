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
class BdevsFact extends \Elementor\Widget_Base {

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
		return 'bdevs-fact';
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
		return __( 'Fact', 'bdevs-elementor' );
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
		return [ 'fact' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_html__( 'Heading Section', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type section title here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
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
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_sliders',
			[
				'label' => esc_html__( 'Facts', 'bdevs-elementor' ),
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
						'name'        => 'fact_number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],					
					[
						'name'        => 'fact_icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],					
					[
						'name'        => 'fact_title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
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



	}

	public function render() {
	$settings  = $this->get_settings_for_display(); 
	extract($settings);

	$target = $appointment_link['is_external'] ? ' target="_blank"' : '';
	$nofollow = $appointment_link['nofollow'] ? ' rel="nofollow"' : '';


	?>
    <section class="fact-area fact-map primary-bg pos-rel pt-115 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <div class="section-title pos-rel mb-45">
                        <div class="section-text section-text-white pos-rel">
                            <?php 
                            if (!empty($title)) : ?>
                                <h5><?php print wp_kses_post( $title ); ?></h5>
                            <?php 
                        	endif; ?> 

                            <?php 
                            if (!empty($sub_title)) : ?>
                                <h2 class="sec-title"><?php print wp_kses_post( $sub_title ); ?></h2>
                            <?php 
                        	endif; ?> 
                        </div>
                    </div>
                    <?php 
                    if (!empty($appointment_link['url'])) : ?>
	                    <div class="section-button section-button-left mb-30">
	                        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url( $appointment_link['url'] ); ?>" <?php print esc_attr($target).' '.esc_attr($nofollow); ?> class="btn btn-icon ml-0"><span><?php print esc_html_e('+', 'bdevs-elementor'); ?></span><?php print esc_html_e('Make Appointment', 'bdevs-elementor'); ?></a>
	                    </div>
                    <?php 
                	endif; ?>
                </div>
                <div class="col-lg-6 col-lg-6 col-md-8">
                    <div class="cta-satisfied">
					<?php 
					foreach ( $settings['tabs'] as $item ) : 
						extract($item);
					?>
                        <div class="single-satisfied mb-50">
                            <h1><?php print $fact_number; ?></h1>
                            <h5> <i class="fas fa-<?php print esc_attr( $fact_icon ); ?>"></i> <?php print wp_kses_post($fact_title); ?></h5>
                			<?php if ( !empty($item['tab_content'])  ) : ?>
								<p><?php print wp_kses_post($this->parse_text_editor( $tab_content )); ?></p>
							<?php endif; ?>
                        </div>
                    <?php
					endforeach;
					?>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
	}

}