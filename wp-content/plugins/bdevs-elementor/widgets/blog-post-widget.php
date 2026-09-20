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
class BdevsBlogPost extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-post';
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
		return __( 'Latest Blog', 'bdevs-elementor' );
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
		return [ 'blog-post' ];
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
				'label' => esc_html__( 'Blog Post', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'blog-style-1'  => esc_html__( 'Latest Blog Style 1', 'bdevs-elementor' ),
					'blog-style-2' => esc_html__( 'Latest Blog Style 2', 'bdevs-elementor' ),
					'blog-style-3' => esc_html__( 'Latest Blog Style 3', 'bdevs-elementor' ),
					'blog-style-4' => esc_html__( 'Latest Blog Style 4', 'bdevs-elementor' ),
					'blog-style-5' => esc_html__( 'Latest Blog Style 5', 'bdevs-elementor' ),
				],
				'default'   => 'blog-style-1',
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
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__( '3', 'bdevs-elementor' ),
					'6' => esc_html__( '6', 'bdevs-elementor' ),
					'9' => esc_html__( '9', 'bdevs-elementor' ),
					'12' => esc_html__( '12', 'bdevs-elementor' ),
				],
				'default'   => '3',
			]
		);

		$this->add_control(
			'read_more',
			[
				'label'       => esc_html__( 'Link text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
				'label_block' => true,
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


		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		extract($settings);

		$this->add_render_attribute(
			[
				'link' => [
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	    $cat = get_term_by('slug', $cat, 'category');

	    if( !empty($cat->term_id) ){
	        $term_id = $cat->term_id;
	    }else{
	        $term_id = 1;
	    }

		if( $chose_style == 'blog-style-1' ): ?>

        <section class="latest-news-area">
            <div class="container">
                <div class="row">

                	<?php 
	                $q = new \WP_Query(array(
	                    'post_type'     => 'post',
	                    'posts_per_page'=> $number,
	                    'orderby' 		=> 'menu_order '.$orderby,
	                    'order'         => $order,
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'post_format',
	                            'field'    => 'slug',
								'terms' => array( 
					                'post-format-image', 
					            ),
	                            'operator' => 'IN',
	                        ),
	                    ),
	                ));

	                if($q->have_posts()):
	                    while($q->have_posts()): $q->the_post();  ?>
		                    <div class="col-xl-4 col-lg-6 col-md-6">
		                        <div class="latest-news-box mb-30">
		                            <div class="latest-news-thumb mb-30">
		                                <?php the_post_thumbnail(array(370, 270)); ?>
		                            </div>
		                            <div class="latest-news-content">
							            <div class="news-meta mb-15">
							                <span>
							                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
							                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
							                    </a>
							                </span>
							                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
							            </div>
		                                <h3><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 10, ''); ?></a></h3>
		                                <p><?php print wp_trim_words(get_the_content(), 24, ''); ?></p>
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
        </section>
		<?php elseif ($chose_style == 'blog-style-2') : ?>
		<section class="latest-news-area">
            <div class="container">
                <div class="row">
            	<?php 
                $q = new \WP_Query(array(
                    'post_type'     => 'post',
                    'posts_per_page'=> $number,
                    'orderby' 		=> 'menu_order '.$orderby,
                    'order'         => $order,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => array( $term_id ),
                            'operator' => 'IN',
                        ),
                    ),
                ));
                if($q->have_posts()):
                    while($q->have_posts()): $q->the_post();  ?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="latest-news-box latest-news-box-2 mb-30">
                            <div class="latest-news-thumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <div class="latest-news-content-box">
                                <div class="latest-news-content">
						            <div class="news-meta mb-15">
						                <span>
						                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
						                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
						                    </a>
						                </span>
						                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
						            </div>
                                    <h3><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h3>
                                    <p><?php print wp_trim_words(get_the_content(), 14, ''); ?></p>
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
        </section>
        <?php elseif ($chose_style == 'blog-style-3') : ?>
	        <section class="latest-news-area">
	            <div class="container">
	                <div class="row">
	            	<?php 
	                $q = new \WP_Query(array(
	                    'post_type'     => 'post',
	                    'posts_per_page'=> $number,
	                    'orderby' 		=> 'menu_order '.$orderby,
	                    'order'         => $order,
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'category',
	                            'field'    => 'term_id',
	                            'terms'    => array( $term_id ),
	                            'operator' => 'IN',
	                        ),
	                    ),
	                ));
	                if($q->have_posts()):
	                    while($q->have_posts()): $q->the_post();  ?>	                	
	                    <div class="col-xl-4 col-lg-4 col-md-6">
	                        <div class="latest-news-box latest-news-box-2 latest-news-box-3 mb-30">
	                            <div class="latest-news-thumb">
	                               <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	                            </div>
	                            <div class="latest-news-content-box pl-0 pr-0">
	                                <div class="latest-news-content">
							            <div class="news-meta mb-15">
							                <span>
							                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
							                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
							                    </a>
							                </span>
							                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
							            </div>
	                                    <h3><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h3>
                                    	<p><?php print wp_trim_words(get_the_content(), 24, ''); ?></p>
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
	        </section>
	    <?php elseif ($chose_style == 'blog-style-4') : ?>
	    <!-- latest-news-area start -->
        <section class="latest-news-area">
            <div class="container">
                <div class="row">
	            	<?php 
	                $q = new \WP_Query(array(
	                    'post_type'     => 'post',
	                    'posts_per_page'=> $number,
	                    'orderby' 		=> 'menu_order '.$orderby,
	                    'order'         => $order,
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'category',
	                            'field'    => 'term_id',
	                            'terms'    => array( $term_id ),
	                            'operator' => 'IN',
	                        ),
	                    ),
	                ));
	                $author_bio_avatar_size = 40;
	                if($q->have_posts()):
	                    while($q->have_posts()): $q->the_post();  ?>                	
		                    <div class="col-xl-4 col-lg-6 col-md-6">
		                        <div class="h4latestnews-box pos-rel fix mb-30">
		                            <div class="h4latestnews-wrapper pos-rel">
		                                <div class="h4news-tag mb-10">
		                                    <?php print medidove_get_category(); ?>
		                                </div>
		                                <div class="h4news-content">
		                                    <h4 class="theme-color f-600"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h4>
		                                    <p><?php print wp_trim_words(get_the_content(), 15, ''); ?></p>
		                                </div>
		                                <div class="h4news-admin d-flex align-items-center mb-40">
		                                    <div class="h4adminnews-thumb">
												<span><?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?><span class="theme-color f-600"><?php print get_the_author(); ?></span></span>
		                                    </div>
		                                    <div class="h4adminnews-date">
		                                        <span><i class="far fa-calendar-alt"></i><?php the_time(get_option('date_format')); ?></span>
		                                    </div>
		                                </div>
		                                <div class="h4news-button">
		                                    <a data-animation="fadeInLeft" data-delay=".6s" href="<?php the_permalink(); ?>"
		                                        class="btn btn-icon btn-icon-gray ml-0"><span>+</span><?php echo wp_kses_post($settings['read_more']); ?></a>
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
        </section>
        <!-- latest-news-area end -->
        <?php elseif ($chose_style == 'blog-style-5') : ?>

		<section class="latest-news-area">
            <div class="container">
                <div class="row">
            	<?php 
                $q = new \WP_Query(array(
                    'post_type'     => 'post',
                    'posts_per_page'=> $number,
                    'orderby' 		=> 'menu_order '.$orderby,
                    'order'         => $order,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => array( $term_id ),
                            'operator' => 'IN',
                        ),
                    ),
                ));
                if($q->have_posts()):
                	$number = 1;
                    while($q->have_posts()): $q->the_post(); 
                    ?>
	                    <div class="col-xl-4 col-lg-6 col-md-6">
	                        <div class="latest-news-box latest-news-box-2 latest-news-box-5 mb-30" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
	                            <div class="latest-news-content-box">
	                                <div class="latest-news-content">
							            <div class="news-meta mb-15">
							                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
							            </div>
	                                    <h3><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h3>
	                                    <p><?php print wp_trim_words(get_the_content(), 14, ''); ?></p>
	                                    <div class="h4news-button">
		                                    <a data-animation="fadeInLeft" data-delay=".6s" href="<?php the_permalink(); ?>"
		                                        class="button-border"><?php echo wp_kses_post($settings['read_more']); ?> <span>+</span></a>
		                                </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	           		<?php
	           		$number++;
					endwhile; 
					wp_reset_postdata(); 
				endif; 
				?>  
                </div>
            </div>
        </section>

		<?php endif; ?>
	<?php
	}
}