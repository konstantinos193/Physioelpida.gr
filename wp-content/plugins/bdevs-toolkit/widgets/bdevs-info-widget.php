<?php
	/**
	 * pohat Social Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	pohat/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'bdevs_profile_widget');
	function bdevs_profile_widget() {
		register_widget('bdevs_profile_widget');
	}
	
	
	class Bdevs_Profile_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_profile_widget',esc_html__('MediDove Footer Info','bdevs-toolkit'),array(
				'description' => esc_html__('MediDove Footer Info Widget','bdevs-toolkit'),
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
                    <div class="logo mb-20 white-logo">
                        <a href="<?php  print home_url(); ?>"><img src="<?php print esc_url($instance['white_logo']); ?>" alt=""></a>
                    </div>

                    <div class="logo mb-20 dark-logo">
                        <a href="<?php  print home_url(); ?>"><img src="<?php print esc_url($instance['dark_logo']); ?>" alt=""></a>
                    </div>

                    <div class="footer-text">
                         <p><?php print esc_html($instance['description']); ?></p>
                        <span><?php print esc_html($instance['email_address']) ; ?></span>
                        <span><?php print esc_html($instance['phone_number']) ; ?></span>
                    </div>

                    <div class="footer-social">
                    	<?php if(!empty($instance['facebook'])): ?>
                        <a href="<?php print esc_url($instance['facebook']); ?>"><i class="fab fa-facebook-f"></i></a>
                    	<?php endif; ?>

						<?php if(!empty($instance['twitter'])): ?>
                        <a href="<?php print esc_url($instance['twitter']); ?>"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>

						<?php if(!empty($instance['instagram'])): ?>
                        <a href="<?php print esc_url($instance['instagram']); ?>"><i class="fab fa-instagram"></i></a>
						<?php endif; ?>


						<?php if(!empty($instance['google_plus'])): ?>	
                        <a href="<?php print esc_url($instance['google_plus']); ?>"><i class="fab fa-google-plus-g"></i></a>
                    	<?php endif; ?>

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
			$email_address  = isset($instance['email_address'])? $instance['email_address']:'';
			$phone_number  = isset($instance['phone_number'])? $instance['phone_number']:'';
			$logo_white  = isset($instance['white_logo'])? $instance['white_logo']:'';
			$logo_dark  = isset($instance['dark_logo'])? $instance['dark_logo']:'';

			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$instagram  = isset($instance['instagram'])? $instance['instagram']:'';
			$google_plus  = isset($instance['google_plus'])? $instance['google_plus']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" class="widefat" value="<?php print esc_attr($title); ?>">

			<p>
				<button type="submit" class="button button-secondary" id="primary_logo_info">Upload White Logo</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('white_logo')); ?>" class="primary_logo_link" value="<?php print $logo_white ; ?>">
				<div class="primary-logo-show">
					<img src="<?php print $logo_white ; ?>" alt="" width="150" height="auto">
				</div>	
			</p>

			<p>
				<button type="submit" class="button button-secondary" id="dark_logo_info">Upload Dark Logo</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('dark_logo')); ?>" class="dark_logo_link" value="<?php print $logo_dark ; ?>">
				<div class="dark-logo-show">
					<img src="<?php print $logo_dark ; ?>" alt="" width="150" height="auto">
				</div>	
			</p>
			<p>
				<label for="title"><?php esc_html_e('Short Description:','bdevs-toolkit'); ?></label>
			</p>

			<textarea class="widefat" rows="7" cols="15" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>

			<p>
				<label for="title"><?php esc_html_e('Email Address:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('email_address')); ?>"  name="<?php print esc_attr($this->get_field_name('email_address')); ?>" class="widefat" value="<?php print esc_attr($email_address); ?>">

			<p>
				<label for="title"><?php esc_html_e('Phone Number:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('phone_number')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_number')); ?>" class="widefat" value="<?php print esc_attr($phone_number); ?>">

			<p>
				<label for="title"><?php esc_html_e('Facebook:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" class="widefat" value="<?php print esc_attr($facebook); ?>">

			<p>
				<label for="title"><?php esc_html_e('Twitter:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" class="widefat" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('instagram:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('instagram')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram')); ?>" class="widefat" value="<?php print esc_attr($instagram); ?>">
			<p>
				<label for="title"><?php esc_html_e('google_plus:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('google_plus')); ?>"  name="<?php print esc_attr($this->get_field_name('google_plus')); ?>" class="widefat" value="<?php print esc_attr($google_plus); ?>">
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			$instance['email_address'] = ( ! empty( $new_instance['email_address'] ) ) ? strip_tags( $new_instance['email_address'] ) : '';
			
			$instance['phone_number'] = ( ! empty( $new_instance['phone_number'] ) ) ? strip_tags( $new_instance['phone_number'] ) : '';

			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';

			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';

			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';

			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';

			$instance['google_plus'] = ( ! empty( $new_instance['google_plus'] ) ) ? strip_tags( $new_instance['google_plus'] ) : '';


			$instance['white_logo'] = ( ! empty( $new_instance['white_logo'] ) ) ? strip_tags( $new_instance['white_logo'] ) : '';
			$instance['dark_logo'] = ( ! empty( $new_instance['dark_logo'] ) ) ? strip_tags( $new_instance['dark_logo'] ) : '';

			return $instance;
		}
	}