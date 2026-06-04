<?php get_header(); ?>
    <div class="project-details-area pt-120 pb-90 ">
        <div class="container">
			<?php if( have_posts() ):
					while( have_posts() ): the_post();
						$bdevs_portfolio_thumb = function_exists('get_field') ? get_field('portfolio_thumb') : '';
						$project_images_gallerys =  function_exists('acf_photo_gallery') ? acf_photo_gallery('gallery_images', get_the_id()) : ''; 
						$portfolio_info_list = function_exists('get_field') ? get_field('portfolio_info_list') : '';

						?>	
			            <div class="row">
			                <div class="col-xl-4 col-lg-4">
			                    <div class="project-status mb-30">
			                        <ul>
			                            <li>
			                            	<b><?php echo wp_kses_post( $portfolio_info_list['gallery_date_label'] ); ?></b> 
			                            	<span><?php echo wp_kses_post( $portfolio_info_list['gallery_date'] ); ?></span>
			                            </li>
			                            <li>
			                            	<b><?php echo wp_kses_post( $portfolio_info_list['gallery_location_label'] ); ?></b> 
			                            	<span><?php echo wp_kses_post( $portfolio_info_list['gallery_location'] ); ?></span>
			                            </li>
			                            <li>
			                            	<b><?php echo wp_kses_post( $portfolio_info_list['gallery_client_label'] ); ?></b> 
			                            	<span><?php echo wp_kses_post( $portfolio_info_list['gallery_client'] ); ?></span>
			                            </li>
			                      
			                            <li>
			                            	<b><?php echo wp_kses_post( $portfolio_info_list['gallery_cat_label'] ); ?></b> 
			                            	<span><?php echo wp_kses_post( $portfolio_info_list['gallery_cat'] ); ?></span>
			                            </li>
			                            <li>
			                            	<b><?php echo wp_kses_post( $portfolio_info_list['gallery_project_link_label'] ); ?></b> 
			                            	<span><?php echo wp_kses_post( $portfolio_info_list['gallery_project_link'] ); ?></span>
			                            </li>
			                        </ul>
			                    </div>
			                    <?php do_action("medidove_portfolio_sidebar"); ?>
			                </div>
			                <div class="col-xl-8 col-lg-8">
			                	<div class="project-details-content">
				                    <div class="project-desc mb-30">
				                        <img src="<?php print esc_attr($bdevs_portfolio_thumb['url']); ?>" alt="<?php the_title(); ?>" />
				                    </div>
				                    <div class="project-desc mb-30">
				                        <?php the_content(); ?>
				                    </div>

						            <?php if (!empty($project_images_gallerys)) : ?>
							            <div class="row mt-50">

							            <?php foreach( $project_images_gallerys as $key => $image ) :  ?>
							            	<div class="col-xl-6 col-lg-6 col-md-6">
							                    <div class="project-desc mb-30">
							                    	<img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="img">
							                    </div>
							                </div>
							            <?php endforeach; ?>
							            </div>
						        	<?php endif; ?>

					        	</div>
			                </div>
			            </div>

						<?php 
					endwhile;
				endif; 
			?>
        </div>
    </div>
<?php get_footer(); ?>          