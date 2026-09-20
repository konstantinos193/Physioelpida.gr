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
class BdevsMission extends \Elementor\Widget_Base {

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
		return 'bdevs-mission';
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
		return __( 'Mission', 'bdevs-elementor' );
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
		return [ 'mission', 'vision' ];
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
			'section_content_features',
			[
				'label' => esc_html__( 'Mission', 'bdevs-elementor' ),
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
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);		



		$this->add_control(
			'desc',
			[
				'label'       => __( 'About Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter your about text', 'bdevs-elementor' ),
				'default'     => __( 'About Content Here', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Mission Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Mission Icon', 'bdevs-elementor' ),
			]
		);


		$this->end_controls_section();

		/** facts section **/
		$this->start_controls_section(
			'facts_section',
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
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Upload Icon from here', 'bdevs-elementor' ),
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
				'default'      => 'center',
			]
		);	

		$this->add_control(
			'show_icon',
			[
				'label'   => esc_html__( 'Show icon Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->end_controls_section();


	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);	
		?>

			
		<section class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-10 col-md-12">
                        <div class="about-title mb-20">
                        	
                        	<?php 
                        	if (!empty($sub_heading)) : ?>
								<h5><?php echo wp_kses_post($sub_heading); ?></h5>
							<?php 
							endif; ?>

                        	<?php 
                        	if (!empty($heading)) : ?>
								<h2 class="sec-title"><?php echo wp_kses_post( $heading ); ?></h2>
							<?php 
							endif; ?>	 
                        </div>
                        <div class="about-text mission-about-text">
                            <?php echo wp_kses_post($settings['desc']); ?>
                        </div>
                        <div class="mission-vision-list pr-90">
	                    <?php foreach ( $settings['tabs'] as $item ) : 
							extract($item);
						?>
                            <div class="mv-single-list d-flex">
                            	<?php 
                            	if ( '' !== $icon['id'] )  :  
										$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
										$image_url = $image_src ? $image_src[0] : '';
									?>
	                                    <div class="mv-icon">
	                                   		<img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
	                                	</div>
                                	<?php 
                            	endif; 
                            	?>

                                <?php 
                                if ( !empty($tab_content)  ) : ?>
                                <div class="mv-text">
                                    <p><?php print wp_kses_post($this->parse_text_editor( $tab_content )); ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
	                    <?php
						endforeach;
						?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-lg-none d-xl-block">

                    	<?php if ( '' !== $settings['image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $settings['image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
						<div class="mv-right-img pos-rel mb-30">
                            <img src="<?php print esc_url($image); ?>" alt="">
                        </div>
						<?php endif; ?>


						<?php if ( $settings['show_icon'] ) : ?>
	                    	<?php if (  '' !== $settings['icon'] )  : 
					   		$icon_src = wp_get_attachment_image_src( $settings['icon']['id'], 'full' );
							$icon_url = $icon_src ? $icon_src[0] : ''; 
					   		?>
							<div class="testi-quato-icon about-icon-white d-none d-xl-block">
	                           <img src="<?php print esc_url($icon_url); ?>" alt="">
	                        </div>
							<?php endif; ?> 
						<?php endif; ?> 
                    </div>
                </div>
            </div>
        </section>
	<?php
	}

}