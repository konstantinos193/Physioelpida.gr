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
class BdevsPremiumMembership extends \Elementor\Widget_Base {

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
		return 'bdevs-premium-membership';
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
		return __( 'Premium Membership', 'bdevs-elementor' );
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
		return [ 'membership' ];
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
			'section_content_heading',
			[
				'label' => esc_html__( 'Section Heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your prefix Heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'background_bg',
			[
				'label'   => esc_html__( 'Background Map Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Backgrond Image', 'bdevs-elementor' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_memberships',
			[
				'label' => esc_html__( 'Membership', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'membership',
			[
				'label' => esc_html__( 'Member Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Member #1', 'bdevs-elementor' ),
					]
				],
				'fields' => [	
				    [
						'name'    => 'icon',
						'label'   => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],	
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Jon Haris' , 'bdevs-elementor' ),
						'label_block' => true,
						'show_label' => true,
					],		
					[
						'name'       => 'desc',
						'label'      => esc_html__( 'Description', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Description here....', 'bdevs-elementor' ),
						'placeholder'    => esc_html__( 'Enter Description here....', 'bdevs-elementor' ),
						'show_label' => true,
					],	
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'section_testimonials_mem',
			[
				'label' => esc_html__( 'Testimonials', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Testimonial Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Testimonial #1', 'bdevs-elementor' ),
					]
				],
				'fields' => [	
				    [
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],											
					[
						'name'        => 'tab_name',
						'label'       => esc_html__( 'Name', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Jon Haris' , 'bdevs-elementor' ),
						'label_block' => true,
					],					
					[
						'name'        => 'tab_designation',
						'label'       => esc_html__( 'Designation', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Designer' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'tab_desc',
						'label'      => esc_html__( 'Description', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Description here....', 'bdevs-elementor' ),
						'placeholder'    => esc_html__( 'Enter Description here....', 'bdevs-elementor' ),
						'label_block' => true,
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
			'section_title_icon',
			[
				'label'   => esc_html__( 'Section Title Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'section_title_line',
			[
				'label'   => esc_html__( 'Section Title Line', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();



	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract( $settings );
	   	$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url_map = $bg_src ? $bg_src[0] : ''; 

		?>

        <section class="membership-area membership-bg pt-120 pb-120 pos-rel">
            <div class="container">
                <div class="membership-box pt-115 pb-90 white-bg">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="section-title text-center pos-rel mb-70">
                            	<?php 
                            	if ( $settings['section_title_icon'] ) : ?>
	                                <div class="section-icon">
	                                    <img class="section-back-icon" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
	                                </div>
                                <?php 
                            	endif; ?> 

                                <div class="section-text pos-rel">
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

                                 <?php 
                                 if ( $settings['section_title_line'] ) : ?>
	                                <div class="section-line pos-rel">
	                                    <img src="<?php print get_template_directory_uri(); ?>/img/shape/section-title-line.png" alt="">
	                                </div>
                                <?php 
                            	endif; ?>	
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php foreach ( $settings['membership'] as $item ) : 
						extract($item);
						$bg_src = wp_get_attachment_image_src( $icon['id'], 'full' );
						$bg_url = $bg_src ? $bg_src[0] : ''; 
					?>
                        <div class="col-xl-6 col-lg-6">
                            <div class="single-membership-box mb-30">
                                <img class="member-ship-icon mb-25" src="<?php print esc_url( $bg_url ); ?>" alt="">
                                <h3 class="mb-20"><?php print wp_kses_post( $title ); ?></h3>
                                <img class="membership-line-shape" src="<?php print get_template_directory_uri(); ?>/img/icon/member-ship-line-shape.png" alt="">
                                <p><?php print wp_kses_post( $desc ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="membership-review member-ship-map gray-bg pos-rel" data-background="<?php print esc_url($bg_url_map); ?>">
                    <div class="test-active owl-carousel">

                    <?php foreach ( $settings['tabs'] as $testimonial ) : 
						extract($testimonial);
						$bg_src = wp_get_attachment_image_src( $tab_image['id'], 'full' );
						$bg_url = $bg_src ? $bg_src[0] : ''; 		
					?>
                        <div class="item">
                            <div class="review-box">
                                <div class="members-rating">
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="members-text">
                                    <p><?php print wp_kses_post( $tab_desc ); ?></p>
                                </div>
                                <div class="about-author d-flex align-items-center">
                                    <div class="author-ava">
                                        <img src="<?php echo esc_url($bg_url); ?>" alt="Author Image">
                                    </div>
                                    <div class="author-desination author-desination-2">
                                        <h4><?php print wp_kses_post( $tab_name ); ?></h4>
                                        <h6><?php print wp_kses_post( $tab_designation ); ?></h6>
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
        </section>
	<?php
	}

}