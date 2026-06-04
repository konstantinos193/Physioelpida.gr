<?php
	/**
	 * Medidove Social Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	medidove/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	

	add_action('widgets_init', 'medidove_profile_number_widget');
	function medidove_profile_number_widget() {
		register_widget('medidove_profile_number_widget');
	}
	
	
	class Medidove_Profile_Number_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('medidove_profile_number_widget',esc_html__('Medidove Info Number Widget','bdevs-toolkit'),array(
				'description' => esc_html__('Medidove Profile Number Widget','bdevs-toolkit'),
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

                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="footer-contact-info mb-30">
                                <div class="emmergency-call fix">
                                    <div class="emmergency-call-icon f-left">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="emmergency-call-text f-left">
                                        <h6><?php print esc_html($instance['phone_label']); ?></h6>
                                        <span><?php print esc_html($instance['phone_number']); ?></span>
                                        <?php if(!empty($instance['phone_number2'])): ?>
                                        <span><?php print esc_html($instance['phone_number2']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

			                    <div class="footer-logo dark-logo mb-35">
			                        <a href="<?php  print home_url(); ?>"><img src="<?php print esc_attr($instance['dark_logo']); ?>" alt=""></a>
			                    </div>

                                <div class="footer-contact-content mb-25">
                                    <p><?php print esc_html($instance['description']); ?></p>
                                </div>
                                <div class="footer-emailing">
                                    <ul>
		                                <?php if(!empty($instance['email_address'])): ?>
				                        	<li><i class="far fa-envelope"></i><?php print esc_html($instance['email_address']); ?></li>
				                    	<?php endif; ?>

										<?php if(!empty($instance['website_link'])): ?>
				                        	<li><i class="far fa-clone"></i><?php print esc_url($instance['website_link']); ?></li>
				                        <?php endif; ?>

				                        <?php if(!empty($instance['address_info'])): ?>
				                        	<li><i class="far fa-flag"></i><?php print esc_html($instance['address_info']); ?></li>
										<?php endif; ?>
                                    </ul>
                                </div>
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
			$description  = isset($instance['description'])? $instance['description']:'';
			$logo_dark  = isset($instance['dark_logo'])? $instance['dark_logo']:'';

			$website_link  = isset($instance['website_link'])? $instance['website_link']:'';
			$email_address  = isset($instance['email_address'])? $instance['email_address']:'';
			$address_info  = isset($instance['address_info'])? $instance['address_info']:'';
			$phone_label  = isset($instance['phone_label'])? $instance['phone_label']:'';
			$phone_number  = isset($instance['phone_number'])? $instance['phone_number']:'';
			$phone_number2  = isset($instance['phone_number2'])? $instance['phone_number2']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<button type="submit" class="button button-secondary" id="dark_logo_info">Upload Logo</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('dark_logo')); ?>" class="dark_logo_link" value="<?php print $logo_dark ; ?>">
				<div class="dark-logo-show">
					<img src="<?php print $logo_dark ; ?>" alt="" width="150" height="auto">
				</div>	
			</p>
			<p>
				<label for="title"><?php esc_html_e('Short Description:','bdevs-toolkit'); ?></label>
			</p>

			<textarea class="widefat" rows="5" cols="5" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>


			<p>
				<label for="title"><?php esc_html_e('Email Address:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('email_address')); ?>"  name="<?php print esc_attr($this->get_field_name('email_address')); ?>" value="<?php print esc_attr($email_address); ?>">

			<p>
				<label for="title"><?php esc_html_e('Website Link:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('website_link')); ?>"  name="<?php print esc_attr($this->get_field_name('website_link')); ?>" value="<?php print esc_attr($website_link); ?>">

			<p>
				<label for="title"><?php esc_html_e('Address info:','bdevs-toolkit'); ?></label>
			</p>
			<textarea class="widefat" rows="5" cols="5" id="<?php print esc_attr($this->get_field_id('address_info')); ?>" value="<?php print esc_attr($address_info); ?>" name="<?php print esc_attr($this->get_field_name('address_info')); ?>"><?php print esc_attr($address_info); ?></textarea>

			<p>
				<label for="title"><?php esc_html_e('Phone Label:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('phone_label')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_label')); ?>" value="<?php print esc_attr($phone_label); ?>">

			
			<p>
				<label for="title"><?php esc_html_e('Phone Number:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('phone_number')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_number')); ?>" value="<?php print esc_attr($phone_number); ?>">

			<p>
				<label for="title"><?php esc_html_e('Phone Number Two:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('phone_number2')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_number2')); ?>" value="<?php print esc_attr($phone_number2); ?>">

			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			$instance['email_address'] = ( ! empty( $new_instance['email_address'] ) ) ? strip_tags( $new_instance['email_address'] ) : '';

			$instance['website_link'] = ( ! empty( $new_instance['website_link'] ) ) ? strip_tags( $new_instance['website_link'] ) : '';

			$instance['address_info'] = ( ! empty( $new_instance['address_info'] ) ) ? strip_tags( $new_instance['address_info'] ) : '';

			$instance['phone_label'] = ( ! empty( $new_instance['phone_label'] ) ) ? strip_tags( $new_instance['phone_label'] ) : '';

			$instance['phone_number'] = ( ! empty( $new_instance['phone_number'] ) ) ? strip_tags( $new_instance['phone_number'] ) : '';
			$instance['phone_number2'] = ( ! empty( $new_instance['phone_number2'] ) ) ? strip_tags( $new_instance['phone_number2'] ) : '';

			$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';

			$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';

			$instance['dark_logo'] = ( ! empty( $new_instance['dark_logo'] ) ) ? strip_tags( $new_instance['dark_logo'] ) : '';

			return $instance;
		}
	}