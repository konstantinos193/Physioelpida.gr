<?php
/**
 * bdevs-service single (/apokatastasi/*) — layout 2026.
 *
 * Overrides bdevs-toolkit/template/single-bdevs-service.php. The plugin
 * template prints its own <h1> + section-title; the page title now does that.
 * The services-sidebar widget area is not rendered: the only widget in it is
 * the theme demo's image widget linking to devsnews.com.
 *
 * @package medidove-child
 */

get_header();
?>

<div class="physio-page-area physio-page-area--cpt">
	<div class="container">
		<div class="row">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="col-lg-8">
					<article class="physio-article physio-article--service service-details-box">
						<?php the_content(); ?>
					</article>
				</div>

				<div class="col-lg-4">
					<aside class="physio-aside">
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="physio-aside__photo">
							<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
						</div>
						<?php endif; ?>
					</aside>
				</div>
				<?php
			endwhile;
			?>
		</div>
	</div>
</div>

<?php
get_footer();
