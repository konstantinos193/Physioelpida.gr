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
class BdevsFaq extends \Elementor\Widget_Base {

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
		return 'bdevs-faq';
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
		return __( 'FAQs', 'bdevs-elementor' );
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
		return [ 'faq' ];
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
				'label' => esc_html__( 'Section Faq Heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'faq-style-1'  => esc_html__( 'FAQ Style 1', 'bdevs-elementor' ),
					'faq-style-2' => esc_html__( 'FAQ Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'faq-style-1',
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
			'section_content_faq',
			[
				'label' => esc_html__( 'FAQ', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'image-back',
			[
				'label'   => esc_html__( 'Back Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your FAQ Back Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'image-front',
			[
				'label'   => esc_html__( 'Front Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your FAQ Front Image', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'FAQ Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'FAQ One', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'FAQ Content', 'bdevs-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'FAQ Two', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'FAQ Content', 'bdevs-elementor' ),
					],
				],
				'fields' => [			
					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Faq Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],									
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Faq Content', 'bdevs-elementor' ),
						'show_label' => false,
					]
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
		extract($settings);

		$back_src = wp_get_attachment_image_src( $settings['image-back']['id'], 'full' );
		$back_url = $back_src ? $back_src[0] : '';	

		$front_src = wp_get_attachment_image_src( $settings['image-front']['id'], 'full' );
		$front_url = $front_src ? $front_src[0] : '';

		if( $chose_style == 'faq-style-1' ): ?>
	        <div class="section-faq-area">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-6 col-lg-4 d-lg-none d-xl-block">
	                        <div class="faq-left-box pos-rel mb-200">
	                        	<?php if (!empty($back_url)) : ?>
	                            <div class="faq-left-img">
	                                <img class="img" src="<?php print esc_url( $back_url ); ?>" alt="FAQ Back">
	                            </div>
	                        	<?php endif; ?>	
	                        	<?php if (!empty($front_url)) : ?>
	                            <div class="faq-pos-front">
	                                <img class="img" src="<?php print esc_url( $front_url ); ?>" alt="FAQ Front">
	                            </div>
	                            <?php endif; ?>	
	                            <div class="faq-back-shape">
	                                <img class="img" src="<?php print get_template_directory_uri(); ?>/img/shape/faq-left-back-shape.png" alt="">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xl-6 col-lg-12">
	                        <div class="about-title mb-45">
	                            <?php 
	                            if (!empty($settings['sub_heading'])) : ?>
									<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php 
								endif; ?>	
								
								<?php 
								if (!empty($settings['heading'])) : ?>
									<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
								<?php 
								endif; ?>
	                        </div>
	                        <div class="faq-right-box">
	                            <div id="accordion" class="mt-40">
								<?php 
								foreach ( $settings['tabs'] as $key => $item ) :
									$active_class = ($key == 1 ) ? '' : 'collapsed';
									$show = ($key == 1 ) ? 'show' : '';
									?>
	                                <div class="card">
	                                    <div class="card-header" id="heading<?php print esc_attr($key); ?>">
	                                        <h5 class="mb-0">
	                                        	<?php if ( '' !== $item['tab_title'] ) : ?>
	                                            <a href="#" class="btn-link <?php print esc_attr($active_class); ?>" data-toggle="collapse" data-target="#collapse<?php print esc_attr($key); ?>"
	                                                aria-expanded="false" aria-controls="collapse<?php print esc_attr($key); ?>">
	                                                <?php echo wp_kses_post($item['tab_title']); ?>
	                                            </a>
	                                        	<?php endif; ?>
	                                        </h5>
	                                    </div>
	                                    <div id="collapse<?php print esc_attr($key); ?>" class="collapse <?php print esc_attr($show); ?>" aria-labelledby="heading<?php print esc_attr($key); ?>" data-parent="#accordion">
	                                        <div class="card-body">
	                                            <p><?php echo wp_kses_post($item['tab_content']); ?></p>
	                                        </div>
	                                    </div>
	                                </div>
									<?php
									endforeach;
									?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php elseif( $chose_style == 'faq-style-2' ): ?>
	        <div class="section-faq-area style-2">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-6 col-lg-4 d-lg-none d-xl-block">
	                    	<?php if (!empty($back_url)) : ?>
	                        <div class="faq-image">
	                            <img class="img" src="<?php print esc_url( $front_url ); ?>" alt="FAQ Front">
	                        </div>
	                        <?php endif; ?>
	                    </div>
	                    <div class="col-xl-6 col-lg-12">
	                        <div class="about-title mb-45">
	                            <?php if (!empty($settings['sub_heading'])) : ?>
									<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php endif; ?>	
								
								<?php if (!empty($settings['heading'])) : ?>
									<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
								<?php endif; ?>
	                        </div>
	                        <div class="faq-right-box">
	                            <div id="accordion" class="mt-40">
								<?php 
								foreach ( $settings['tabs'] as $key => $item ) :
									$active_class = ($key == 1 ) ? '' : 'collapsed';
									$show = ($key == 1 ) ? 'show' : '';
									?>
	                                <div class="card">
	                                    <div class="card-header" id="heading<?php print esc_attr($key); ?>">
	                                        <h5 class="mb-0">
	                                        	<?php if ( '' !== $item['tab_title'] ) : ?>
	                                            <a href="#" class="btn-link <?php print esc_attr($active_class); ?>" data-toggle="collapse" data-target="#collapse<?php print esc_attr($key); ?>"
	                                                aria-expanded="false" aria-controls="collapse<?php print esc_attr($key); ?>"><i class="fal fa-angle-double-right"></i> <?php echo wp_kses_post($item['tab_title']); ?>
	                                            </a>
	                                        	<?php endif; ?>
	                                        </h5>
	                                    </div>
	                                    <div id="collapse<?php print esc_attr($key); ?>" class="collapse <?php print esc_attr($show); ?>" aria-labelledby="heading<?php print esc_attr($key); ?>" data-parent="#accordion">
	                                        <div class="card-body">
	                                            <p><?php echo wp_kses_post($item['tab_content']); ?></p>
	                                        </div>
	                                    </div>
	                                </div>
									<?php
									endforeach;
									?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php 
        endif; ?>	
	<?php
	}

}