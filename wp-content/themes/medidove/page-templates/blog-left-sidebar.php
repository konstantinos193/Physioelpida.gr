<?php

/**
* Template Name: Blog Left Sidebar
 * @package medidove
 */

get_header();

$blog_column = is_active_sidebar( 'right-sidebar' ) ? 8 : 12 ;

?>

<section class="blog-area pt-120 pb-80">
    <div class="container">
        <div class="row">

			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
		        <div class="col-lg-4">
					<?php get_sidebar(); ?>
	            </div>
			<?php endif; ?>

			<div class="col-lg-<?php print esc_attr($blog_column); ?> blog-post-items">
				<?php
					$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
					$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
					$wp_query = new WP_Query( array(
						'post_type' => 'post',
						'paged'     => $paged,
						'page'      => $paged,
					) );
				if ( $wp_query->have_posts() ) : ?>

						<?php
						/* Start the Loop */
						 while ( $wp_query->have_posts() ) : $wp_query->the_post();
							global $post; ?>
							<?php

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'left-sidebar' ); 

							?>
											
						<?php
						endwhile;
						?>
						<div class="col-lg-12">
			               	<div class="paginations text-center">
			               		<?php medidove_pagination('<i class="fas fa-angle-double-left"></i>', '<i class="fas fa-angle-double-right"></i>', '', array('class' => '')); ?>
			                </div>
		                </div>
					<?php
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

        	</div>
        </div>
    </div>
</section>

<?php
get_footer();
