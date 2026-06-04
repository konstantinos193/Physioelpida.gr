<?php
	/**
	 * Medidove Footer full Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	Medidove/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'Medidove_companyProfile_widget');
	function Medidove_companyProfile_widget() {
		register_widget('Medidove_companyProfile_widget');
	}
	
	
	class Medidove_CompanyProfile_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('Medidove_companyProfile_widget',esc_html__('Medidove Info Center','bdevs-toolkit'),array(
				'description' => esc_html__('Medidove Info Center Full Widget','bdevs-toolkit'),
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


                <div class="s-footer-text mb-45">
                    <div class="f-logo mb-45">
                        <a href="<?php  print home_url(); ?>"><img src="<?php print esc_url($instance['image_box_image']); ?>" alt=""></a>
                    </div>
                    <p><?php print esc_html($instance['description']); ?></p>
                </div>
                <div class="footer-social sf-social">
                	<?php if(!empty($instance['facebook'])): ?>
                    <a href="<?php print esc_url($instance['facebook']); ?>"><i class="fab fa-facebook-f"></i></a>
                	<?php endif; ?>

					<?php if(!empty($instance['twitter'])): ?>
                    <a href="<?php print esc_url($instance['twitter']); ?>"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>

					<?php if(!empty($instance['behance'])): ?>
                    <a href="<?php print esc_url($instance['behance']); ?>"><i class="fab fa-behance"></i></a>
					<?php endif; ?>


					<?php if(!empty($instance['youtube'])): ?>	
                    <a href="<?php print esc_url($instance['youtube']); ?>"><i class="fab fa-youtube"></i></a>
                	<?php endif; ?>

					<?php if(!empty($instance['pinterest'])): ?>	
                    <a href="<?php print esc_url($instance['pinterest']); ?>"><i class="fab fa-pinterest-p"></i></a>
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
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';

			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$behance  = isset($instance['behance'])? $instance['behance']:'';
			$youtube  = isset($instance['youtube'])? $instance['youtube']:'';
			$pinterest  = isset($instance['pinterest'])? $instance['pinterest']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">
			<p>
				<label for="title"><?php esc_html_e('Short Description:','bdevs-toolkit'); ?></label>
			</p>

			<textarea class="widefat" rows="7" cols="15" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>

			<p>
				<button type="submit" class="button button-secondary" id="author_info_image">Upload Media</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('image_box_image')); ?>" class="image_er_link" value="<?php print $author_img ; ?>">
				<div class="author-image-show">
					<img src="<?php print $author_img ; ?>" alt="" width="150" height="auto">
				</div>	
			</p>

			<p>
				<label for="title"><?php esc_html_e('Facebook:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" value="<?php print esc_attr($facebook); ?>">


			<p>
				<label for="title"><?php esc_html_e('Twitter:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Behance:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('behance')); ?>"  name="<?php print esc_attr($this->get_field_name('behance')); ?>" value="<?php print esc_attr($behance); ?>">
			<p>
				<label for="title"><?php esc_html_e('Youtube:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('youtube')); ?>"  name="<?php print esc_attr($this->get_field_name('youtube')); ?>" value="<?php print esc_attr($youtube); ?>">

			<p>
				<label for="title"><?php esc_html_e('Pinterest:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('pinterest')); ?>"  name="<?php print esc_attr($this->get_field_name('pinterest')); ?>" value="<?php print esc_attr($pinterest); ?>">
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';

			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';

			$instance['behance'] = ( ! empty( $new_instance['behance'] ) ) ? strip_tags( $new_instance['behance'] ) : '';

			$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';

			$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';


			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';

			return $instance;
		}
	}