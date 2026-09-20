<?php
$author_data =  get_the_author_meta('description',get_query_var('author') );
$author_bio_avatar_size = 120;
if($author_data !=''):
?>

	<div class="author-wrapper mt-45">
		<div class="author-img">
			<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
				<?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?>
			</a>
		</div>
		<div class="author-text">
			<h4>
				<span class="media-heading">
					<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
						<?php print get_the_author(); ?>
					</a>
				</span>
			</h4>
			<div class="author-icon">
				<?php if( get_the_author_meta( 'profile_fb_url') ): ?>
				<a href="<?php print esc_attr(get_the_author_meta( 'profile_fb_url')); ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a>
				<?php endif; ?>
				<?php if( get_the_author_meta( 'profile_twitter_url') ): ?>
				<a href="<?php print esc_attr(get_the_author_meta( 'profile_twitter_url'));?>" target="_blank" ><i class="fab fa-twitter"></i></a>
				<?php endif; ?>
				<?php if( get_the_author_meta( 'profile_google_url') ): ?>
				<a href="<?php print esc_attr(get_the_author_meta( 'profile_google_url')); ?>" target="_blank" ><i class="fab fa-google-plus-g"></i></a>
				<?php endif; ?>
				<?php if( get_the_author_meta( 'profile_instagram_url') ): ?>
				<a href="<?php print esc_attr(get_the_author_meta( 'profile_instagram_url')); ?>" target="_blank" ><i class="fab fa-linkedin-in"></i></a>
				<?php endif; ?>
				<?php if( get_the_author_meta( 'profile_behance_url') ): ?>
				<a href="<?php print esc_attr(get_the_author_meta( 'profile_behance_url')); ?>" target="_blank" ><i class="fab fa-behance-square"></i></a>
				<?php endif; ?>
			</div>
			<p><?php the_author_meta( 'description' ); ?> </p>
		</div>
	</div>

<?php endif; ?>
