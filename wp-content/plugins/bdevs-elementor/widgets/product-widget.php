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
class BdevsProductPost extends \Elementor\Widget_Base {

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
		return 'bdevs-product-post';
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
		return __( 'Product List', 'bdevs-elementor' );
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
		return [ 'product-post' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
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

		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'our blog', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
				'label_block' => true,
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
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_service_post',
			[
				'label' => esc_html__( 'Product Post', 'bdevs-elementor' ),
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
					'style-4' => esc_html__( 'Style 4', 'bdevs-elementor' ),
					'style-5' => esc_html__( 'Style 5', 'bdevs-elementor' ),
				],
				'default'   => 'style-1',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'ID'  => esc_html__( 'Post ID', 'bdevs-elementor' ),
					'title'  => esc_html__( 'Title', 'bdevs-elementor' ),
					'date' => esc_html__( 'Date', 'bdevs-elementor' ),
					'modified' => esc_html__( 'Last Modified Date', 'bdevs-elementor' ),
					'rand' => esc_html__( 'Random Order', 'bdevs-elementor' ),
					'comment_count' => esc_html__( 'Popular Post', 'bdevs-elementor' ),
				],
				'default'   => 'ID',
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'desc',
			]
		);		

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '6',
			]
		);

		$this->add_control(
			'cat',
			[
				'label'       => __( 'Category Slug', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter category slug here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'content_limit',
            [
                'label' => __('Content Limit', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'default' => '14',
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'content' => 'yes'
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
				'default'      => 'left',
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__( 'Show title', 'bdevs-elementor' ),
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

		$this->add_control(
			'show_link',
			[
				'label'   => esc_html__( 'Show Link', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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

		// sub heading info
		$sub_heading_font_size = !empty($settings['sub_heading_font_size']) ? 'font-size:'.$settings['sub_heading_font_size'] : '';
		$sub_heading_n_title_gap = !empty($settings['sub_heading_n_title_gap']) ? 'margin-bottom:'.$settings['sub_heading_n_title_gap'] : '';
		$sub_heading_color = !empty($settings['sub_heading_color']) ? 'color:'.$settings['sub_heading_color'] : '';

		$sub_heading_border_color = !empty($settings['sub_heading_color']) ? 'background-color:'.$settings['sub_heading_color'] : '';
		
		// heading info
		$heading_font_size = !empty($settings['heading_font_size']) ? 'font-size:'.$settings['heading_font_size'] : '';
		$heading_line_height = !empty($settings['heading_line_height']) ? 'line-height:'.$settings['heading_line_height'] : '';
		$heading_color = !empty($settings['heading_color']) ? 'color:'.$settings['heading_color'] : '';

		/** desc info **/
		$desc_font_size = !empty($settings['desc_font_size']) ? 'font-size:'.$settings['desc_font_size'] : '';
		$desc_color = !empty($settings['desc_color']) ? 'color:'.$settings['desc_color'] : '';

		$this->add_render_attribute(
			[
				'link' => [
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	    $cat = get_term_by('slug', $cat, 'product_cat');

	    if( !empty($cat->term_id) ){
	        $term_id = $cat->term_id;
	    }else{
	        $term_id = 1;
	    }

		if( $chose_style == 'style-1' ): ?>

		<div class="best-sell-products best-sell-products-active">
        	<?php 
            $q = new \WP_Query(array(
                'post_type'     => 'product',
                'posts_per_page'=> $number,
                'orderby' 		=> 'menu_order '.$orderby,
                'order'         => $order,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'term_id',
                        'terms'    => array( $term_id ),
                        'operator' => 'IN',
                    ),
                )
            ));

            if($q->have_posts()):
                while($q->have_posts()): $q->the_post();  ?>
		    <div class="single-product-wrapper pos-rel">
		        <div class="single-product pos-rel">
		            <div class="product-action-hover">
		                <?php print bdevs_woo_product_cart_button(); ?>
		            </div>
		            <?php echo sale_badge_percentage(); ?>
		            <div class="product-content">
		                <div class="product-thumb">
		                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
		                </div>
		                <div class="product-description">
		                    <span class="stock-avail"><?php print bdevs_woo_template_single_stock(); ?></span>
		                    <h4 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

		                    <?php print bdevs_woo_get_price(); ?>

		                    <div class="product-rating">
		                        <?php print bdevs_woo_shop_rating(); ?>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
			<?php 
                endwhile;  
                wp_reset_postdata();
            endif; 
            ?>
		</div>

		<?php elseif ($chose_style == 'style-2') : ?>
    <section class="products-area pt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-30">
                    <div class="product-available product-available-active">
			        	<?php 
			            $q = new \WP_Query(array(
			                'post_type'     => 'product',
			                'posts_per_page'=> $number,
			                'orderby' 		=> 'menu_order '.$orderby,
			                'order'         => $order,
			                'tax_query' => array(
			                    array(
			                        'taxonomy' => 'product_cat',
			                        'field'    => 'term_id',
			                        'terms'    => array( $term_id ),
			                        'operator' => 'IN',
			                    ),
			                )
			            ));

			            if($q->have_posts()):
			                while($q->have_posts()): $q->the_post();  
			            ?>
                        <div class="single-product-wrapper pos-rel">
                            <div class="single-product pos-rel">
                                <div class="product-action-hover">
					                <?php print bdevs_woo_product_cart_button(); ?>
					            </div>
                                <?php echo sale_badge_percentage(); ?>
                                <div class="product-content">
                                    <div class="product-thumb">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
                                    </div>
                                    <div class="product-description">
                                        <span class="stock-avail">In Stock</span>
                                        <h4 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php print bdevs_woo_get_price(); ?>
                                        <div class="product-rating">
                                            <?php print bdevs_woo_shop_rating(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php 
			                endwhile;  
			                wp_reset_postdata();
			            endif; 
			            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

		<?php elseif ($chose_style == 'style-3') : ?>
		<div class="dealndiscount ctrl-width">
            <div class="dotd-wrapper mt-15 pos-rel">
                <h4 class="section-title7 mb-0"><?php echo $settings['title']; ?></h4>
                <div class="offer-product">
                    <p>Ends in :</p>
                    <div class="offer-product-count" data-countdown="2021/12/17"></div>
                </div>

                <div class="dotd-products dotd-product-active">
		        	<?php 
			            $q = new \WP_Query(array(
			                'post_type'     => 'product',
			                'posts_per_page'=> $number,
			                'orderby' 		=> 'menu_order '.$orderby,
			                'order'         => $order,
			                'tax_query' => array(
			                    array(
			                        'taxonomy' => 'product_cat',
			                        'field'    => 'term_id',
			                        'terms'    => array( $term_id ),
			                        'operator' => 'IN',
			                    ),
			                )
			            ));

			            if($q->have_posts()):
		                while($q->have_posts()): $q->the_post();  
	                ?>
                    <div class="dotd-prduct-wrapper">
                        <div class="dotd-product">
                            <div class="dotd-product-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
                            </div>
                            <div class="dotd-product-content">
                                <span class="stock-avail"><?php print bdevs_woo_template_single_stock(); ?></span>
                                <h4 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="product-rating mb-15">
                                    <?php print bdevs_woo_shop_rating(); ?>
                                </div>
                                <?php print bdevs_woo_get_price(); ?>

                                <?php if (!empty($settings['content'])):
                                    $content_limit = (!empty($settings['content_limit'])) ? $settings['content_limit'] : '';
                                    ?>
                                    <p><?php print wp_trim_words(get_the_excerpt(), $content_limit, ''); ?></p>
                                <?php endif; ?>

                                <div class="dotd-buttons">
                                	<?php print bdevs_woo_list_product_cart_button(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php 
		                endwhile;  
		                wp_reset_postdata();
		            endif; 
		            ?>
                </div>
            </div>

        </div>
		<?php endif; ?>
	<?php
	}
}