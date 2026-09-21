<?php
/**
 * Blog index (/blog/) — layout 2026.
 *
 * The parent's index.php prints a screen-reader-only H1 next to the visible
 * one physio_layout_page_head() now renders; this drops it and keeps the
 * theme's post cards (template-parts/content.php) and pagination.
 *
 * @package medidove-child
 */

get_header();
?>

<div class="physio-page-area">
	<div class="container">
		<div class="physio-article physio-article--blog blog-post-items">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				?>
				<div class="paginations">
					<?php medidove_pagination( '<i class="fas fa-angle-double-left"></i>', '<i class="fas fa-angle-double-right"></i>', '', array( 'class' => '' ) ); ?>
				</div>
				<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
	</div>
</div>

<?php
get_footer();
