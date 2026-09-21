<?php
/**
 * bdevs-member single (/therapeies/*) — layout 2026.
 *
 * Overrides bdevs-toolkit/template/single-bdevs-member.php (locate_template
 * checks the theme first). Same two columns, but the H1 comes from the page
 * title (the content's own section-title block is stripped on output) and the
 * featured image sits in a plain photo card instead of the team-box widget.
 * The members-sidebar widget area is not rendered (empty / theme demo junk).
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
					<article class="physio-article physio-article--member doctor-details-box">
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
