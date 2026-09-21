<?php
/**
 * Page template — layout 2026.
 *
 * Overrides the parent's page.php (pt-120/pb-120 full-width column). The
 * title band is rendered by physio_layout_page_head() from the header hook;
 * this file only lays out the content column:
 *   hub       full container width (card grids)
 *   person    photo aside + bio column
 *   other     single reading-width column
 *
 * @package medidove-child
 */

get_header();

$physio_kind = function_exists( 'physio_layout_kind' ) ? physio_layout_kind() : '';
?>

<div class="page-area physio-page-area">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();

			$physio_photo = ( 'person' === $physio_kind && function_exists( 'physio_layout_photo' ) )
				? physio_layout_photo( get_post_field( 'post_name', get_the_ID() ) )
				: '';

			if ( $physio_photo ) :
				?>
				<div class="physio-person">
					<aside class="physio-person__photo">
						<img src="<?php echo esc_url( $physio_photo ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
					</aside>
					<div class="physio-article physio-article--person medidove-page-content">
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
					</div>
				</div>
				<?php
			else :
				?>
				<div class="physio-article physio-article--<?php echo esc_attr( $physio_kind ? $physio_kind : 'page' ); ?> medidove-page-content">
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				</div>
				<?php
			endif;
		endwhile;
		?>
	</div>
</div>

<?php
get_footer();
