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
class BdevsCarousel extends \Elementor\Widget_Base {

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
		return 'bdevs-carousel';
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
		return __( 'Carousel', 'bdevs-elementor' );
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
		return [ 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_html__( 'Heading Section', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'carousel-style-1'  => esc_html__( 'Carousel Style 1', 'bdevs-elementor' ),
					'carousel-style-2' => esc_html__( 'Carousel Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'carousel-style-1',
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'	=> __( 'It is sub heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Type section title here', 'bdevs-elementor' ),
				'default'	=> __( 'It is heading', 'bdevs-elementor' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_sliders',
			[
				'label' => esc_html__( 'Gallery Slider', 'bdevs-elementor' ),
			]
		);

		$this->add_control(

			'tabs',
			[
				'label' => esc_html__( 'Tab Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Tab #1', 'bdevs-elementor' ),
					]
				],
				'fields' => [	
				    [
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Tab Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],		
					[
						'name'       => 'tab_er_title',
						'label'      => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Title here....', 'bdevs-elementor' ),
						'placeholder'    => esc_html__( 'Enter Title here....', 'bdevs-elementor' ),
						'show_label' => true,
						'label_block' => true
					],	
					[
						'name'       => 'tab_er_content',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Content here....', 'bdevs-elementor' ),
						'placeholder'    => esc_html__( 'Enter Content here....', 'bdevs-elementor' ),
						'show_label' => true,
						'label_block' => true
					],
					[
						'name'       => 'tab_url',
						'label'      => esc_html__( 'URL', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '#', 'bdevs-elementor' ),
						'placeholder'    => esc_html__( 'URL here....', 'bdevs-elementor' ),
						'show_label' => true,
						'label_block' => true
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

		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__( 'Show Title', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_sub_title',
			[
				'label'   => esc_html__( 'Show Sub Title', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->end_controls_section();

				/** typography **/
		$this->start_controls_section(
			'typography_section',
			[
				'label' => esc_html__( 'Custom Typography', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading_font_size',
			[
				'label'       => __( 'Sub Heading Font Size', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter font size here', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'sub_heading_line_height',
			[
				'label'       => __( 'Sub Heading Line Height', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Line Height here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading_color',
			[
				'label'       => __( 'Sub Heading Color', 'bdevs-elementor' ),
				'type'        => Controls_Manager::COLOR,
				'placeholder' => __( 'Enter Color Code', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'divider-10',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'heading_font_size',
			[
				'label'       => __( 'Heading Font Size', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter font size here', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'heading_line_height',
			[
				'label'       => __( 'Heading Line Height', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Line Height here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label'       => __( 'Heading Color', 'bdevs-elementor' ),
				'type'        => Controls_Manager::COLOR,
				'placeholder' => __( 'Enter Color Code', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'divider-200',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


		$this->add_control(
			'desc_font_size',
			[
				'label'       => __( 'Description Font Size', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter font size here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'       => __( 'Description Color', 'bdevs-elementor' ),
				'type'        => Controls_Manager::COLOR,
				'placeholder' => __( 'Enter Color Code', 'bdevs-elementor' ),
			]
		);

		$this->end_controls_section();

	}

	public function render() {
	$settings  = $this->get_settings_for_display(); 
	extract($settings);	

	if( $chose_style == 'carousel-style-1' ): ?>

        <!-- Photo Gallery  -->
        <section class="photogallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-title mb-65">
                            <?php 
                            if (!empty($sub_title)) : ?> 
                                <h5><?php print wp_kses_post( $sub_title ); ?></h5>
                            <?php 
                        	endif; ?> 

                            <?php 
                            if (!empty($title)) : ?>
                                <h2 class="sec-title"><?php print wp_kses_post( $title ); ?></h2>
                            <?php 
                        	endif; ?> 
                        </div>
                    </div>
                </div>
                <div class="row h4gallery-active">

                   	<?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>
	                    <div class="col-lg-6">
	                        <div class="gallery-box pos-rel">
		                        <?php
								if ( '' !== $tab_image['id'] )  :  
									$image_src = wp_get_attachment_image_src( $tab_image['id'], 'full' );
									$image_url = $image_src ? $image_src[0] : '';
								?>                        	
	                            	<img src="<?php print esc_url($image_url); ?>" alt="<?php print esc_attr($tab_er_title); ?>">
								<?php endif; ?>

	                            <div class="gallery-content">
	                                <h2 class="f-600 theme-color"><?php print wp_kses_post($tab_er_title); ?></h2>
	                            </div>
	                        </div>
	                    </div>
                    <?php
					endforeach;
					?>

                </div>
            </div>
        </section>
        <!-- Photo Gallery end -->
		<?php elseif( $chose_style == 'carousel-style-2' ): ?>
        <!-- Photo Gallery  -->
        <section class="photogallery">
            <div class="container-fluid">
                <div class="row gallery-slider-active">
                   	<?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>
	                    <div class="col-lg-4">
	                        <div class="gallery-item-box">
		                        <?php
								if ( '' !== $tab_image['id'] )  :  
									$image_src = wp_get_attachment_image_src( $tab_image['id'], 'full' );
									$image_url = $image_src ? $image_src[0] : '';
								?>                        	
	                            	<a class="popup-active" href="<?php print esc_url($image_url); ?>"><img src="<?php print esc_url($image_url); ?>" alt="<?php print esc_attr($tab_er_title); ?>"></a>
								<?php endif; ?>

	                            <div class="gallery-item-content">
	                                <h3 class="gallery-item-title"><a href="<?php print wp_kses_post( $item['tab_url'] ); ?>"><?php print wp_kses_post($tab_er_title); ?></a></h3>
	                                <p><?php print wp_kses_post( $item['tab_er_content'] ); ?></p>
	                            </div>
	                        </div>
	                    </div>
                    <?php
					endforeach;
					?>

                </div>
            </div>
        </section>
        <!-- Photo Gallery end -->

		<?php 
		endif; ?>	
	<?php
	}

}