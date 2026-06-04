<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsAboutInfo extends \Elementor\Widget_Base {

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
		return 'bdevs-about-info';
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
		return __( 'About Info', 'bdevs-elementor' );
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
		return [ 'about info' ];
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

	protected function _register_controls() {
		$this->start_controls_section(
			'info_style_about_section',
			[
				'label' => esc_html__( 'About Info Style', 'bdevs-elementor' ),
			]	
		);


		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'style_01'  => esc_html__( 'Full Width', 'bdevs-elementor' ),
					'style_02' => esc_html__( 'Blox Layout', 'bdevs-elementor' ),
				],
				'default'   => ['style_01'],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'left_about_section',
			[
				'label' => esc_html__( 'Left About', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'image_left',
			[
				'label'   => esc_html__( 'About Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'left_sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['style_01'],
				],
			]
		);		

		$this->add_control(
			'left_heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your about text', 'bdevs-elementor' ),
				'default'     => __( 'About Content Here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'left_link_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_link',
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
		*	left content list section 
		**/
		$this->start_controls_section(
			'left_content_lists_section',
			[
				'label' => esc_html__( 'Left Lists', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['style_01']
				]
			]
		);


		$this->add_control(
			'tab_left_lists',
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
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();	

		$this->start_controls_section(
			'right_about_section',
			[
				'label' => esc_html__( 'Right About', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'image_right',
			[
				'label'   => esc_html__( 'About Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'right_sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['style_01'],
				]
			]
		);		

		$this->add_control(
			'right_heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'right_desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your about text', 'bdevs-elementor' ),
				'default'     => __( 'About Content Here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'right_link_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'right_link',
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
		*	Right content list section 
		**/
		$this->start_controls_section(
			'right_content_lists_section',
			[
				'label' => esc_html__( 'Right Lists', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['style_01'],
				]
			]
		);

		$this->add_control(
			'tab_right_lists',
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
						'label_block' => true,
					],
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

		$image_left_src = wp_get_attachment_image_src( $image_left['id'], 'full' );
		$image_left_url = $image_left_src ? $image_left_src[0] : '';

		$image_right_src = wp_get_attachment_image_src( $image_right['id'], 'full' );
		$image_right_url = $image_right_src ? $image_right_src[0] : '';	

		$this->add_render_attribute(
			[
				'left_link' => [
					'class' => [
						'btn btn-icon btn-icon-green ml-0',
					],
					'href'   => $settings['left_link']['url'] ? esc_url($settings['left_link']['url']) : '#',
					'target' => $settings['left_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		$this->add_render_attribute(
			[
				'right_link' => [
					'class' => [
						'btn btn-icon ml-0',
					],
					'href'   => $settings['right_link']['url'] ? esc_url($settings['right_link']['url']) : '#',
					'target' => $settings['right_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	?>		

	<?php if( $chose_style == 'style_01' ): ?>
        <section class="hiring-area pos-rel">
            <div class="hiring-top">
                <div class="hire-left-img" style="background-image:url(<?php print esc_url($image_left_url); ?>)"></div>
                <div class="container-fluid pl-0 pr-0">
                    <div class="row no-gutters">
                        <div class="col-xl-6 offset-xl-6 offset-lg-4">
                            <div class="hire-text hire-text-2">
                                <div class="about-title mb-20">
	                                <?php if (!empty($settings['left_sub_heading'])) : ?>
									<h5><?php echo wp_kses_post($settings['left_sub_heading']); ?></h5>
									<?php endif; ?>	 

									<?php if (!empty($settings['left_heading'])) : ?>
									<h2 class="sec-title"><?php echo wp_kses_post($settings['left_heading']); ?></h2>
									<?php endif; ?>	
                                </div>
                                <div class="about-text">
                                    <p><?php echo wp_kses_post($settings['left_desc']); ?></p>
                                </div>
                                <ul class="professinals-list pt-10 pb-20">             
 									<?php foreach ( $settings['tab_left_lists'] as $item ) : 
										extract($item);
									?>
			                            <li><i class="fa fa-check"></i><span><?php print wp_kses_post($title); ?></span></li>
				                    <?php endforeach; ?>
                                </ul>

                                <?php if (( ! empty( $settings['left_link']['url'] )) ): ?>
	                            <div class="hiring-button">
									<a <?php echo $this->get_render_attribute_string( 'left_link' ); ?>><span>+</span> <?php echo esc_html($settings['left_link_text']); ?></a>
	                            </div>
	                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hiring-bottom pos-rel">
                <div class="hire-right-img" style="background-image:url(<?php print esc_url($image_right_url); ?>)"></div>
                <div class="container-fulid pl-0 pr-0">
                    <div class="row no-gutters">
                        <div class="col-xl-6 col-lg-8">
                            <div class="hire-text hire-text-2">
                                <div class="about-title mb-20">
                                    <?php if (!empty($settings['right_sub_heading'])) : ?>
									<h5><?php echo wp_kses_post($settings['right_sub_heading']); ?></h5>
									<?php endif; ?>	 

									<?php if (!empty($settings['right_heading'])) : ?>
									<h2 class="sec-title"><?php echo wp_kses_post($settings['right_heading']); ?></h2>
									<?php endif; ?>
                                </div>
                                <div class="about-text">
                                    <p style="<?php print esc_attr( $desc_font_size ); ?>;  <?php print esc_attr( $desc_color ); ?>;"><?php echo wp_kses_post($settings['right_desc']); ?></p>
                                </div>
                                <ul class="professinals-list pt-10 pb-20">
                                    <?php foreach ( $settings['tab_right_lists'] as $item ) : 
										extract($item);
									?>
			                            <li><i class="fa fa-check"></i><span><?php print wp_kses_post($title); ?></span></li>
				                    <?php endforeach; ?>
                                </ul>

                                <?php if (( ! empty( $settings['right_link']['url'] )) ): ?>
	                            <div class="hiring-button">
			                        <a <?php echo $this->get_render_attribute_string( 'right_link' ); ?>><span>+</span> <?php echo esc_html($settings['right_link_text']); ?></a>
	                            </div>
	                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'style_02' ): ?>
        <section class="hiring-area">
            <div class="container">
                <div class="row no-gutters hire-bg-2">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-img">
                            <img class="img" src="<?php print esc_url($image_left_url); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-text">
							<?php if (!empty($settings['left_heading'])) : ?>
							<h2 class="sec-title"><?php echo wp_kses_post($settings['left_heading']); ?></h2>
							<?php endif; ?>	
                            <p style="<?php print esc_attr( $desc_font_size ); ?>;  <?php print esc_attr( $desc_color ); ?>;"><?php echo wp_kses_post($settings['left_desc']); ?></p>

                            <a <?php echo $this->get_render_attribute_string( 'left_link' ); ?>><span>+</span> <?php echo esc_html($settings['left_link_text']); ?></a>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters hire-bg">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-text">
                            <?php if (!empty($settings['right_heading'])) : ?>
								<h2 class="sec-title"><?php echo wp_kses_post($settings['right_heading']); ?></h2>
							<?php endif; ?>
                            <p><?php echo wp_kses_post($settings['right_desc']); ?></p>

                            <a <?php echo $this->get_render_attribute_string( 'right_link' ); ?>><span>+</span> <?php echo esc_html($settings['right_link_text']); ?></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-img">
                            <img class="img" src="<?php print esc_url($image_right_url); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php endif; ?>	
	<?php
	}

}