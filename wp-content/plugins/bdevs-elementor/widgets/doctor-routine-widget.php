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
class BdevsDoctorRoutine extends \Elementor\Widget_Base {

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
		return 'bdevs-doctor-routine-post';
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
		return __( 'Routine Posts', 'bdevs-elementor' );
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
		return [ 'routine-post' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'section_content_sliders',
			[
				'label' => esc_html__( 'Table Heading Items', 'bdevs-elementor' ),
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
				'label' => esc_html__( 'Table Heading Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_heading'   => esc_html__( 'Heading Item #1', 'bdevs-elementor' ),
					],
				],
				'fields' => [			
					[
						'name'        => 'tab_heading',
						'label'       => esc_html__( 'Table Heading', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Table Heading from here', 'bdevs-elementor' ),
					],
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'section_content_service_post',
			[
				'label' => esc_html__( 'Member Post', 'bdevs-elementor' ),
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
					'4'  => esc_html__( '4', 'bdevs-elementor' ),
					'6' => esc_html__( '6', 'bdevs-elementor' ),
					'9' => esc_html__( '9', 'bdevs-elementor' ),
					'12' => esc_html__( '12', 'bdevs-elementor' ),
				],
				'default'   => '3',
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

	$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
	$bg_url = $bg_src ? $bg_src[0] : '';

?>


        <!-- Routine Area -->
        <div class="routine routine__bg pos-rel  pt-130 pb-115 fix" data-background="<?php print esc_url( $bg_url ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="routine__table">
                            <table class="table">
                                <thead>
                                    <tr>
					                    <?php 
					                    foreach ( $settings['tabs'] as $item ) : 
											extract($item);
											?>
	                                        <th scope="col">
	                                            <span class="routine--time__heading"><?php print wp_kses_post($tab_heading); ?></span>
	                                        </th>
						                <?php
										endforeach;
										?>
                                    </tr>
                                </thead>
                                <tbody>
				        <?php 

						    $q = new \WP_Query(array(
								'post_type'     => 'bdevs-routine',
							    'posts_per_page'=> $number,
							    'orderby' 		=> 'menu_order title',
							   	'order'			=> $order,
							));

				            if( $q->have_posts() ):
				            while($q->have_posts()): $q->the_post();
				            	$routine_group = function_exists('get_field') ? get_field('routine_group') : '';
				            	$routine_schedule_number = function_exists('get_field') && !empty(get_field('routine_schedule_number')) ? get_field('routine_schedule_number') : 6;

				              	$routine_day = get_post_meta(get_the_ID(), 'routine_day', true); 
								?>
					               	<?php if(!empty($routine_group)): ?>
										<tr>
											<th scope="row"><?php the_title(); ?></th>
											<?php for( $i = 1; $i <= $routine_schedule_number; $i++ ) : ?>
			                                <td class="active-doctor">
			                                	<?php if(!empty($routine_group['scehdule_'. $i])) : ?>
			                                    <div class="doctor--routine__wrapper">
			                                    	<?php if(!empty($routine_group['scehdule_'. $i])) : ?>
			                                        <h2><?php echo wp_kses_post( $routine_group['scehdule_'. $i] ); ?></h2>
			                                    	<?php endif; ?>

			                                    	<?php if(!empty($routine_group['scehdule_time_'. $i])) : ?>
			                                        <span><?php echo wp_kses_post( $routine_group['scehdule_time_'. $i] ); ?></span>
			                                        <?php endif; ?>
			                                    </div>
			                                    <?php endif; ?>
			                                </td>
			                            	<?php endfor; ?>
											<td></td>				
										</tr>
					                <?php 
					            	endif; ?>

					    <?php 
						endwhile; wp_reset_query();
						endif; 
						?>        	

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Routine Area end -->

	<?php
	}

}