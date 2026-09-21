<?php
/**
 * Single post — layout 2026.
 *
 * Overrides the parent's single.php: same reading column as the condition
 * pages. The H1 comes from physio_layout_page_head() (the parent's
 * content.php only had an <h3 class="blog-title">), the date sits under it,
 * and the content gets the .service-details-text typography. Comments keep
 * the theme's template and follow the post's own discussion setting.
 *
 * @package medidove-child
 */

get_header();
?>

<div class="physio-page-area">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'physio-article physio-article--post' ); ?>>
				<div class="physio-post-meta">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<?php if ( get_the_modified_date( 'Y-m-d' ) !== get_the_date( 'Y-m-d' ) ) : ?>
						<span class="physio-post-meta__sep" aria-hidden="true">·</span>
						<span><?php echo esc_html( ( function_exists( 'physio_seo_is_en' ) && physio_seo_is_en() ) ? 'Updated' : 'Ενημέρωση' ); ?> <?php echo esc_html( get_the_modified_date() ); ?></span>
					<?php endif; ?>
				</div>

				<?php if ( has_post_thumbnail() ) : ?>
				<div class="physio-post-thumb">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
				<?php endif; ?>

				<div class="service-details-text physio-post-content">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'medidove' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</article>

			<?php
			if ( comments_open() || get_comments_number() ) :
				?>
				<div class="physio-article physio-article--post physio-comments">
					<?php comments_template(); ?>
				</div>
				<?php
			endif;
		endwhile;
		?>
	</div>
</div>

<?php
get_footer();
