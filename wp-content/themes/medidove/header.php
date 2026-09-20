<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package medidove
 */ 

    $medidove_box = function_exists('get_field') && !empty(get_field( 'medidove_box' )) ? 'medidove_box' : 'medidove_full'; 

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body id="<?php print esc_attr($medidove_box); ?>" <?php body_class(); ?>>
    
    <?php wp_body_open(); ?> 

    <?php   
    $medidove_preloader = get_theme_mod('medidove_preloader'); 
    $medidove_preloader_text = get_theme_mod('medidove_preloader_text'); 
    $medidove_preloader_text_off = get_theme_mod('medidove_preloader_text_off'); 
    $allowed_html = medidove_kses_allowed_html();
    ?>
    
    <!-- Add your site or application content here -->

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
                        <div class="col-3 loader-section section-left">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-left">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-right">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-right">
                            <div class="bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->
        <?php endif; ?>

    <!-- header start -->
    <?php do_action('medidove_header_style'); ?>
    <!-- header end -->
    <!-- wrapper-box start -->
    <?php do_action('medidove_before_main_content'); ?>
    





        