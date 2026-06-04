<?php
	add_action('widgets_init', 'bdevs_recent_post_without_img');

	function bdevs_recent_post_without_img() {
		register_widget('bdevs_recent_post_without_img');
	}
	class bdevs_recent_post_without_img extends WP_Widget{
		public function __construct(){
			parent::__construct('bdevs_recent_post_without_img',__('Siniko Recent Posts','bdevs-toolkit'),array(
			'description' => __('Add Recent Post Widget','bdevs-toolkit'),
			));
		}
		public function widget($args,$instance){

				extract($args);
			 	echo $before_widget; 

			if($instance['title']):
	     		echo $before_title; ?> 
	     		<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
	     		<?php echo $after_title; ?>
	     	<?php endif; ?>

            <ul class="footer-post">
            	<?php
					$data = array('post_type'=>'post','numberposts'=>$instance['posts']);
					$recentPost = wp_get_recent_posts( $data );
					foreach($recentPost as $recentPosts){
						get_the_date()
				?>
	                <li>
    					<div class="footer-info">
							<h5>
								<a href="<?php print esc_url($recentPosts['guid']); ?>">
								<?php print wp_trim_words(($recentPosts['post_title']), 10, ''); ?>

								</a>
							</h5>
							<span><?php the_time(get_option( 'date_format' )); ?></span>
						</div>
	                </li>
                    <?php } ?>
                </ul>

                <?php echo $after_widget; ?>

			<?php

			

		}

		public function form($instance){
			$title  = isset($instance['title']) ? $instance['title']:' ';
			$posts = !empty($instance['posts']) ? $instance['posts']:3;

		?>
			<p>
				<label for="title"><?php echo esc_html("Title:")?></label>
			</p>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>"  name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
			<p>
				<label for="posts"><?php echo esc_html("Number of posts to show:")?></label>
			</p>
			<input type="text" id="<?php echo $this->get_field_id('posts'); ?>"  name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $posts; ?>">

		<?php
		}
	}