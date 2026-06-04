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
class BdevsBtn extends \Elementor\Widget_Base {

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
		return 'bdevs-btn';
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
		return __( 'Button Style', 'bdevs-elementor' );
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
		return 'eicon-post-title';
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
		return [ 'button', 'title' ];
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
			'design_style_section',
			[
				'label' => esc_html__( 'Design Style', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'style-1'  => esc_html__( 'Style 1', 'bdevs-elementor' ),
					'style-2' => esc_html__( 'Style 2', 'bdevs-elementor' ),
					'style-3' => esc_html__( 'Style 3', 'bdevs-elementor' ),
				],
				'default'   => 'style-1',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Button', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Make Appointment', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
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
		extract( $settings );

		$this->add_render_attribute(
			[
				'link' => [
					'class' => [
						'btn btn-icon ml-0',
					],
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		if( $chose_style == 'style-1' ): ?>
        <?php if (( ! empty( $settings['link']['url'] )) ): ?>
        <div class="section-button">
			<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
				<span>+</span> <?php echo esc_html($settings['link_text']); ?>
			</a>
        </div>
        <?php endif; ?>	


        <?php elseif( $chose_style == 'style-2' ): ?>
        <section class="about-area">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title section-title-m-0 mb-30 pos-rel text-right">
                            <div class="section-icon">
                                <img class="section-back-icon back-icon-right" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
                            </div>
                            <div class="section-text section-text-small pos-rel">
                                <?php 
                                if ( $settings['sub_heading']) : ?>
									<h5><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php 
								endif; ?>	

                                <?php 
                                if ($settings['heading']) : ?>
									<h2 class="sec-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
								<?php 
								endif; ?>	
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="facalty-text mb-30">
                        	<?php if (!empty($settings['sec_text'])) : ?>
								<p><?php echo wp_kses_post($settings['sec_text']); ?></p>
							<?php endif; ?>	
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif( $chose_style == 'style-3' ): ?>
            <div class="section-title pos-rel">

            	<?php if ( $settings['section_title_icon'] ) : ?>
                <div class="section-icon">
                    <img class="section-back-icon back-icon-left" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
                </div>
                <?php endif; ?>	
            	

                <div class="section-text pos-rel">
					<?php if (!empty( $settings['sub_heading'])) : ?>
					<h5><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
					<?php endif; ?>	

                    <?php if (!empty($settings['heading'])) : ?>
					<h2 class="sec-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
					<?php endif; ?>

					<?php if (!empty($settings['sec_text'])) : ?>
						<p><?php echo wp_kses_post($settings['sec_text']); ?></p>
					<?php endif; ?>		
                </div>
				<?php if ( $settings['section_title_line'] ) : ?>
                <div class="section-line pos-rel">
                    <img src="<?php print get_template_directory_uri(); ?>/img/shape/section-title-line.png" alt="">
                </div>
                <?php endif; ?>	
            </div>
        <?php endif; ?>		

	<?php
	}

}