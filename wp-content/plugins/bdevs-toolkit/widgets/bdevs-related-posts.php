<?php

add_filter('the_content', 'Medidove_related_posts');

function Medidove_related_posts($def){
	global $post;


	if( is_single() ){

			$cats = get_the_terms($post->ID, 'category');

			$cat_ids = array();

			if( is_array($cats) ){
				foreach ($cats as $key => $value) {
					$cat_ids[] = $value->name;
				}
			}

			$q = new WP_Query(array(
				'post_type'			=> 'post',
				'posts_per_page'	=> 2,
				'category__in'		=> array($cat_ids),
				'post__not_in'		=> array($post->ID)
			));

		?>
					<?php $def .= '
						<div class="releted-post mt-45">
                            <h3>Releted Post</h3>
                            <div class="row">
                            '; ?>
		
				<?php while( $q->have_posts() ):$q->the_post(); ?>
					
					<?php 
						$def .= '
						    <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="single-rp mb-45">
						';

							if(has_post_thumbnail()){
								$def .= 	'
								    <div class="rp-thumb">
                                        <a href="'.get_permalink().'">'.get_the_post_thumbnail( null, 'medium', array('class' => '') ).'</a>
                                    </div>
								';
							}
						
						$def .= '
                                    <div class="rp-content">
                                        <span class="rp-date"><i class="fal fa-calendar-alt"></i>'.get_the_time(get_option("date_format")).'</span>

                                       

                                        <h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>

                                        <p>'.wp_trim_words(get_the_content(), '20', '...').'</p>
                                    </div>
                                </div>
                            </div>       
						';
					?>

				<?php endwhile; wp_reset_postdata(); ?>		
				<?php	$def .= '		
							</div>
						</div>
						'; ?>

						
	
		<?php	return $def;	

	}

}
