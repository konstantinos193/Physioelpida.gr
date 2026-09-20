<?php
/**
 * Header — rebuilt 2026.
 *
 * Replaces the parent's float-based header (medidove_header_style hook chain),
 * which could not fit the expanded 2026 nav menu: the 8-item menu plus social
 * icons overflowed col-xl-9, so the floats wrapped and the header tripled in
 * height. This version uses a flex row: logo left, menu + social icons right,
 * hamburger below the lg breakpoint.
 *
 * Keeps: the preloader, medidove_before_main_content (breadcrumb + search
 * overlay), medidove_mobile() off-canvas, and the #header-sticky id used by
 * main.js for the scroll-sticky behaviour.
 *
 * @package medidove-child
 */

$medidove_box = function_exists('get_field') && !empty(get_field( 'medidove_box' )) ? 'medidove_box' : 'medidove_full';

$medidove_preloader = get_theme_mod('medidove_preloader');
$medidove_preloader_text = get_theme_mod('medidove_preloader_text');
$medidove_preloader_text_off = get_theme_mod('medidove_preloader_text_off');
$allowed_html = function_exists('medidove_kses_allowed_html') ? medidove_kses_allowed_html() : 'post';

$medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
$medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
$medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky';

$medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');
$medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
$medidove_top_bg_img = !empty( $medidove_header_top_bg_img_from_page ) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;

$medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
$medidove_header_top_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
if ( !empty( $medidove_header_top_bg_color_from_page ) ) {
	$medidove_header_top_bg_color = $medidove_header_top_bg_color_from_page;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body id="<?php print esc_attr($medidove_box); ?>" <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php if(!empty($medidove_preloader)) : ?>
	<!-- preloader  -->
	<div id="preloader">
		<div id="ctn-preloader" class="ctn-preloader">
			<div class="animation-preloader">
				<div class="spinner"></div>
				<?php if(!empty($medidove_preloader_text_off)) : ?>
					<?php print wp_kses($medidove_preloader_text, $allowed_html); ?>
				<?php endif; ?>
			</div>
			<div class="loader">
				<div class="row">
					<div class="col-3 loader-section section-left"><div class="bg"></div></div>
					<div class="col-3 loader-section section-left"><div class="bg"></div></div>
					<div class="col-3 loader-section section-right"><div class="bg"></div></div>
					<div class="col-3 loader-section section-right"><div class="bg"></div></div>
				</div>
			</div>
		</div>
	</div>
	<!-- preloader end -->
	<?php endif; ?>

	<!-- header start -->
	<header class="physio-header">
		<?php if( $medidove_topbar_switch ): ?>
		<div class="top-bar physio-topbar d-none d-md-block" data-bg-color="<?php echo esc_attr($medidove_header_top_bg_color); ?>" data-background="<?php echo esc_url($medidove_top_bg_img); ?>">
			<div class="container">
				<div class="physio-topbar-inner">
					<div class="header-info">
						<?php medidove_header_phone_number(); ?>
						<?php medidove_header_email_address(); ?>
						<?php medidove_header_time(); ?>
					</div>
					<div class="physio-topbar-cta">
						<?php medidove_header_button(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div id="<?php echo esc_attr($medidove_sticky_id); ?>" class="physio-menubar">
			<div class="container physio-menubar-inner">
				<div class="logo logo-circle pos-rel physio-logo">
					<?php medidove_header_logo(); ?>
				</div>
				<div class="physio-nav">
					<div class="header__menu">
						<?php medidove_header_menu(); ?>
					</div>
					<div class="header-social-icons physio-header-social d-none d-xl-block">
						<?php medidove_header_social_profiles(); ?>
					</div>
					<div class="open-mobile-menu d-lg-none">
						<a href="javascript:void(0);"><i class="fal fa-bars"></i></a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header end -->

	<!-- slide-bar start -->
	<?php medidove_mobile(); ?>
	<!-- slide-bar end -->

	<!-- wrapper-box start -->
	<?php do_action('medidove_before_main_content'); ?>
