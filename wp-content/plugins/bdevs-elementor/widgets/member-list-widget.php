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
class BdevsMemberlist extends \Elementor\Widget_Base {

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
		return 'bdevs-member-list';
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
		return __( 'Member List', 'bdevs-elementor' );
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
		return [ 'Member List' ];
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


		// $this->start_controls_section(
		// 	'_member_style_section',
		// 	[
		// 		'label' => esc_html__( 'Chose Style', 'bdevs-elementor' ),
		// 		'tab' => Controls_Manager::TAB_CONTENT,
		// 	]	
		// );

		// $this->add_control(
		// 	'chose_style',
		// 	[
		// 		'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
		// 		'type'      => Controls_Manager::SELECT,
		// 		'options'   => [
		// 			'style_01'  => esc_html__( 'Style 01', 'bdevs-elementor' ),
		// 			'style_02' => esc_html__( 'Style 02', 'bdevs-elementor' ),
		// 		],
		// 		'default'   => ['style_01'],
		// 		'frontend_available' => true,
  //               'style_transfer' => true,
		// 	]
		// );

		// $this->end_controls_section();

		$this->start_controls_section(
			'member_list_info',
			[
				'label' => esc_html__( 'Member Item', 'bdevs-elementor' ),
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
			'designation',
			[
				'label'       => __( 'Designation', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your designation', 'bdevs-elementor' ),
				'default'     => __( 'Designation', 'bdevs-elementor' ),
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

		$this->start_controls_section(
			'member_social_info',
			[
				'label' => esc_html__( 'Member Social', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
            'facebook_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your facebook link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                

        $this->add_control(
            'twitter_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your twitter link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'instagram_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your instagram link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );       

        $this->add_control(
            'linkedin_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your linkedin link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'youtube_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'bdevselement' ),
                'placeholder' => __( 'Add your youtube link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
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

	<?php if( $settings['chose_style'] == 'style_1' ): ?>
		<div class="team-overlay">
			<?php if (( ! empty( $image )) ): ?>
            <div class="team-thumb">
                <img src="<?php print esc_url($image); ?>" alt="">
            </div>
            <?php endif; ?>
            <div class="team-overlay-info fix">
				<div class="team-inner-content">
					<?php if (( ! empty( $settings['heading'] )) ): ?>
	                <h3 class="memeber-title"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h3>
	                <?php endif; ?>
	                <?php if (( ! empty( $settings['designation'] )) ): ?>
	                <span class="m-designation"><?php echo esc_html($settings['designation']); ?></span>
	                <?php endif; ?>
	                <?php if (( ! empty( $settings['desc'] )) ): ?>
	                <p><?php echo esc_html($settings['desc']); ?></p>
	                <?php endif; ?>
	                
	                <div class="m-line mt-20 mb-30"></div>

		            <div class="m-social">
		            	<?php if (( ! empty( $settings['facebook_url'] )) ): ?>	
		                <a class="facebook" href="<?php echo esc_html($settings['facebook_url']); ?>"><i class="fab fa-facebook-f"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['twitter_url'] )) ): ?>
		                <a class="twitter" href="<?php echo esc_html($settings['twitter_url']); ?>"><i class="fab fa-twitter"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['instagram_url'] )) ): ?>
		                <a class="instagram" href="<?php echo esc_html($settings['instagram_url']); ?>"><i class="fab fa-instagram"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['youtube_url'] )) ): ?>
		                <a class="youtube" href="<?php echo esc_html($settings['youtube_url']); ?>"><i class="fab fa-youtube"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['linkedin_url'] )) ): ?>
		                <a href="<?php echo esc_html($settings['linkedin_url']); ?>"><i class="fab fa-linkedin"></i></a>
		                <?php endif; ?>
		            </div>
				</div>
            </div>

        </div>

        <?php elseif( $settings['chose_style'] == 'style_2' ): ?>

		<?php endif; ?>	
	<?php
	}

}