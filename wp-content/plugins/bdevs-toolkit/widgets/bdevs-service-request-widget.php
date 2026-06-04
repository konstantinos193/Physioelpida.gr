<?php
	/**
	 * karkhana Social Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	karkhana/Widgets
	 * @version 	1.0.1
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'bdevs_request_service_widget');
	function bdevs_request_service_widget() {
		register_widget('bdevs_request_service_widget');
	}
	
	
	class Bdevs_Request_Service_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_request_service_widget',esc_html__('MediDove Request Info','bdevs-toolkit'),array(
				'description' => esc_html__('MediDove Request Info Widget','bdevs-toolkit'),
			));
		}
		
		public function widget($args,$instance){
			extract($args);
			print $before_widget; 

			if($instance['title']):
	     		echo $before_title; ?> 
	     		<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
	     		<?php echo $after_title; ?>
	     	<?php endif; ?>
                <div class="service-contact-form">
            	<?php
                if(!empty($instance['mailchimp_shortcode'])){
					print do_shortcode($instance['mailchimp_shortcode']);
				}
				?>
            	</div> 
            
		<?php print $after_widget;
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
			$mailchimp_shortcode  = isset($instance['mailchimp_shortcode'])? $instance['mailchimp_shortcode']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Mailchimp Shortcode:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('mailchimp_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('mailchimp_shortcode')); ?>" value="<?php print esc_attr($mailchimp_shortcode); ?>">
			
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['mailchimp_shortcode'] = ( ! empty( $new_instance['mailchimp_shortcode'] ) ) ? strip_tags( $new_instance['mailchimp_shortcode'] ) : '';;
			return $instance;
		}
	}