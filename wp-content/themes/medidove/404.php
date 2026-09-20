<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package medidove
 */

get_header();
?>

<div class="blog-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
            	<?php
            		if (rtl_enable()) {
			            $medidove_error_404_text = get_theme_mod('medidove_error_404_text_rtl','404 text'); 
			         }
			        else { 
			            $medidove_error_404_text = get_theme_mod('medidove_error_404_text','404 text'); 
			        }

			        if (rtl_enable()) {
			            $medidove_error_title = get_theme_mod('medidove_error_title_rtl','Page not found '); 
			         }
			        else { 
			            $medidove_error_title = get_theme_mod('medidove_error_title','Page not found '); 
			        }

			        if (rtl_enable()) {
			            $medidove_error_desc = get_theme_mod('medidove_error_desc_rtl','Oops! The page you are looking for does not exist. It might have been moved or deleted. '); 
			         }
			        else { 
			            $medidove_error_desc = get_theme_mod('medidove_error_desc','Oops! The page you are looking for does not exist. It might have been moved or deleted. '); 
			        }
            		
            		
            		$medidove_error_link_text = get_theme_mod('medidove_error_link_text','Back To Home '); 
            		
            	?>
				<div class="error-404 not-found mb-20">
					<div class="page-content">
	                    <div class="error-404-content text-center">
	                        <h1 class="error-404-title"><?php print esc_html( $medidove_error_404_text ); ?></h1>
	                        <h2 class="error-title"><?php print esc_html( $medidove_error_title ); ?></h2>
	                        <div class="error-content">
	                            <div class="error-text">
	                                <span><?php print esc_html( $medidove_error_desc ); ?></span>
	                            </div>
	                            <div class="error-btn-bh">
	                            	<a href="<?php print esc_url(home_url('/')); ?>" class="btn btn-icon ml-0"><span>+</span><?php print esc_html($medidove_error_link_text); ?></a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
