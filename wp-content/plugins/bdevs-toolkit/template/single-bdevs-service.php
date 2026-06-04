<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>

<div class="service-details-area pt-120 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8">
            <?php 
			if( have_posts() ):
				while( have_posts() ): the_post();
                    $bdevs_service_thumb = function_exists('get_field') ? get_field('service_thumb') : '';
                    $service_subtitle = function_exists('get_field') ? get_field('service_subtitle') : '';
					?>
                <article class="service-details-box">
                    <div class="service-details-thumb mb-80">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="section-title pos-rel mb-45">
                        <div class="section-text pos-rel">
                            <h5 class="green-color text-up-case"><?php print wp_kses_post( $service_subtitle ); ?></h5>
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                    <div class="service-details-text mb-30">
                       <?php the_content(); ?>
                    </div>
                </article>
                <?php 
				endwhile; wp_reset_query();
			endif; 
			?>
            </div>
            <div class="col-xl-5 col-lg-4">
            	<?php do_action("medidove_service_sidebar"); ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php get_footer();  ?>