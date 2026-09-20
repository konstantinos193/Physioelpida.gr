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
class BdevsVideo extends \Elementor\Widget_Base {

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
		return 'bdevs-video-box';
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
		return __( 'Video Box', 'bdevs-elementor' );
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
		return [ 'Video' ];
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
			'section_archivement_one',
			[
				'label' => esc_html__( 'Video', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'video-style-1'  => esc_html__( 'Style 1', 'bdevs-elementor' ),
					'video-style-2' => esc_html__( 'Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'video-style-1',
			]
		);

		$this->add_control(
			'a_image_one',
			[
				'label'   => esc_html__( 'Image BG', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add icon Image', 'bdevs-elementor' ),
			]
		);	

		$this->add_control(
			'link',
			[
				'label' => __( 'Video Link', 'plugin-domain' ),
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


	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract( $settings );

   		$a_image_one = wp_get_attachment_image_src( $settings['a_image_one']['id'], 'full' );
		$a_image_one_url = $a_image_one ? $a_image_one[0] : '';    		

		$this->add_render_attribute(
			[
				'link' => [
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		
		if( $chose_style == 'video-style-1' ): ?>
            <!-- video_start -->
            <?php if (( ! empty( $settings['link']['url'] )) ) : ?>
            <div class="video-wrap">
                <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="popup-video circle-animation" data-wow-delay="1.5s"><i class="fal fa-play"></i></a>            
            </div>
            <?php endif; ?>
            <!-- video_end -->
        <?php 
        elseif ($chose_style == 'video-style-2'): ?>
        
            <!-- video_start -->
            <div class="video-area ">
                <div class="container">
                    <div class="video-item-wrapper text-center">

                        <?php 
						if (( ! empty( $settings['link']['url'] )) ) : ?>
	                        <div class="play-icon">
	                        	<a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="popup-video circle-animation" data-wow-delay="1.5s"><i class="fal fa-play"></i></a>

	                        </div>
			            <?php 
			        	endif; ?>

			        	<div class="header-info">
			        		<h2>We Are Very Trusted Watch Our Life Screen<br /> Care Treatment Videos</h2>
			        	</div>


                    </div>
                </div>
            </div>
            <!-- video_end -->

        <?php 
        endif; ?>    

	<?php
	}

}