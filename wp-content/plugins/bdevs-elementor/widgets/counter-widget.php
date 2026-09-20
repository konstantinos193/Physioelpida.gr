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
class BdevsCounter extends \Elementor\Widget_Base {

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
		return 'bdevs-counter';
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
		return __( 'Counter List', 'bdevs-elementor' );
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
		return [ 'Counter' ];
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
				'label' => esc_html__( 'Section Heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter your subheading here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'It is heading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter your heading here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_features',
			[
				'label' => esc_html__( 'Counter', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'counter-style-1'  => esc_html__( 'Counter Style Black', 'bdevs-elementor' ),
					'counter-style-2' => esc_html__( 'Counter Style White', 'bdevs-elementor' ),
					'counter-style-3' => esc_html__( 'Counter Style Light Blue', 'bdevs-elementor' ),
					'counter-style-4' => esc_html__( 'Counter Style 4', 'bdevs-elementor' ),
					'counter-style-5' => esc_html__( 'Counter Style 5', 'bdevs-elementor' ),
					'counter-style-6' => esc_html__( 'Counter Style 6', 'bdevs-elementor' ),
					'counter-style-7' => esc_html__( 'Counter Style 7', 'bdevs-elementor' ),
				],
				'default'   => 'counter-style-1',
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Background Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'logo_image',
			[
				'label'   => esc_html__( 'Logo Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Logo Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' => __( 'Link', 'bdevs-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'video_play_icon',
			[
				'label'   => esc_html__( 'Video Play Icon', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Video Play Icon', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Counter Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Counter #i', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'Project Complate', 'bdevs-elementor' ),
					],
				],
				'fields' => [			
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon Image', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Upload Icon from here', 'bdevs-elementor' ),
					],					
					[
						'name'        => 'icon_name',
						'label'       => esc_html__( 'Icon Name', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'	 => 'fal fa-clinic-medical',
						'placeholder' => 'Enter Number here....',
						'label_block' => true,
					],				
					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'	 => 540,
						'placeholder' => 'Enter Number here....',
						'label_block' => true,
					],
					[
						'name'       => 'heading',
						'label'      => esc_html__( 'Heading', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'	 => 'Expert Doctors',
						'placeholder' => 'Content Here..',
						'show_label' => true,
						'label_block' => true,
					],
					[
						'name'       => 'tab_desc',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'	 => 'Its Desc Text',
						'placeholder' => 'Content Here..',
						'show_label' => true,
					]
				]
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
				'video_link' => [
					'href'   => $settings['video_link']['url'] ? esc_url($settings['video_link']['url']) : '#',
					'target' => $settings['video_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		$bg_image_src = wp_get_attachment_image_src( $bg_image['id'], 'full' );
		$bg_image_url = $bg_image_src ? $bg_image_src[0] : '';

		$logo_image_src = wp_get_attachment_image_src( $logo_image['id'], 'full' );
		$logo_image_url = $logo_image_src ? $logo_image_src[0] : '';

		$video_play_icon_src = wp_get_attachment_image_src( $video_play_icon['id'], 'full' );
		$video_play_icon_url = $video_play_icon_src ? $video_play_icon_src[0] : '';	

		if( $chose_style == 'counter-style-1' ): ?>

		<section class="counter-wraper ">
            <div class="container">
                <div class="row justify-content-around">
 
                    <?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>

	                    <div class="col-lg-2 col-md-3">
	                        <div class="single-couter counter-box text-center mb-180">
								<?php
								if ( '' !== $icon['id'] )  :  
									$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
									$image_url = $image_src ? $image_src[0] : '';
								?>                        	
	                            	<img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
								<?php endif; ?>

	                            <h2 class="coun-list-title"><span class="counter"><?php print wp_kses_post( $number ); ?></span><?php print esc_html_e('+', 'bdevs-elementor'); ?></h2>
	                            <h6 class="green-color"><?php print wp_kses_post( $tab_desc ); ?></h6>
	                        </div>
	                    </div>

	                <?php
					endforeach;
					?>
                </div>
            </div>
        </section>
		<?php elseif ( $chose_style == 'counter-style-2' ) : ?>
		<section class="about-area">
            <div class="container">
                <div class="row">
                    <?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>                	
	                    <div class="col-xl-4 col-lg-4 col-md-6">
	                        <div class="single-couter counter-box counter-box-white text-center mb-30">
                        	<?php
							if ( '' !== $icon['id'] )  :  
								$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
								$image_url = $image_src ? $image_src[0] : '';
							?>                        	
                            	<img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
							<?php endif; ?>

							<h2 class="coun-list-title"><span class="theme-color counter"><?php print wp_kses_post( $number ); ?></span><?php print esc_html_e('+', 'bdevs-elementor'); ?></h2>
		                    <h6 class="green-color pb-20"><?php print wp_kses_post( $heading ); ?></h6>
	                        <div class="counter-text mt-10">
	                            <p><?php print wp_kses_post( $tab_desc ); ?></p>
	                        </div>
	                        </div>
	                    </div>
                    <?php
					endforeach;
					?>
                </div>
            </div>
        </section>
        <?php elseif ( $chose_style == 'counter-style-3' ) : ?>
        
       	<section class="counter-wraper">
            <div class="container">
                <div class="row">
                    <?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>            
		                <div class="col-lg-4 col-md-6">
	                        <div class="single-couter mb-30">
	                            <?php
								if ( '' !== $icon['id'] )  :  
									$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
									$image_url = $image_src ? $image_src[0] : '';
								?>                        	
	                            	<img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
								<?php endif; ?>
	                            <div class="counter-text-box">
	                                <h2 class="ctr-title"><span class="counter"><?php print wp_kses_post( $number ); ?></span><?php print esc_html_e('+', 'bdevs-elementor'); ?></h2>
	                                <h3><?php print wp_kses_post( $heading ); ?></h3>
	                                <p><?php print wp_kses_post( $tab_desc ); ?></p>
	                            </div>
	                        </div>
	                    </div>
                    <?php
					endforeach;
					?>
                </div>
            </div>
        </section>
        <?php elseif ( $chose_style == 'counter-style-4' ) : ?>
        <div class="fact gray-bg">
            <div class="container-fluid p-0">
                <div class="row no-gutters d-flex align-items-center">
                    <div class="col-xl-5">
                        <div class="h6fact-wrapper pt-30">
                            <div class="row">
			                    <?php 
			                    foreach ( $settings['tabs'] as $item ) : 
									extract($item);
									?>  
	                                <div class="col-lg-6 col-md-6">
	                                    <div class="h4facts-single border-facts mb-30">
			                                <?php
											if ( '' !== $icon['id'] )  :  
												$image_src = wp_get_attachment_image_src( $icon['id'], 'full' );
												$image_url = $image_src ? $image_src[0] : '';
											?>     
												<i class="h4facts-icon h4facts-iconpink">                   	
				                            		<img src="<?php print esc_url($image_url); ?>" alt="<?php print wp_kses_post($tab_title); ?>">
				                            	</i>	
											<?php 
											endif; ?>
	                                        <span class="counter f-600 pink-color"><?php print wp_kses_post( $number ); ?></span>
	                                        <h5 class="f-500 theme-color"><?php print wp_kses_post( $heading ); ?></h5>
	                                    </div>
	                                </div>
			                    <?php
								endforeach;
								?>
                            </div>
                        </div>
                    </div>
                     <?php if ( !empty($bg_image_url)  ) : ?>
                    <div class="col-xl-7">
                        <div class="h4facts-thumbbox pos-rel text-center text-xl-right">
                            <div class="h4facts-thumb">
                                <img src="<?php print esc_url( $bg_image_url ); ?>" alt="BG Image">
                                <?php if ( !empty($video_link)  ) : ?>
                                <a <?php echo $this->get_render_attribute_string( 'video_link' ); ?> class="h4facts-playicon popup-video"><i><img src="<?php print esc_url( $video_play_icon_url ); ?>" alt="play icon"></i></a>
                            	<?php endif; ?>
                                <i class="h4facts-brandicon"><img src="<?php print esc_url( $logo_image_url ); ?>" alt="Logo Image"></i>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php elseif ( $chose_style == 'counter-style-5' ) : ?>
	        <!-- facti start  -->
	        <div class="fact">
	            <div class="container">
	                <div class="row">
        			<?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?> 
	                    <div class="col-lg-3 col-md-6">
	                        <div class="h5fact-wrapper mb-35">
	                         	<i class="<?php print wp_kses_post( $icon_name ); ?>"></i> 
	                            <span class="coutner"><?php print wp_kses_post( $number ); ?></span>
	                            <h5><?php print wp_kses_post( $heading ); ?></h5>
	                            <p><?php print wp_kses_post( $tab_desc ); ?></p>
	                        </div>
	                    </div>
                    <?php
					endforeach;
					?>
	                </div>
	            </div>
	        </div>
	        <!-- facti start end -->

        <?php elseif ( $chose_style == 'counter-style-6' ) : ?>
	        <!-- facti start  -->
	        <div class="counter-area style-6">
	            <div class="container">
	                <div class="row">
        			<?php 
                    foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?> 
	                    <div class="col-lg-3 col-md-6">
	                        <div class="fact-6-wrapper mb-35">
	                        	<?php if(!empty($icon_name)) : ?>
	                        	<i class="<?php print wp_kses_post( $icon_name ); ?>"></i>
	                        	<?php endif; ?>

	                        	<?php if(!empty($heading)) : ?>
	                            <h5><?php print wp_kses_post( $heading ); ?></h5>
	                            <?php endif; ?>

	                            <?php if(!empty($number)) : ?>
	                            <div class="fact-num"><span class="plus">+</span><span class="counter"><?php print wp_kses_post( $number ); ?></span></div>
	                            <?php endif; ?>
	                        </div>
	                    </div>
                    <?php
					endforeach;
					?>
	                </div>
	            </div>
	        </div>
	        <!-- facti start end -->

	    <?php elseif ( $chose_style == 'counter-style-7' ) : ?>
	    
	    <div class="counter-area style-7">
            <div class="container p-0">
                <div class="row">
                	<div class="col-xl-6">
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
                    </div>
                    <div class="col-xl-6">
                        <div class="h6fact-wrapper pt-30">
                            <div class="row">
			                    <?php 
			                    foreach ( $settings['tabs'] as $item ) : 
									extract($item);
									?>  
	                                <div class="col-lg-6 col-md-6">
	                                    <div class="single-counter-item mb-30">
	                                        <h5 class="f-500 theme-color"><?php print wp_kses_post( $heading ); ?></h5>
	                                        <span class="counter f-600 pink-color"><?php print wp_kses_post( $number ); ?></span>
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


		<?php endif; ?>
	<?php 
	}

}