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
class BdevsMedical extends \Elementor\Widget_Base {

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
		return 'bdevs-medical';
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
		return __( 'Medical', 'bdevs-elementor' );
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
		return [ 'medical' ];
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
				],
				'fields' => [			
					[
						'name'        => 'tab_menu_title',
						'label'       => esc_html__( 'Menu Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Faq Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],	
					[
						'name'        => 'tab_menu_icon',
						'label'       => esc_html__( 'Menu Logo', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Upload Brand Logo from here', 'bdevs-elementor' ),
					],				
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
						'type'       => Controls_Manager::WYSIWYG,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Description', 'bdevs-elementor' ),
						'show_label' => false,
					],
					[
						'name'        => 'tab_image',
						'label'       => esc_html__( 'Image', 'bdevs-elementor' ),
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

		$back_src = wp_get_attachment_image_src( $settings['image-back']['id'], 'full' );
		$back_url = $back_src ? $back_src[0] : '';	

		$front_src = wp_get_attachment_image_src( $settings['image-front']['id'], 'full' );
		$front_url = $front_src ? $front_src[0] : '';

		?>
        <!-- Medical Tab  -->
        <div class="medical-tab medical-tab-border">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="h5medical-tab-menu">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            	<?php 
								foreach ( $settings['tabs'] as $key => $item ) :
									$active_class = ($key == 1 ) ? '' : 'collapsed';
									$show = ($key == 1 ) ? 'show active' : '';	
									?>
                                    <a class="nav-item nav-link <?php print esc_attr( $show ); ?>" id="nav-home-tab-<?php print esc_attr( $item['_id'] ); ?>" data-toggle="tab" href="#nav-home-<?php print esc_attr( $item['_id'] ); ?>" role="tab" aria-controls="nav-home-<?php print esc_attr( $item['_id'] ); ?>" aria-selected="true">
                                    <i>
		                                <?php
										if ( '' !== $item['tab_menu_icon']['id'] )  :  
											$image_src = wp_get_attachment_image_src( $item['tab_menu_icon']['id'], 'full' );
											$menu_image_url = $image_src ? $image_src[0] : '';
										?>                        	
			                            <img src="<?php print esc_url($menu_image_url); ?>" alt="<?php print wp_kses_post($item['tab_title']); ?>">
										<?php endif; ?>
                                    </i> <?php echo wp_kses_post($item['tab_menu_title']); ?></a>
								<?php
								endforeach;
								?>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="h5medical-tab-body">
                            <div class="tab-content" id="nav-tabContent">
                            	<?php
								foreach ( $settings['tabs'] as $key => $item ) :
									$active_class = ($key == 1 ) ? '' : 'collapsed';
									$show = ($key == 1 ) ? 'show active' : ''; 
									?>
	                                <div class="tab-pane fade <?php print esc_attr( $show ); ?>" id="nav-home-<?php print esc_attr( $item['_id'] ); ?>" role="tabpanel" aria-labelledby="nav-home-tab-<?php print esc_attr( $item['_id'] ); ?>">
	                                    <div class="row">
	                                        <div class="col-lg-6">
	                                            <div class="h5medical__thumb mb-30">
				                                    <?php
													if ( '' !== $item['tab_image']['id'] )  :  
														$tab_image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
														$tab_image_url = $tab_image_src ? $tab_image_src[0] : '';
													?>                        	
						                            <img src="<?php print esc_url($tab_image_url); ?>" alt="<?php print wp_kses_post($item['tab_title']); ?>">
													<?php endif; ?>
	                                            </div>
	                                        </div>
	                                        <div class="col-lg-6">
	                                            <div class="h5medical-content mb-30">
	                                                <h4 class="f-600"><?php echo wp_kses_post($item['tab_title']); ?></h4>
	                                                <?php echo wp_kses_post($item['tab_content']); ?>
	                                            </div>
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
        <!-- Medical Tab end -->
	<?php
	}

}