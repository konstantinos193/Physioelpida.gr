<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  MediDove
 */
get_header(); ?>

<div class="doctor-details-area pt-115 pb-70">
    <div class="container">
        <div class="row">
        <?php 
            if( have_posts() ):
            while( have_posts() ):the_post();

                    $designation = function_exists('get_field') ? get_field('member_designation') : '';
                    $facebook = function_exists('get_field') ? get_field('profile_fb_url') : '';
                    $twitter = function_exists('get_field') ? get_field('profile_twitter_url') : '';
                    $instagram = function_exists('get_field') ? get_field('profile_instagram_url') : '';
                    $youtube = function_exists('get_field') ? get_field('profile_youtube_url') : '';
                    $linkedin = function_exists('get_field') ? get_field('profile_linkedin_url') : '';
                    $member_info_list = function_exists('get_field') ? get_field('member_info_list') : '';

                    $member_qualifications_title = function_exists('get_field') ? get_field('member_qualifications_title') : '';
                    $member_info_list = function_exists('get_field') ? get_field('member_info_list') : '';

                    ?>
            <div class="col-xl-7 col-lg-8">
                <article class="doctor-details-box">
                    <?php the_content(); ?>
                </article>
            </div>


            <div class="col-xl-5 col-lg-4">
                <div class="service-widget mb-50">
                    <div class="team-wrapper team-box-2 team-box-3 text-center mb-30">
                        <div class="team-thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="team-member-info mt-35 mb-35">
                            <h3><?php the_title(); ?></h3>
                            <h6 class="f-500 text-up-case letter-spacing pink-color"><?php echo wp_kses_post( $designation ); ?></h6>
                        </div>
                        <div class="team-social-profile">
                            <ul>
                                <?php if ($facebook): ?>
                                <li><a href="<?php print esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>

                                <?php if ($twitter): ?>
                                <li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>

                                <?php if ($instagram): ?>
                                <li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>

                                <?php if ($youtube): ?>
                                <li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
                                <?php endif; ?>

                                <?php if ($linkedin): ?>
                                <li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if (!empty($member_qualifications_title)) : ?>
                <div class="service-widget mb-50">
                    <?php if (!empty($member_qualifications_title)) : ?>
                    <div class="widget-title-box mb-30">
                        <h3 class="widget-title"><?php print esc_html($member_qualifications_title); ?></h3>
                    </div>
                    <?php endif; ?>
                    <div class="more-service-list">
                        <ul>
                            <?php if (!empty($member_info_list['subject_name'])) : ?>
                            <li>
                                <a href="#">
                                    <div class="more-service-icon">
                                        <img src="<?php echo wp_kses_post( $member_info_list['subject_icon']['url'] ); ?>" alt="icon">
                                    </div>
                                    <div class="more-service-title doctor-details-title">
                                        <?php echo wp_kses_post( $member_info_list['subject_name'] ); ?>
                                        <span><?php echo wp_kses_post( $member_info_list['institute_name'] ); ?></span>
                                    </div>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (!empty($member_info_list['subject_name_2'])) : ?>
                            <li>
                                <a href="#">
                                    <div class="more-service-icon">
                                        <img src="<?php echo wp_kses_post( $member_info_list['subject_icon_2']['url'] ); ?>" alt="icon">
                                    </div>
                                    <div class="more-service-title doctor-details-title">
                                        <?php echo wp_kses_post( $member_info_list['subject_name_2'] ); ?>
                                        <span><?php echo wp_kses_post( $member_info_list['institute_name_2'] ); ?></span>
                                    </div>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (!empty($member_info_list['subject_name_3'])) : ?>
                            <li>
                                <a href="#">
                                    <div class="more-service-icon">
                                        <img src="<?php echo wp_kses_post( $member_info_list['subject_icon_3']['url'] ); ?>" alt="icon">
                                    </div>
                                    <div class="more-service-title doctor-details-title">
                                        <?php echo wp_kses_post( $member_info_list['subject_name_3'] ); ?>
                                        <span><?php echo wp_kses_post( $member_info_list['institute_name_3'] ); ?></span>
                                    </div>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                <?php do_action("medidove_member_sidebar"); ?>
            </div>
                <?php 
                endwhile; wp_reset_query();
            endif; 
        ?>
        </div>
    </div>
</div>


<?php get_footer();  ?>