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
class BdevsPring extends \Elementor\Widget_Base {

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
		return 'bdevs-pricing';
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
		return __( 'Pricing', 'bdevs-elementor' );
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
		return [ 'price' ];
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
				'label' => esc_html__( 'Pricing', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your prefix Heading', 'bdevs-elementor' ),
				'default'     => __( 'Our Plans', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'Pricing & Plans', 'bdevs-elementor' ),
			]
		);		

		$this->add_control(
			'button_text_one',
			[
				'label'       => __( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Price', 'bdevs-elementor' ),
				'default'     => __( 'Price', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['price_default']
				],
			]
		);		

		$this->add_control(
			'button_text_two',
			[
				'label'       => __( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'get appointment', 'bdevs-elementor' ),
				'default'     => __( 'get appointment', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['price_black']
				],
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'price_default'  => esc_html__( 'Price Default', 'bdevs-elementor' ),
					'price_black' => esc_html__( 'Price Black', 'bdevs-elementor' ),
				],
				'default'   => 'price_default',
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
				'default'      => 'left',
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
				'label'   => esc_html__( 'Section Title Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_button',
			[
				'label'     => esc_html__( 'Button', 'bdevs-elementor' ),
				'condition' => [
					'show_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Select Plan', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Select Plan', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'icon_name',
			[
				'label'       => esc_html__( 'Icon Name', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'arrow-thin-right', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Dripicons Fonts', 'bdevs-elementor' ),
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract( $settings );
		$chose_style = $settings['chose_style'];
		$button_text_one = $settings['button_text_one'];
		$button_text_two = $settings['button_text_two'];

	    $postArr = new \WP_Query(array('posts_per_page' => 6,'post_type' => 'bdevs-pricetables',  'orderby' => 'ID', 'order' => 'ASC'));
	    
	    //other style
	    if( is_array($postArr->posts) && !empty($postArr->posts) ) {

	        foreach($postArr->posts as $item) {
	            $taxsArr = wp_get_post_terms($item->ID, 'price_tables_categories', array("fields" => "all"));
	            if(is_array($taxsArr) && !empty($taxsArr)) {
	                foreach($taxsArr as $tax) {
	                    $filteArr[$tax->slug] = $tax->name;
	                }
	            }
	        }
	    }

	    if( is_array($filteArr) && !empty($filteArr) ):
	    ?>

		<?php if( $chose_style == 'price_default' ): ?>
        <section class="pricing-area gray-bg pt-115 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-12">
                        <div class="section-title pos-rel mb-75">
                        	<?php 
                        	if ( $settings['section_title_icon'] ) : ?>
	                            <div class="section-icon">
	                                <img class="section-back-icon back-icon-left" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
	                            </div>
                            <?php 
                        	endif; ?>	

                            <div class="section-text pos-rel">
								<?php 
								if (!empty($settings['sub_heading'])) : ?>
									<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php 
								endif; ?>	

                                <?php 
                                if (!empty($settings['heading'])) : ?>
									<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
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
                    <div class="col-xl-7 col-lg-6 col-md-12">
                        <div class="pricing-menu f-right">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
								<?php 
			                    $count = 0;
			                    foreach($filteArr as $tax_slug => $tax_name) { $count++; ?>
			                      <li class="nav-item">
			                        <a class="nav-link <?php print ($count == 1 ) ? 'active' : '' ; ?>" id="home-tab<?php print $count; ?>" data-toggle="tab" href="#<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></a>
			                      </li>
			                    <?php 
			                    }
			                    ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tab-content" id="pills-tabContent">
							<?php
			                 $count = 0;
			                 foreach($filteArr as $tax_slug => $tax_name) : $count++; 
			                ?>
                            <div class="tab-pane fade <?php print ($count == 1 ) ? 'show active' : '' ; ?>" id="<?php print esc_attr($tax_slug); ?>" role="tabpanel" aria-labelledby="home-tab<?php print $count; ?>">
                                <div class="row">
								<?php 
			                        $j = 0;
			                        $q = new \WP_Query(array(
			                            'post_type' => 'bdevs-pricetables',
			                            'orderby' => 'ID',
			                            'order' => 'ASC',
			                            'tax_query' => array(
			                              array(
			                               'taxonomy' => 'price_tables_categories',
			                               'field'    => 'slug',
			                               'terms'    => $tax_slug,
			                              ),
			                             ),
			                        ));
			                        while($q->have_posts()) : $q->the_post(); 

			                        $j++;

			                        $price = function_exists('get_field') ? get_field( 'price_table_price' ) : NULL;
			                        $info_text = function_exists('get_field') ? get_field( 'price_table_info_text' ) : NULL;
			                        $link_url = function_exists('get_field') ? get_field( 'price_table_link_url' ) : NULL;

			                        ?>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="pricing-box mb-30 <?php print ($j == 2 ) ? 'active' : '' ; ?>">
                                            <div class="pricing-thumb mb-45">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                            <div class="pricing-content">
                                                <h1><?php the_title(); ?></h1>
                                                 <p><?php print esc_html($info_text); ?></p>
                                                 <a href="<?php print esc_html($link_url); ?>" class="btn btn-icon ml-0">
                                                 	<span>+</span><?php print esc_html($button_text_one); ?>: <?php esc_html__('$','bdevs-elementor') ;?><?php print esc_html($price); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
									<?php   
			                        endwhile;
			                        wp_reset_postdata();
			                        ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'price_black' ): ?>
        <!-- pricing-area start -->
        <section id="pricing" class="pricing-area pos-rel">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="section-title section-title-m-0 pos-rel mb-75">
                        	<?php 
                        	if ( $settings['section_title_icon'] ) : ?>
	                            <div class="section-icon">
	                                <img class="section-back-icon back-icon-left" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon-blue.png" alt="">
	                            </div>
                            <?php 
                        	endif; ?>	
                        	
                            <div class="section-text pos-rel">
								<?php 
								if (!empty($settings['sub_heading'])) : ?>
									<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php 
								endif; ?>	

                                <?php 
                                if (!empty($settings['heading'])) : ?>
									<h2 class="sec-title white-text"><?php echo wp_kses_post($settings['heading']); ?></h2>
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
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <nav class="pricing-nav mb-70">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
								<?php 
			                    $count = 0;
			                    foreach($filteArr as $tax_slug => $tax_name) { $count++; ?>
                                <a class="nav-item nav-link <?php print ($count == 1 ) ? 'active' : '' ; ?>" id="nav-home-<?php print $count; ?>" data-toggle="tab" href="#<?php print esc_attr($tax_slug); ?>"
                                    role="tab" aria-controls="<?php print esc_attr($tax_slug); ?>" aria-selected="true"><?php print esc_html($tax_name); ?></a>
                                 <?php 
			                    }
			                    ?>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="pricing-tab mb-30">
                            <div class="tab-content" id="nav-tabContent">
							<?php
			                 $count = 0;
			                 foreach($filteArr as $tax_slug => $tax_name) : $count++; 
			                  ?>
                                <div class="tab-pane fade <?php print ($count == 1 ) ? 'show active' : '' ; ?>" id="<?php print esc_attr($tax_slug); ?>" role="tabpanel" aria-labelledby="nav-home-<?php print $count; ?>">
                                    <div class="row">
									<?php 
			                        $j = 0;
			                        $q = new \WP_Query(array(
			                            'post_type' => 'bdevs-pricetables',
			                            'orderby' => 'ID',
			                            'order' => 'ASC',
			                            'tax_query' => array(
			                              array(
			                               'taxonomy' => 'price_tables_categories',
			                               'field'    => 'slug',
			                               'terms'    => $tax_slug,
			                              ),
			                             ),
			                        ));
			                        while($q->have_posts()) : $q->the_post(); 

			                        $j++;

									$price = function_exists('get_field') ? get_field( 'price_table_price' ) : NULL;
			                        $info_text = function_exists('get_field') ? get_field( 'price_table_info_text' ) : NULL;
			                        $link_url = function_exists('get_field') ? get_field( 'price_table_link_url' ) : NULL;
			                        

			                        ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="price-box-flat mb-30">
                                                <div class="pricing-title">
                                                    <h6 class="green-color text-up-case letter-spacing <?php print esc_attr ($j == 2 ) ? 'pink-bg white-color' : '' ; ?>"><?php the_title(); ?></h6>
                                                </div>
                                                <div class="price-content">
                                                    <div class="price-heading">
                                                        <h2 class="price-title"><span class="pink-color"><?php print esc_html__('$','bdevs-elementor'); ?></span><?php print esc_html($price); ?>
                                                        </h2>
                                                    </div>
                                                    <div class="pricing-list">
                                                        <?php the_content(); ?>
                                                    </div>
                                                </div>
                                                <div class="price-btn-2">
                                                    <a href="<?php print esc_html($link_url); ?>" class="btn <?php print esc_attr ($j == 2 ) ? 'green-bg white-color' : '' ; ?>">
                                                    	<?php print esc_html($button_text_two); ?> <i class="fas fa-angle-double-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
									<?php   
			                        endwhile;
			                        wp_reset_postdata();
			                        ?>

                                    </div>
                                </div>
								<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing-area end -->
        <?php endif; ?>	

    <?php 
    endif; 
	
	}

}