<?php
	/**
	 * Medidove Menu Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	Medidove/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'bdevs_menu_widget');
	function bdevs_menu_widget() {
		register_widget('bdevs_menu_widget');
	}
	
	
	class Bdevs_Menu_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_menu_widget',esc_html__('Medidove Footer Menu','bdevs-toolkit'),array(
				'description' => esc_html__('Medidove Footer Menu Widget','bdevs-toolkit'),
			));
		}
		
		public function widget($args, $instance){
			extract($args);
			print $before_widget; 
                                 
			if($instance['title']):
	     		echo $before_title; ?> 
	     		<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
	     		<?php echo $after_title; ?>
	     	<?php endif; ?>

                <div class="footer-menu footer-menu-2">
                <?php 
			       	wp_nav_menu(array(
			       		'theme_location'	=> 'footer-menu',
			       		'menu_class'		=> '',
			       		'menu_id'			=> '',
			       		'container'			=> '',
			       		'fallback_cb'		=> 'Medidove_Navwalker::fallback',
			       		'walker'			=> new Medidove_Navwalker
			       	));
			    ?>
                </div>


              	<?php print $after_widget; ?>
			<?php 
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){

			$title  = isset($instance['title'])? $instance['title']:'';


			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">


			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			return $instance;
		}
	}