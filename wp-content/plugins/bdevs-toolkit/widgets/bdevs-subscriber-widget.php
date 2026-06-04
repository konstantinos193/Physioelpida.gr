<?php
	/**
	 * Medodove Social Widget
	 *
	 *
	 * @author 		basictheme
	 * @category 	Widgets
	 * @package 	Medodove/Widgets
	 * @version 	1.0.1
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'bdevs_subscriber_widget');
	function bdevs_subscriber_widget() {
		register_widget('bdevs_subscriber_widget');
	}
	
	
	class Bdevs_Subscriber_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_subscriber_widget',esc_html__('MediDove Subscriber','bdevs-toolkit'),array(
				'description' => esc_html__('MediDove Subscriber Widget','bdevs-toolkit'),
			));
		}
		
		public function widget($args,$instance){
			extract($args);
		 	print $before_widget; 

			if($instance['title']):
	     		$before_title; ?> 
	     		<?php apply_filters( 'widget_title', $instance['title'] ); ?>
	     		<?php echo $after_title; ?>
	     	<?php endif; ?>

			<?php if( empty($instance['hide_logo']) ): ?>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="footer-logo-2">
                    <img src="<?php print esc_url($instance['image_box_image']); ?>" alt="<?php print esc_attr( $instance['title'] ); ?>">
                </div>
            </div>
        	<?php endif; ?>
            <div class="col-xl-2 col-lg-3 d-none d-lg-block d-xl-block">
                <div class="footer-subscribe-title">
                    <span><?php print apply_filters( 'widget_title', $instance['title'] ); ?></span>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-8">
                <div class="footer-newsletter">
                	<?php
                    if(!empty($instance['mailchimp_shortcode'])){
						print do_shortcode($instance['mailchimp_shortcode']);
					}
					?>
                </div>
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
			$hide_logo  = isset($instance['hide_logo'])? $instance['hide_logo']:'';
			$checked  =  ($hide_logo === 'on') ? 'checked="checked"' : '';


			$mailchimp_shortcode  = isset($instance['mailchimp_shortcode'])? $instance['mailchimp_shortcode']:'';
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<button type="submit" class="button button-secondary" id="author_info_image">Upload Media</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('image_box_image')); ?>" class="image_er_link" value="<?php print $author_img ; ?>">
				<div class="author-image-show">
					<img src="<?php print $author_img ; ?>" alt="" width="150" height="auto">
				</div>	
			</p>
			<p>
				<label for="<?php print esc_attr($this->get_field_id('hide_logo')); ?>"><?php esc_html_e('Hide Logo : ','bdevs-toolkit'); ?></label>
				<input type="checkbox" name="<?php print esc_attr($this->get_field_name('hide_logo')); ?>" id="<?php print esc_attr($this->get_field_id('hide_logo')); ?>" <?php print $checked; ?>>
			</p>

			<p>
				<label for="title"><?php esc_html_e('Mailchimp Shortcode:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('mailchimp_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('mailchimp_shortcode')); ?>" value="<?php print esc_attr($mailchimp_shortcode); ?>">
			
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['hide_logo'] = ( ! empty( $new_instance['hide_logo'] ) ) ? strip_tags( $new_instance['hide_logo'] ) : '';
			$instance['mailchimp_shortcode'] = ( ! empty( $new_instance['mailchimp_shortcode'] ) ) ? strip_tags( $new_instance['mailchimp_shortcode'] ) : '';;

			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';
			return $instance;
		}
	}