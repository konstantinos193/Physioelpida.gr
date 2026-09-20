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
class BdevsBrand extends \Elementor\Widget_Base {

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
		return 'bdevs-brand';
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
		return __( 'Brands', 'bdevs-elementor' );
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
		return [ 'brand' ];
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
				'label' => esc_html__( 'Brands', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'brand-style-1'  => esc_html__( 'Brand Style 1', 'bdevs-elementor' ),
					'brand-style-2' => esc_html__( 'Brand Style 2', 'bdevs-elementor' ),
					'brand-style-3' => esc_html__( 'Brand Style 3', 'bdevs-elementor' ),
				],
				'default'   => 'brand-style-1',
			]
		);

		$this->add_control(
			'background_bg',
			[
				'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add background image from here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Brand Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Brand #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'Project Complate', 'bdevs-elementor' ),
					],
				],
				'fields' => [			
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Brand Logo', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Upload Brand Logo from here', 'bdevs-elementor' ),
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
	$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
	$bg_url = $bg_src ? $bg_src[0] : '';

	if( $chose_style == 'brand-style-1' ): ?>
	    <section class="brand-areas pos-rel">
            <div class="container">
                <div class="row">
                    <div class="brand-active owl-carousel">
                   	<?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>

	                    <div class="single-brand">
							<?php
							if ( '' !== $icon['id'] )  :  
								$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
								$image_url = $image_src ? $image_src[0] : '';
							?>                        	
                            <img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
							<?php endif; ?>
	  					</div>
	                <?php
					endforeach;
					?>
                    </div>
                </div>
            </div>
        </section>
	<?php elseif ( $chose_style == 'brand-style-2' ) : ?>
        <!-- brand-area start -->
        <section class="h4brand-area pos-rel">
            <div class="container">
                <div class="row">
                    <div class="brand-active owl-carousel">
	                   	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
							extract($item);
							?>

		                    <div class="single-brand">
								<?php
								if ( '' !== $icon['id'] )  :  
									$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
									$image_url = $image_src ? $image_src[0] : '';
								?>                        	
	                            <img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
								<?php endif; ?>
		  					</div>

		                <?php
						endforeach;
						?>

                    </div>
                </div>
            </div>
        </section>
        <!-- brand-area end -->
    <?php elseif ( $chose_style == 'brand-style-3' ) : ?>
       <section class="feature_brand-area pos-rel">
            <div class="container">
                <div class="row">
                    <div class="brand-active owl-carousel">
                   	<?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>

	                    <div class="single-brand">
							<?php
							if ( '' !== $icon['id'] )  :  
								$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
								$image_url = $image_src ? $image_src[0] : '';
							?>                        	
                            <img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
							<?php endif; ?>
	  					</div>
	                <?php
					endforeach;
					?>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>	
	<?php
	}

}