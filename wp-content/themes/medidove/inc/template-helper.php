<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package medidove
 */

/**
*
* medidove header
*/
add_action('medidove_header_style', 'medidove_check_header', 10);

function medidove_check_header() {
    $medidove_header_style = function_exists('get_field') ? get_field( 'medidove_choice_header_style' ) : NULL;

    $medidove_default_header_style = get_theme_mod('choose_default_header', 'header-style-1' );

    if( $medidove_header_style == 'header-style-1' ) {
        medidove_header_default();
    }
    elseif( $medidove_header_style == 'header-style-2' ) {
        medidove_header_style_2();
    }  
    elseif( $medidove_header_style == 'header-style-3' ) {
        medidove_header_style_3();
    }  
    elseif( $medidove_header_style == 'header-style-4' ) {
        medidove_header_style_4();
    } 
    elseif( $medidove_header_style == 'header-style-5' ) {
        medidove_header_style_5();
    }
    elseif( $medidove_header_style == 'header-style-6' ) {
        medidove_header_style_6();
    }
    elseif( $medidove_header_style == 'header-style-7' ) {
        medidove_header_style_7();
    }
    elseif( $medidove_header_style == 'header-style-8' ) {
        medidove_header_style_8();
    }
    else {
        
        /** default header style **/
        if($medidove_default_header_style == 'header-style-1'){
            medidove_header_default();
        }elseif($medidove_default_header_style == 'header-style-2'){
            medidove_header_style_2();
        }elseif($medidove_default_header_style == 'header-style-3'){
            medidove_header_style_3();
        }elseif($medidove_default_header_style == 'header-style-4'){
            medidove_header_style_4();
        }elseif($medidove_default_header_style == 'header-style-5'){
            medidove_header_style_5();
        }elseif($medidove_default_header_style == 'header-style-6'){
            medidove_header_style_6();
        }elseif($medidove_default_header_style == 'header-style-7'){
            medidove_header_style_7();
        }elseif($medidove_default_header_style == 'header-style-8'){
            medidove_header_style_8();
        }

    }

}


/**
* default header style
*/
function medidove_header_default() {
    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
    $medidove_header_lang            = get_theme_mod('medidove_header_lang');

    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 

    // header top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
    $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');

    $medidove_top_bg_img = function_exists('get_field') && !empty(get_field( 'header_top_bg_image' )) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;

    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }
    ?>
    <header class="header-default">
        <?php if( $medidove_topbar_switch ): ?>
        <div class="top-bar d-none d-md-block" data-bg-color="<?php echo esc_attr($medidove_header_top_bg_color); ?>" data-background="<?php echo esc_url($medidove_top_bg_img); ?>">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-7 offset-xl-1 col-lg-6 offset-lg-0 col-md-7 offset-md-1">
                        <div class="header-info">
                            <?php medidove_header_phone_number(); ?>
                            <?php medidove_header_email_address(); ?>
                            <?php medidove_header_time(); ?>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-4">
                        <div class="header-top-right-btn f-right">
                            <?php medidove_header_button(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- menu-area -->
        <div id="<?php echo esc_attr($medidove_sticky_id); ?>" class="header-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-7 d-flex align-items-center">
                        <div class="logo logo-circle pos-rel">
                            <?php medidove_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-7 col-5">
                        <div class="open-mobile-menu f-right d-lg-none">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                        <div class="header-right f-right">
                            <?php if( $medidove_header_lang ): ?>
                            <div class="header-lang f-right pos-rel">
                                <div class="lang-icon">
                                <?php $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
                                if ( !empty( $languages ) ):
                                    foreach($languages as $lan):
                                        if($lan['active']==1): ?> 
                                        <div class="lang-icon-img">
                                            <img src="<?php print esc_url($lan['country_flag_url']); ?>" alt="<?php print esc_html($lan['language_code']); ?>">
                                        </div>    
                                        <span><?php print esc_html($lan['language_code']); ?><i class="fas fa-angle-down"></i></span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <img src="<?php print get_template_directory_uri(); ?>/img/icon/lang.png" alt="Language">
                                    <span><?php print esc_html__('EN', 'medidove'); ?><i class="fas fa-angle-down"></i></span>
                                <?php endif; ?>
                                </div>
                                <?php do_action('medidove_language'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="header-social-icons f-right d-none d-xl-block">
                                <?php medidove_header_social_profiles(); ?>
                            </div>
                        </div>
                        <div class="header__menu f-right">
                            <?php medidove_header_menu(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end -->

<?php 
}


/**
* header style 2
*/
function medidove_header_style_2() {
    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');

    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 

    // header top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
    $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');

    $medidove_top_bg_img = function_exists('get_field') && !empty(get_field( 'header_top_bg_image' )) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;

    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }

    ?>
    <header >
        <div id="<?php print esc_attr($medidove_sticky_id); ?>" class="header-menu-area header-padding transparrent-header header-style-2">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-2 col-lg-2 col-7">
                        <div class="logo pos-rel logo-white-style">
                            <?php medidove_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 d-none d-lg-block">
                        <div class="header__menu header-menu-white">
                            <?php medidove_header_menu(); ?>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-2 d-none d-lg-block d-xl-block">
                        <div class="header-right f-right">
                            <?php medidove_contact_us(); ?>
                            <?php medidove_make_a_call(); ?>
                        </div>
                    </div>
                    <div class="col-5 d-lg-none">
                        <div class="open-mobile-menu text-right">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end --> 
<?php 
}

/**
* header style 3
*/
function medidove_header_style_3() {
    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 
    $header_phone_number = get_theme_mod('medidove_header_phone_number', '#');

    $header_email_address            = get_theme_mod('medidove_header_email_address', '#');

    $medidove_header_lang            = get_theme_mod('medidove_header_lang');

    // top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_img' ) : NULL;
    if( !empty( $medidove_header_top_bg_img_from_page )){
        $medidove_header_top_bg_img = function_exists('get_field') ? get_field( 'medidove_header_top_bg_img' ) : NULL;
    }else{
        $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');
    }

    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }
    ?>
    <header>
        <!-- menu-area -->
        <div class="top-bar-white top-bar-3 pt-30 pb-30 header-style-3" data-bg-color="<?php echo esc_attr($medidove_header_top_bg_color); ?>" data-background="<?php echo esc_url($medidove_top_bg_img); ?>">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-7">
                        <div class="logo logo-3 pos-rel">
                            <?php medidove_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-5">
                        <div class="open-mobile-menu f-right d-lg-none">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                        <?php if( $medidove_header_lang ): ?>
                        <div class="header-lang header-lang-3 f-right pos-rel p-0">
                            <div class="lang-icon">
                            <?php $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
                            if ( !empty( $languages ) ):
                                foreach($languages as $lan):
                                    if($lan['active']==1): ?> 
                                    <div class="lang-icon-img">
                                        <img src="<?php print esc_url($lan['country_flag_url']); ?>" alt="<?php print esc_html($lan['language_code']); ?>">
                                    </div>    
                                    <span><?php print esc_html($lan['language_code']); ?><i class="fas fa-angle-down"></i></span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <img src="<?php print get_template_directory_uri(); ?>/img/icon/lang.png" alt="Language">
                                <span><?php print esc_html__('EN', 'medidove'); ?><i class="fas fa-angle-down"></i></span>
                            <?php endif; ?>
                            </div>
                            <?php do_action('medidove_language'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if( $header_email_address ): ?>
                        <div class="header-cta-info header-cta-info-3 d-flex f-left d-none">
                            <div class="header-cta-icon">
                                 <?php medidove_message_icon(); ?>
                            </div>
                            <div class="header-cta-text">
                                <?php medidove_header_email_title(); ?>
                                <span class="primary-color"><?php print esc_html( $header_email_address ); ?></span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if( $header_phone_number ): ?>
                        <div class="header-cta-info header-cta-info-3 d-flex f-left">
                            <div class="header-cta-icon">
                                 <?php medidove_phone_icon(); ?>
                            </div>
                            <div class="header-cta-text">
                                <?php medidove_header_phone_title(); ?>
                                <span class="primary-color"><?php print esc_html($header_phone_number); ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="<?php echo esc_attr($medidove_sticky_id); ?>" class="header-menu-area header-menu-blue header-style-3 theme-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="header__menu menu-dark">
                            <?php medidove_header_menu(); ?>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="header-right f-right">
                            <div class="header-social-icons f-right d-none d-lg-block p-0">
                                <?php medidove_header_social_profiles(); ?>
                                <ul>
                                    <li class="header-menu-search">
                                        <a class="nav-search search-trigger" href="#"><i class="fas fa-search"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end -->

<?php 
}

/**
* medidove header style 4
*/
function medidove_header_style_4() {
    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 
    $medidove_header_default_search            = get_theme_mod('medidove_header_default_search');

    // header top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
    $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');

    $medidove_top_bg_img = function_exists('get_field') && !empty(get_field( 'header_top_bg_image' )) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;

    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }
    ?>
    <header class="header-style-4">
        <?php if( $medidove_topbar_switch ): ?>
        <div class="top-bar-fefault d-none d-lg-block" data-bg-color="<?php echo esc_attr($medidove_header_top_bg_color); ?>" data-background="<?php echo esc_url($medidove_top_bg_img); ?>">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="header-info">
                            <?php medidove_header_address(); ?>
                            <?php medidove_header_phone_number(); ?>
                            <?php medidove_header_email_address(); ?>
                            <?php medidove_header_time(); ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5">
                         <div class="header-social-icons header-defualt-social-icons f-right d-none d-md-block">
                            <?php medidove_header_social_profiles(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- menu-area -->
        <div id="<?php echo esc_attr($medidove_sticky_id); ?>" class="header-menu-area header-defualt-menu-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-7 d-flex align-items-center">
                        <div class="logo pos-rel">
                            <?php medidove_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 d-none d-lg-block">
                        <div class="header-right header-defualt-right f-right">
                            <div class="header-top-right-btn f-right d-none d-lg-block">
                                <?php medidove_header_button(); ?>
                            </div>
                            <?php if( $medidove_header_default_search ): ?>
                            <div class="header-social-icons f-right d-none d-xl-block p-0">
                                <ul>
                                    <li class="header-menu-search m-0">
                                        <a class="nav-search search-trigger" href="#"><i class="fas fa-search"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="header__menu f-right">
                            <?php medidove_header_menu(); ?>
                        </div>
                    </div>
                    <div class="col-5 d-lg-none">
                        <div class="open-mobile-menu text-right">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end -->

<?php 
}

/**
* medidove header style 5
*/
function medidove_header_style_5() {
    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
    $medidove_header_default_search            = get_theme_mod('medidove_header_default_search');
    $medidove_header_lang            = get_theme_mod('medidove_header_lang');

    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 

    // header top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
    $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');

    $medidove_top_bg_img = function_exists('get_field') && !empty(get_field( 'header_top_bg_image' )) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;

    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }

    ?>
    <!-- header begin -->
    <header class="style-5 header-style-5">
        <?php 
        if( $medidove_topbar_switch ): ?>
            <div class="top-bar4 white-bg top-border d-none d-md-block pl-55 pr-55 pt-25 pb-25" data-bg-color="<?php echo esc_attr($medidove_header_top_bg_color); ?>" data-background="<?php echo esc_url($medidove_top_bg_img); ?>">
                <div class="container-fluid">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="header-info header-info4 p-0">
                                <?php medidove_header_email_address(); ?>
                                <?php medidove_header_phone_number(); ?>
                                <?php medidove_header_time(); ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="top4-right d-flex justify-content-end align-items-center">
                                <?php medidove_header_top_menu(); ?>
                                <div class="header-social-icons top4-social d-none d-xl-block">
                                    <?php medidove_header_social_profiles(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        endif; ?>
        <!-- menu-area -->
        <div id="<?php echo esc_attr($medidove_sticky_id); ?>" class="header-menu-area menu-area4 pl-55 pr-55">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-10 col-md-5 col-7 d-flex align-items-center">
                        <div class="logo pos-rel">
                            <?php medidove_header_logo(); ?>
                        </div>
                        <div class="header__menu header__menu4 pl-60 d-none d-lg-block">
                            <?php medidove_header_menu(); ?>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-2 col-md-7 col-5">
                        <div class="open-mobile-menu f-right d-lg-none">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                        <div class="header-right header-right-5 d-flex align-items-center justify-content-end">
                            <?php 
                            if( $medidove_header_lang ): ?>
                                <div class="header-lang pos-rel ">
                                    <div class="lang-icon">
                                    <?php $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
                                        if ( !empty( $languages ) ):
                                            foreach($languages as $lan):
                                                if($lan['active']==1): ?> 
                                                <div class="lang-icon-img">
                                                    <img src="<?php print esc_url($lan['country_flag_url']); ?>" alt="<?php print esc_html($lan['language_code']); ?>">
                                                </div>    
                                                <span><?php print esc_html($lan['language_code']); ?><i class="fas fa-angle-down"></i></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <img src="<?php print get_template_directory_uri(); ?>/img/icon/lang.png" alt="Language">
                                            <span><?php print esc_html__('EN', 'medidove'); ?><i class="fas fa-angle-down"></i></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php do_action('medidove_language'); ?>
                                </div>
                            <?php 
                            endif; ?>
                            <div class="header-button pl-50 d-none d-xl-block">
                                <?php medidove_contact_us(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end -->

    <main>
<?php 
}


/**
* medidove header style 6
*/
function medidove_header_style_6() {
    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 

    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
    $medidove_header_default_search            = get_theme_mod('medidove_header_default_search');
    $medidove_header_lang            = get_theme_mod('medidove_header_lang');

    // header top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
    $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');

    $medidove_top_bg_img = function_exists('get_field') && !empty(get_field( 'header_top_bg_image' )) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;


    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }

    ?>
    <!-- header begin -->
    <header class="header-style-6 style-6">
        <?php if( $medidove_topbar_switch ): ?>
            <div class="top-bar4 white-bg top-border d-none d-lg-block" data-bg-color="<?php echo esc_attr($medidove_header_top_bg_color); ?>" data-background="<?php echo esc_url($medidove_top_bg_img); ?>">
                <div class="container-fluid">
                    <div class="row d-flex align-items-center  pl-55 pr-55 pt-25 pb-25">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="header-info header-info4 p-0">
                                <?php medidove_header_email_address(); ?>
                                <?php medidove_header_phone_number(); ?>
                                <?php medidove_header_time(); ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="top4-right d-flex justify-content-end align-items-center">
                                <?php medidove_header_top_menu(); ?>
                                <div class="header-social-icons top4-social d-none d-xl-block">
                                    <?php medidove_header_social_profiles(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        endif; ?>
        <!-- menu-area -->
        <div id="<?php echo esc_attr($medidove_sticky_id); ?>" class="header-menu-area menu-area4">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-12 col-7 d-md-flex align-items-center justify-content-between">
                        <div class="logo pos-rel">
                            <?php medidove_header_logo(); ?>
                        </div>
                        <div class="header__menu header__menu4 pl-60">
                            <?php medidove_header_menu(); ?>
                        </div>
                    </div>
                    <div class="col-5 d-lg-none">
                        <div class="open-mobile-menu f-right">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-9 col-md-9 d-none d-xl-block">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <?php 
                            if( $medidove_header_lang ): ?>
                                <div class="header-lang pos-rel d-none d-lg-block">
                                    <div class="lang-icon">
                                        <img src="<?php print get_template_directory_uri(); ?>/img/icon/lang.png" alt="Language">
                                        <span><?php print esc_html__('EN', 'medidove'); ?><i class="fas fa-angle-down"></i></span>
                                    </div>
                                    <?php do_action('medidove_language'); ?>
                                </div>
                            <?php 
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end -->

    <main>
<?php 
}

/**
* medidove header style 7
*/
function medidove_header_style_7() {

    $medidove_covid_update_text = get_theme_mod( 'medidove_covid_update_text', __( 'Covid - 19 Update', 'medidove' ) );
    $medidove_recent_effectee_number = get_theme_mod( 'medidove_recent_effectee_number', __( '45,485 Recent Effected', 'medidove' ) );
    $medidove_herader_phone_number = get_theme_mod( 'medidove_herader_phone_number', __( '+8 012 3456 7899', 'medidove' ) );
    $medidove_herader_top_location = get_theme_mod( 'medidove_herader_top_location', __( 'Our Location', 'medidove' ) );
    $medidove_header_account_text = get_theme_mod( 'medidove_header_account_text', __( 'User Account', 'medidove' ) );
    $medidove_header_login_text = get_theme_mod( 'medidove_header_login_text', __( 'Login / Register', 'medidove' ) );
    $medidove_header_btn_cat_text = get_theme_mod( 'medidove_header_btn_cat_text', __( 'Browse categories', 'medidove' ) );
    $medidove_header_more_cat_btn_text = get_theme_mod( 'medidove_header_more_cat_btn_text', __( 'More categories', 'medidove' ) );
    $medidove_header_more_cat_btn_link = get_theme_mod( 'medidove_header_more_cat_btn_link', esc_html__( '#', 'medidove' ) );

    $medidove_header_wishlist_switch = get_theme_mod( 'medidove_header_wishlist_switch', false );
    $medidove_header_cart_switch = get_theme_mod( 'medidove_header_cart_switch', false );
    $medidove_header_user_account_switch = get_theme_mod( 'medidove_header_user_account_switch', false );
    $medidove_header_default_search            = get_theme_mod('medidove_header_default_search');

    $medidove_secondary_logo = get_theme_mod('seconday_logo', get_template_directory_uri() . '/img/logo/logo-white.png');

    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 

    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
    $medidove_header_lang            = get_theme_mod('medidove_header_lang');

    // header top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
    $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');

    $medidove_top_bg_img = function_exists('get_field') && !empty(get_field( 'header_top_bg_image' )) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;


    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }

    ?>
    <!-- header begin -->
    <header class="header-style-7 style-7">
            <?php if( $medidove_topbar_switch ): ?>
            <div class="top-bar7 top-bar7-border  white-bg d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="news-update">
                                <?php if ( !empty( $medidove_covid_update_text ) ): ?>
                                    <span class="covid-update"><?php print esc_html($medidove_covid_update_text); ?></span>
                                <?php endif; ?>
                                <?php if ( !empty( $medidove_recent_effectee_number ) ): ?>
                                    <span><?php print esc_html($medidove_recent_effectee_number); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="top-bar7-right text-right">
                                <div class="header-info header-info7 p-0">
                                    <?php if ( !empty( $medidove_herader_phone_number ) ): ?>
                                        <span><i class="fas fa-phone"></i><a href="tel: <?php print esc_html($medidove_herader_phone_number); ?>"> <?php print esc_html($medidove_herader_phone_number); ?> </a></span>
                                    <?php endif; ?>
                                    <?php if ( !empty( $medidove_herader_top_location ) ): ?>
                                    <span><i class="fas fa-map-marker-alt"></i><?php print esc_html($medidove_herader_top_location); ?></span>
                                    <?php endif; ?>
                                </div>

                                <?php if( $medidove_header_lang ): ?>
                                <div class="header-lang header-lang-7 pos-rel ">
                                    <div class="lang-icon-7">
                                        <i class="fal fa-language"></i>
                                        <span><?php print esc_html__('EN', 'medidove'); ?></span>
                                    </div>
                                    <?php do_action('medidove_language'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="header7-middle pt-20 pb-20 d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="header7-logo">
                                <?php medidove_header_logo(); ?>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="header7-searchnaction">
                                <div class="header7-search">
                                    <form method="get" action="<?php print esc_url( home_url( '/' ) );?>">
                                        <div class="search-input-field">
                                            <input type="text" name="s" value="<?php print esc_attr( get_search_query() )?>" placeholder="<?php print esc_attr( 'Search Products', 'medidove' );?>">
                                            <button><i class="fal fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="header7-cartnlogin">
                                    <ul>
                                        <?php if ( !empty( $medidove_header_wishlist_switch ) ): ?>
                                        <li><a href="#" class="view-wishlist-button"><span class="cartnlogin-icon">
                                            <span class="product-number red">0</span>
                                            <i class="fal fa-heart"></i></span></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if ( !empty( $medidove_header_cart_switch ) ): ?>
                                        <li><a href="#" class="view-cart-button"><span class="cartnlogin-icon">
                                            <span class="product-number blue">0</span>
                                            <i class="fal fa-shopping-basket"></i></span></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if ( !empty( $medidove_header_user_account_switch ) ): ?>
                                        <li><a href="#" class="account-login">
                                                <span class="cartnlogin-icon"><i class="fal fa-user"></i></span>
                                                <div class="login-text">
                                                    <?php if ( !empty( $medidove_header_account_text ) ): ?>
                                                    <p class="user-ac"><?php print esc_html($medidove_header_account_text); ?></p>
                                                    <?php endif; ?>
                                                    <?php if ( !empty( $medidove_header_login_text ) ): ?>
                                                    <span class="login-reg"><?php print esc_html($medidove_header_login_text); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="header-sticky" class="header7-menu-area header7-menu-area-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-8 col-sm-8 col-8">
                            <?php if(!empty($medidove_header_btn_cat_text)) : ?>
                            <div class="toogle-category pos-rel d-none d-lg-block">
                                <button class="category-toggle-btn"><i class="fal fa-bars"></i><?php print esc_html($medidove_header_btn_cat_text); ?></button>
                                <div class="category-list">
                                    <?php medidove_header_category_menu();?> 

                                    <?php if(!empty($medidove_header_more_cat_btn_link)) : ?>
                                    <a href="<?php print esc_url($medidove_header_more_cat_btn_link); ?>" class="more-category-btn"><?php print esc_html($medidove_header_more_cat_btn_text); ?></a> 
                                    <?php endif; ?>

                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="header7-logo d-lg-none">
                                <a href="<?php print esc_url(home_url('/')); ?>">
                                    <img src="<?php print esc_url($medidove_secondary_logo); ?>" alt="<?php echo esc_html__('logo','medidove'); ?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-4 col-sm-4 col-4">
                            <div class="header__menu header__menu7 d-none d-lg-block text-right">
                                <?php medidove_header_menu(); ?>
                            </div>
                            <div class="open-mobile-menu mobile-menu7 f-right d-lg-none">
                                <a href="javascript:void(0);">
                                    <i class="fal fa-bars"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- product-action sidebar start -->
            <div class="product-action-sidebar product-action-sidebar-wishlist">
                <div class="product-action-title">
                    <h5><span class="product-action-icon"><i class="fal fa-heart"></i></span>Your Wishlist</h5>
                    <div class="product-action-number">(02)</div>
                </div>
                <div class="product-action-list">
                    <div class="product-sidebar-item">
                        <div class="product-sidebar-item-top">
                            <div class="product-sidebar-item-number">
                                1
                            </div>
                            <div class="product-sidebar-item-text">
                                <h4 class="product-name"><a href="#" tabindex="0">Nuclear Health Brainary Capsule Medicine</a></h4>
                                <h5 class="pro-price p-price">
                                    <ins><span class=" amount"><bdi><span class="">$</span>80.00</bdi></span></ins>
                                </h5>
                            </div>
                        </div>
                        <div class="product-sidebar-item-bottom">
                            <div class="product-sidebar-item-button">
                                <button class="button-move-to-cart"><i class="fal fa-exchange"></i>Move to Cart</button>
                                <button class="button-delete"><i class="fal fa-trash-alt"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-sidebar-item">
                        <div class="product-sidebar-item-top">
                            <div class="product-sidebar-item-number">
                                2
                            </div>
                            <div class="product-sidebar-item-text">
                                <h4 class="product-name"><a href="#" tabindex="0">Nuclear Health Brainary Capsule Medicine</a></h4>
                                <h5 class="pro-price p-price">
                                    <ins><span class=" amount"><bdi><span class="">$</span>80.00</bdi></span></ins>
                                </h5>
                            </div>
                        </div>
                        <div class="product-sidebar-item-bottom">
                            <div class="product-sidebar-item-button">
                                <button class="button-move-to-cart"><i class="fal fa-exchange"></i>Move to Cart</button>
                                <button class="button-delete"><i class="fal fa-trash-alt"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-action-sidebar product-action-sidebar-cart">
                <div class="product-action-title">
                    <h5><span class="product-action-icon"><i class="fal fa-shopping-basket"></i></span>Cart Info</h5>
                    <div class="product-action-number">(02)</div>
                </div>
                <div class="product-action-list">
                    <div class="product-sidebar-item">
                        <div class="product-sidebar-item-top">
                            <div class="product-thumb product-thumb-action-sidebar">
                                <a href="#"><img src="<?php print get_template_directory_uri() ?>/img/home7/product-img/bs-product3.png" alt="img"></a>
                            </div>
                            <div class="product-sidebar-item-text">
                                <h4 class="product-name"><a href="#" tabindex="0">Nuclear Health Brainary Capsule Medicine</a></h4>
                                <h5 class="pro-price p-price">
                                    <ins>
                                        <span class=" amount"><bdi><span class="">$</span>80.00</bdi></span>
                                        <span class="unit">(X2)</span>
                                    </ins>
                                </h5>
                            </div>
                        </div>
                        <div class="product-sidebar-item-bottom">
                            <div class="product-sidebar-item-button">
                                <button class="button-checkout"><i class="fal fa-exchange"></i>Checkout</button>
                                <button class="button-delete"><i class="fal fa-trash-alt"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-sidebar-item">
                        <div class="product-sidebar-item-top">
                            <div class="product-thumb product-thumb-action-sidebar">
                                <a href="#"><img src="<?php print get_template_directory_uri() ?>/img/home7/product-img/bs-product2.png" alt="img"></a>
                            </div>
                            <div class="product-sidebar-item-text">
                                <h4 class="product-name"><a href="#" tabindex="0">Nuclear Health Brainary Capsule Medicine</a></h4>
                                <h5 class="pro-price p-price">
                                    <ins>
                                        <span class=" amount"><bdi><span class="">$</span>80.00</bdi></span>
                                        <span class="unit">(X2)</span>
                                    </ins>
                                </h5>
                            </div>
                        </div>
                        <div class="product-sidebar-item-bottom">
                            <div class="product-sidebar-item-button">
                                <button class="button-checkout"><i class="fal fa-exchange"></i>Checkout</button>
                                <button class="button-delete"><i class="fal fa-trash-alt"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-action sidebar end -->
    </header>
    <!-- header end -->

    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end -->

<?php 
}


/**
* medidove header style 8
*/
function medidove_header_style_8() {
    $medidove_sticky_switch = get_theme_mod('medidove_sticky_switch','header-sticky');
    $medidove_sticky_id = !empty($medidove_sticky_switch) ? 'header-sticky' : 'no-sticky'; 

    $medidove_btn_text = get_theme_mod('medidove_btn_text');
    $medidove_btn_link     = get_theme_mod('medidove_btn_link');
    $medidove_header_eignt_bg_img = get_theme_mod('medidove_header_eignt_bg_img');
    
    $medidove_topbar_switch = get_theme_mod('medidove_topbar_switch');
    $medidove_header_default_search = get_theme_mod( 'medidove_header_default_search', false );

    $medidove_header_lang            = get_theme_mod('medidove_header_lang');

    // header top bg
    $medidove_header_top_bg_img_from_page = function_exists('get_field') ? get_field( 'header_top_bg_image' ) : NULL;
    $medidove_header_top_bg_img = get_theme_mod('medidove_header_top_bg_img');

    $medidove_top_bg_img = function_exists('get_field') && !empty(get_field( 'header_top_bg_image' )) ? $medidove_header_top_bg_img_from_page['url'] : $medidove_header_top_bg_img;

    $medidove_header_tob_bg_color_from_page = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    if( !empty( $medidove_header_tob_bg_color_from_page )){
        $medidove_header_top_bg_color = function_exists('get_field') ? get_field( 'medidove_header_top_bg_color' ) : NULL;
    }else{
        $medidove_header_top_bg_color = get_theme_mod('medidove_header_top_bg_color');
    }

    ?>
    <!-- header begin -->
    <header class="header-style-8 style-8">
            <div class="header-menu-area menu-area8 pl-55 pr-55 pos-rel" data-background="<?php print esc_url($medidove_header_eignt_bg_img); ?>">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 d-flex align-items-center justify-content-between">
                        <div class="logo pos-rel">
                            <?php medidove_header_logo(); ?>
                        </div>
                        <div class="header__menu header__menu8 d-none d-xl-block">
                            <?php medidove_header_menu(); ?>
                        </div>
                        <div class="open-mobile-menu f-right d-xl-none">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-9 col-md-9 d-none d-xl-block">
                        <div class="header-right header-right8 d-flex align-items-center justify-content-end">
                            <?php if ( !empty ( $medidove_btn_text ) ) : ?>
                            <div class="header-button d-none d-xl-block">
                                <a href="<?php print esc_url($medidove_btn_link); ?>" class="btn btn-icon ml-0"><span>+</span><?php print esc_html($medidove_btn_text); ?></a>
                            </div>
                            <?php endif; ?>
                            <?php if( $medidove_header_lang ): ?>
                            <div class="header-lang header-lang8 pos-rel d-none d-xl-block">
                                <div class="lang-icon">
                                <?php $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
                                if ( !empty( $languages ) ):
                                    foreach($languages as $lan):
                                        if($lan['active']==1): ?> 
                                        <div class="lang-icon-img">
                                            <img src="<?php print esc_url($lan['country_flag_url']); ?>" alt="<?php print esc_html($lan['language_code']); ?>">
                                        </div>    
                                        <span><?php print esc_html($lan['language_code']); ?><i class="fas fa-angle-down"></i></span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <img src="<?php print get_template_directory_uri(); ?>/img/icon/lang.png" alt="Language">
                                    <span><?php print esc_html__('EN', 'medidove'); ?><i class="fas fa-angle-down"></i></span>
                                <?php endif; ?>
                                </div>
                                <?php do_action('medidove_language'); ?>
                            </div>
                            <?php endif; ?>

                            <div class="open-mobile-menu f-right d-none">
                                <a href="javascript:void(0);">
                                    <i class="fal fa-bars"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- slide-bar start -->
    <?php medidove_mobile(); ?>
    <!-- slide-bar end -->

<?php 
}



/** 
 * [medidove_mobile_info]
 * @return [type] [description]
 */
function medidove_mobile() {?>

    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <?php medidove_mobile_logo(); ?>
            <div class="mobile-menu"></div>
            <?php medidove_mobile_info(); ?>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>

<?php 
} 


// medidove_mobile_info
function medidove_mobile_info(){
    // side info
    $medidove_side_hide = get_theme_mod('medidove_side_hide', false);
    $medidove_mail_id = get_theme_mod('medidove_mob_header_email_address','info@webmail.com');
    $medidove_phone = get_theme_mod('medidove_mob_header_phone_number','+876 864 764 764');
    $medidove_address = get_theme_mod('medidove_mob_header_address','12/A, Mirnada City Tower, NYC');
    $medidove_header_time = get_theme_mod('medidove_mob_header_time','Mon - Fri: 9.00am - 11.00pm');
    $medidove_side_info_title = get_theme_mod('medidove_mob_side_info_title','Contact Info');
    $medidove_mob_button = get_theme_mod('medidove_mob_button','Contact Us');
    $medidove_mob_button_url = get_theme_mod('medidove_mob_button_url','#');
    
?>

    <?php if (!empty($medidove_side_hide)) : ?>
    <div class="contact-infos mt-30 mb-30">
        <div class="contact-list mb-30">
            <?php if (!empty($medidove_side_info_title)) : ?>
            <h4><?php echo esc_html($medidove_side_info_title); ?></h4>
            <?php endif; ?> 
            <ul>
                <?php if (!empty($medidove_address)) : ?>
                <li><i class="fal fa-map"></i><?php echo esc_html($medidove_address); ?></li>
                <?php endif; ?> 

                <?php if (!empty($medidove_header_time)) : ?>
                <li><i class="fal fa-clock"></i><?php echo esc_html($medidove_header_time); ?></li>
                <?php endif; ?> 

                <?php if (!empty($medidove_phone)) : ?>
                <li><i class="fal fa-phone"></i><a href="tell:<?php echo esc_attr($medidove_phone); ?>"><?php echo esc_html($medidove_phone); ?></a></li>
                <?php endif; ?> 

                <?php if (!empty($medidove_mail_id)) : ?>
                <li><i class="far fa-envelope"></i><a href="mailto:<?php echo esc_attr($medidove_mail_id); ?>"><?php echo esc_html($medidove_mail_id); ?></a></li>
                <?php endif; ?> 
            </ul>

            <?php if (!empty($medidove_mob_button_url)) : ?>
            <div class="side-btn mt-30">
                <a href="<?php print esc_url($medidove_mob_button_url); ?>" class="btn"><?php echo esc_html($medidove_mob_button); ?></a>
            </div>
            <?php endif; ?> 
        </div>
        <div class="sidebar__menu--social">
            <?php medidove_header_social_profiles(); ?>
        </div>
    </div>
    <?php endif; ?>  

<?php }

// medidove_mobile_logo
function medidove_mobile_logo(){
    // side info    
    $medidove_mobile_logo_hide = get_theme_mod('medidove_mobile_logo_hide', false);

    $medidove_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/img/logo/logo.png');
    
?>

    <?php if (!empty($medidove_mobile_logo_hide)) : ?>
    <div class="side__logo mb-25">
        <a href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($medidove_site_logo); ?>" alt="<?php print esc_attr('logo','medidove'); ?>" />
        </a>
    </div>
    <?php endif; ?> 



<?php }   


/** 
 * [medidove_header_lang description]
 * @return [type] [description]
 */
function medidove_header_lang_defualt() {
    $medidove_header_lang = get_theme_mod('medidove_header_lang');
    ?>
    <?php if( $medidove_header_lang ): ?>
    <div class="header-lang header-lang-default f-right pos-rel d-none d-lg-block p-0">
        <div class="lang-icon ">
        <?php $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
        if ( !empty( $languages ) ):
            foreach($languages as $lan):
                if($lan['active']==1): ?> 
                    <img src="<?php print get_template_directory_uri(); ?>/img/icon/lang.png" alt="Language">
                    <span><?php print esc_html($lan['translated_name']); ?><i class="fas fa-angle-down"></i></span>
            <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <img src="<?php print get_template_directory_uri(); ?>/img/icon/lang.png" alt="Language">
            <span><?php print esc_html__('EN', 'medidove'); ?><i class="fas fa-angle-down"></i></span>
        <?php endif; ?>
        </div>
        <?php do_action('medidove_language'); ?>
    </div>
    <?php endif; ?>
<?php 
}


/** 
 * [medidove_language_list description]
 * @return [type] [description]
 */
function _medidove_language($mar) {
        return $mar;
}
function medidove_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="header-lang-list header-lang-list-3">';
            foreach($languages as $lan){
                $active = $lan['active']==1?'active':'';
                $mar .= '<li class="'.$active.'"><a href="'.$lan['url'].'">'.$lan['translated_name'].'</a></li>';
            }
        $mar .= '</ul>';
    }else{
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="header-lang-list header-lang-list-3">';
            $mar .= '<li><a href="#">'.esc_html__('USA','medidove').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('UK','medidove').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('CA','medidove').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('AU','medidove').'</a></li>';
        $mar .= ' </ul>';
    }
    print _medidove_language($mar);
}
add_action('medidove_language','medidove_language_list');

// favicon logo
function medidove_favicon_logo_func() {
    $medidove_favicon = get_template_directory_uri() . '/img/logo/favicon.png';
    $medidove_favicon_url = get_theme_mod('favicon_url', $medidove_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $medidove_favicon_url ); ?>">

    <?php   
} 
add_action('wp_head', 'medidove_favicon_logo_func');

// header logo
function medidove_header_logo() {
    ?>
            <?php 
            $medidove_logo_on = function_exists('get_field') ? get_field( 'medidove_enable_sec_logo' ) : NULL;;
            $medidove_logo = get_template_directory_uri() . '/img/logo/logo.png';
            $medidove_logo_white = get_template_directory_uri() . '/img/logo/logo-white.png';
            $medidove_site_logo = get_theme_mod('logo', $medidove_logo);
            $medidove_secondary_logo = get_theme_mod('seconday_logo', $medidove_logo_white);

            ?>
             
             <?php
            if( has_custom_logo()){
                the_custom_logo();
            }else{
                
                if(!empty($medidove_logo_on)) { ?>
                    <a class="standard-logo s" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($medidove_secondary_logo); ?>" alt="<?php print esc_attr('logo','medidove'); ?>" />
                    </a>
                <?php 
                }
                else{ ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($medidove_site_logo); ?>" alt="<?php print esc_attr('logo','medidove'); ?>" />
                    </a>
                <?php 
                }
            }   
            ?>
    <?php 
} 


/** 
 * [medidove_header_social_profiles description]
 * @return [type] [description]
 */
function medidove_header_social_profiles() {
    $medidove_topbar_fb_url             = get_theme_mod('medidove_topbar_fb_url', '#');
    $medidove_topbar_instagram_url      = get_theme_mod('medidove_topbar_instagram_url', '#');
    $medidove_topbar_youtube_url        = get_theme_mod('medidove_topbar_youtube_url', '#');
    $medidove_topbar_linkedin_url       = get_theme_mod('medidove_topbar_linkedin_url', '#');
    $medidove_topbar_twitter_url      = get_theme_mod('medidove_topbar_twitter_url', '#');
    ?>
        <ul>
        <?php if (!empty($medidove_topbar_fb_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_fb_url); ?>">
                  <i class="fab fa-facebook-f"></i>
              </a></li>
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_instagram_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_instagram_url); ?>">
                  <i class="fab fa-instagram"></i>
              </a></li>
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_youtube_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_youtube_url); ?>">
              <i class="fab fa-youtube"></i>
            </a></li>
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_linkedin_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_linkedin_url); ?>">
              <i class="fab fa-linkedin"></i>
            </a></li> 
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_twitter_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_twitter_url); ?>">
              <i class="fab fa-twitter"></i>
            </a></li> 
        <?php endif; ?>
        </ul>
<?php 
}



/** 
 * [medidove_footer_social_profiles description]
 * @return [type] [description]
 */
function medidove_footer_social_profiles() {
    $medidove_topbar_fb_url             = get_theme_mod('medidove_topbar_fb_url', '#');
    $medidove_topbar_instagram_url      = get_theme_mod('medidove_topbar_instagram_url', '#');
    $medidove_topbar_youtube_url        = get_theme_mod('medidove_topbar_youtube_url', '#');
    $medidove_topbar_linkedin_url       = get_theme_mod('medidove_topbar_linkedin_url', '#');
    $medidove_topbar_twitter_url      = get_theme_mod('medidove_topbar_twitter_url', '#');
    ?>
        <ul class="list-inline">
        <?php if (!empty($medidove_topbar_fb_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_fb_url); ?>">
                  <i class="fab fa-facebook-f"></i>
              </a></li>
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_instagram_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_instagram_url); ?>">
                  <i class="fab fa-instagram"></i>
              </a></li>
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_youtube_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_youtube_url); ?>">
              <i class="fab fa-youtube"></i>
            </a></li>
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_linkedin_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_linkedin_url); ?>">
              <i class="fab fa-linkedin"></i>
            </a></li> 
        <?php endif; ?>

        <?php if (!empty($medidove_topbar_twitter_url)): ?>
            <li><a href="<?php print esc_url($medidove_topbar_twitter_url); ?>">
              <i class="fab fa-twitter"></i>
            </a></li> 
        <?php endif; ?>
        </ul>
<?php 
}

/** 
 * [medidove_header_address description]
 * @return [type] [description]
 */
function medidove_message_icon() {
    $medidove_message_icon = get_template_directory_uri() . '/img/icon/message-icon.png';
    $medidove_message_icon = get_theme_mod('icon_message', $medidove_message_icon);

    ?>
        <?php if ($medidove_message_icon): ?>
            <img src="<?php print esc_url($medidove_message_icon); ?>" alt="<?php print esc_attr_e('Message Icon', 'medidove'); ?>">
        <?php endif; ?>
<?php 
}

/** 
 * [medidove_header_address description]
 * @return [type] [description]
 */
function medidove_phone_icon() {
    $medidove_phone_icon = get_template_directory_uri() . '/img/icon/phone-icon.png';
    $medidove_phone_icon = get_theme_mod('icon_phone', $medidove_phone_icon);

    ?>
        <?php if ($medidove_phone_icon): ?>
            <img src="<?php print esc_url($medidove_phone_icon); ?>" alt="<?php print esc_attr_e('Phone Icon', 'medidove'); ?>">
        <?php endif; ?>
<?php 
}


/** 
 * [medidove_header_address description]
 * @return [type] [description]
 */
function medidove_header_address() {
    $medidove_header_address    = get_theme_mod('medidove_header_address', '#');
    
    ?>
        <?php if (!empty($medidove_header_address)): ?>
            <span class="h-map"><i class="fas fa-map-marker-alt"></i><?php print esc_html($medidove_header_address); ?></span>
        <?php endif; ?>
<?php 
}

/** 
 * [medidove_header_time description]
 * @return [type] [description]
 */
function medidove_header_time() {
    $medidove_header_time  = get_theme_mod('medidove_header_time', '#');
    
    ?>
        <?php if ( !empty($medidove_header_time) ): ?>
            <span class="h-time"><i class="far fa-clock"></i> <?php print esc_html($medidove_header_time); ?> </span>
        <?php endif; ?>
<?php 
}


/** 
 * [medidove_header_phone_number description]
 * @return [type] [description]
 */
function medidove_header_phone_number() {
    $header_phone_number            = get_theme_mod('medidove_header_phone_number', '#');
    ?>
        <?php if ($header_phone_number != '#'): ?>
            <span><i class="fas fa-phone"></i> <?php print esc_html($header_phone_number); ?></span>
        <?php endif; ?>
<?php 
}


/** 
 * [medidove_header_email_address description]
 * @return [type] [description]
 */
function medidove_header_email_address() {
    $header_email_address            = get_theme_mod('medidove_header_email_address', '#');
    ?>
        <?php if ($header_email_address != '#'): ?>
            <span><i class="fas fa-envelope"></i> <?php print esc_html($header_email_address); ?></span>
        <?php endif; ?>
<?php 
}

function medidove_header_email_title() {
    $header_email_address_title = get_theme_mod('medidove_header_email_title');
    
    ?>
        <?php if ($header_email_address_title): ?>
            <h5 class="theme-color"><?php print esc_html($header_email_address_title); ?> </h5>
        <?php endif; ?>
<?php 
}

function medidove_header_phone_title() {
    $header_phone_title = get_theme_mod('medidove_header_phone_title');
    
    ?>
        <?php if (!empty($header_phone_title)): ?>
            <h5 class="theme-color"><?php print esc_html($header_phone_title); ?> </h5>
        <?php endif; ?>
<?php 
}


/** 
 * [medidove_header_button description]
 * @return [type] [description]
 */
function medidove_header_button() {
    $medidove_show_button      = get_theme_mod('medidove_show_button');
    $medidove_btn_text = get_theme_mod('medidove_btn_text');
    
    $medidove_btn_link     = get_theme_mod('medidove_btn_link');

    if(!empty( $medidove_btn_text )): ?>
        <a href="<?php print esc_url($medidove_btn_link); ?>" class="btn"><?php print esc_html($medidove_btn_text); ?></a> 
    <?php endif; ?>

<?php 
} 

/** 
 * [medidove_contact_us description]
 * @return [type] [description]
 */
function medidove_contact_us() {
    $medidove_show_button      = get_theme_mod('medidove_contact_button');
    $medidove_contact_text = get_theme_mod('medidove_contact_text');
    
    $medidove_contact_link     = get_theme_mod('medidove_contact_link');

    if(!empty( $medidove_contact_text )): ?>
        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url($medidove_contact_link); ?>" class="btn btn-icon btn-icon-green"><span><?php print esc_html_e('+', 'medidove'); ?></span><?php print esc_html($medidove_contact_text); ?></a>
    <?php endif; ?>

<?php 
} 

/** 
 * [medidove_make_a_call description]
 * @return [type] [description]
 */
function medidove_make_a_call() {
    $medidove_show_button      = get_theme_mod('medidove_call_button');
    $medidove_call_text = get_theme_mod('medidove_call_text');
    
    $medidove_call_link     = get_theme_mod('medidove_call_link');

    if( !empty( $medidove_call_text ) ): ?>
        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url($medidove_call_link); ?>" class="btn-icon btn-icon-white"><i class="fas fa-phone"></i><?php print esc_html($medidove_call_text); ?></a>
    <?php endif; ?>

<?php 
} 


/** 
 * [medidove_header_menu description]
 * @return [type] [description]
 */
function medidove_header_menu() { ?>
    <nav id="mobile-menu">
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'menu_class'        => 'basic-menu',
                'container'         => '',
                'fallback_cb'       => 'Medidove_Navwalker::fallback',
                'walker'            => new Medidove_Navwalker
            ));
           ?>
    </nav>
    <?php 
}

/** 
 * [medidove_header_top_menu description]
 * @return [type] [description]
 */
function medidove_header_top_menu() { ?>

        <div class="top4-menu">
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'header-top-menu',
                'menu_class'        => 'list-inline',
                'container'         => '',
                'fallback_cb'       => 'Medidove_Navwalker::fallback',
                'walker'            => new Medidove_Navwalker
            ));
           ?>
        </div>
    <?php 
}

/** 
 * [medidove_category_menu description]
 * @return [type] [description]
 */
function medidove_header_category_menu() { ?>
        <?php 
        wp_nav_menu(array(
            'theme_location'    => 'category-menu',
            'menu_class'        => '',
            'container'         => '',
            'fallback_cb'       => 'Medidove_Navwalker::fallback',
            'walker'            => new Medidove_Navwalker
        ));
       ?>
    <?php 
}


/**
*
* medidove footer
*/
add_action('medidove_footer_style', 'medidove_check_footer', 10);

function medidove_check_footer() {
    $medidove_footer_style = function_exists('get_field') ? get_field( 'medidove_choice_footer_style' ) : NULL;
    $medidove_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-3' );

    if( $medidove_footer_style == 'footer-style-1' ) {
        medidove_footer_style_1();
    }
    elseif( $medidove_footer_style == 'footer-style-2' ) {
        medidove_footer_style_2();
    }
    elseif( $medidove_footer_style == 'footer-style-3' ) {
        medidove_footer_style_3();
    }
    elseif( $medidove_footer_style == 'footer-style-4' ) {
        medidove_footer_style_4();
    }
    elseif( $medidove_footer_style == 'footer-style-5' ) {
        medidove_footer_style_5();
    }
    elseif( $medidove_footer_style == 'footer-style-6' ) {
        medidove_footer_style_6();
    }
    elseif( $medidove_footer_style == 'footer-style-7' ) {
        medidove_footer_style_7();
    }
    else{

        /** default footer style **/
        if($medidove_default_footer_style == 'footer-style-1'){
            medidove_footer_style_1();
        }elseif($medidove_default_footer_style == 'footer-style-2'){
            medidove_footer_style_2();
        }elseif($medidove_default_footer_style == 'footer-style-3'){
           medidove_footer_style_3();
        }elseif($medidove_default_footer_style == 'footer-style-4'){
           medidove_footer_style_4();
        }elseif($medidove_default_footer_style == 'footer-style-5'){
           medidove_footer_style_5();
        }elseif($medidove_default_footer_style == 'footer-style-6'){
           medidove_footer_style_6();
        }elseif($medidove_default_footer_style == 'footer-style-7'){
           medidove_footer_style_7();
        }

    }
}

/**
* footer style 1
*/
function medidove_footer_style_1() {
// footer img
$footer_bg_page_url = function_exists('get_field') ? get_field( 'medidove_footer_bg' ) : NULL;
$footer_bg_img = get_theme_mod('medidove_footer_bg_url');

$footer_bg_url = !empty($footer_bg_page_url['url']) ? $footer_bg_page_url['url'] : $footer_bg_img;


// footer color
$medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
if( !empty( $medidove_footer_bg_color ) ){
    $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
}
else{
    $medidove_footer_bg_color = get_theme_mod('medidove_footer_bg_color');
}
?>
    <footer class="footer_style_default 22">
        <?php if ( is_active_sidebar('footer-widget') ): ?>
        <div class="footer-top primary-bg footer-map pos-rel pt-120 pb-80" data-bg-color="<?php echo esc_attr($medidove_footer_bg_color); ?>" data-background="<?php echo esc_url($footer_bg_url); ?>">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-widget' ); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer-bottom pt-25 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-copyright footer-copyright-3 text-center">
                            <p><?php print medidove_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php 
}

/**
* footer  style 2
*/
function medidove_footer_style_2() {
// footer img
$footer_bg_page_url = function_exists('get_field') ? get_field( 'medidove_footer_bg' ) : NULL;
$footer_bg_img = get_theme_mod('medidove_footer_bg_url');

$footer_bg_url = !empty($footer_bg_page_url['url']) ? $footer_bg_page_url['url'] : $footer_bg_img;


// footer color
$medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
if( !empty( $medidove_footer_bg_color ) ){
    $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
}
else{
    $medidove_footer_bg_color = get_theme_mod('medidove_footer_bg_color');
}
?>

    <footer>
        <div class="footer-top theme-bg pt-100" data-bg-color="<?php echo esc_attr($medidove_footer_bg_color); ?>" data-background="<?php echo esc_url($footer_bg_url); ?>">
            <div class="container">
                <?php if ( is_active_sidebar('footer-top-widget') ): ?>
                <div class="footer-top-form mb-60">
                    <div class="row align-items-center">
                        <?php dynamic_sidebar( 'footer-top-widget' ); ?>
                    </div>
                </div>
                <?php endif; ?>        

                <?php if ( is_active_sidebar('footer-widget-3') ): ?>
                <div class="footer-mid pb-60">
                    <div class="row">
                        <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="footer-bottom-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copyright-area text-center">
                                <p class="white-color"><?php print medidove_copyright_text(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php 
}


/**
* footer  style 3
*/
function medidove_footer_style_3() {
// footer img
$footer_bg_page_url = function_exists('get_field') ? get_field( 'medidove_footer_bg' ) : NULL;
$footer_bg_img = get_theme_mod('medidove_footer_bg_url');

$footer_bg_url = !empty($footer_bg_page_url['url']) ? $footer_bg_page_url['url'] : $footer_bg_img;


// footer color
$medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
if( !empty( $medidove_footer_bg_color ) ){
    $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
}
else{
    $medidove_footer_bg_color = get_theme_mod('medidove_footer_bg_color');
}

?>

    <footer>
        <?php if ( is_active_sidebar('footer-widget-left') || is_active_sidebar('footer-widget-center') ||  is_active_sidebar('footer-widget-right') ): ?>
        <div class="footer-top primary-bg pt-115 pb-90" data-bg-color="<?php echo esc_attr($medidove_footer_bg_color); ?>" data-background="<?php echo esc_url($footer_bg_url); ?>">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-widget-left' ); ?>
                    <?php dynamic_sidebar( 'footer-widget-center' ); ?>
                    <?php dynamic_sidebar( 'footer-widget-right' ); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer-bottom pt-25 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-copyright text-center">
                            <p class="white-color"><?php print medidove_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php 
}

/**
* footer style 4
*/
function medidove_footer_style_4() {

// footer img
$footer_bg_page_url = function_exists('get_field') ? get_field( 'medidove_footer_bg' ) : NULL;
$footer_bg_img = get_theme_mod('medidove_footer_bg_url');

$footer_bg_url = !empty($footer_bg_page_url['url']) ? $footer_bg_page_url['url'] : $footer_bg_img;


// footer color
$medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
if( !empty( $medidove_footer_bg_color ) ){
    $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
}
else{
    $medidove_footer_bg_color = get_theme_mod('medidove_footer_bg_color');
}

?>
        <!-- footer start -->
        <footer>
            <?php if ( is_active_sidebar('footer-widget-style-4-er-first-widget') || is_active_sidebar('footer-widget-style-4-er-second-widget') ||  is_active_sidebar('footer-widget-style-4-er-third-widget') || is_active_sidebar('footer-widget-style-4-er-fourth-widget') ): ?>
            <div class="footer-top primary-bg footer-map pos-rel pt-120 pb-80" data-bg-color="<?php echo esc_attr($medidove_footer_bg_color); ?>" data-background="<?php echo esc_url($footer_bg_url); ?>">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <?php dynamic_sidebar( 'footer-widget-style-4-er-first-widget' ); ?>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6">
                            <?php dynamic_sidebar( 'footer-widget-style-4-er-second-widget' ); ?>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <?php dynamic_sidebar( 'footer-widget-style-4-er-third-widget' ); ?>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <?php dynamic_sidebar( 'footer-widget-style-4-er-fourth-widget' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="footer-bottom pt-25 pb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copyright footer-copyright-3 text-center">
                                <p><?php print medidove_copyright_text(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
<?php 
}


/**
* footer style 5
*/
function medidove_footer_style_5() {

// footer img
$footer_bg_page_url = function_exists('get_field') ? get_field( 'medidove_footer_bg' ) : NULL;
$footer_bg_img = get_theme_mod('medidove_footer_bg_url');
$footer_card_img = get_theme_mod('medidove_footer_card_img');
$footer_card_img_url = get_theme_mod('medidove_footer_card_img_url');

$medidove_footer_card_switch = get_theme_mod('medidove_footer_card_switch');

$medidove_footer_card_label = get_theme_mod( 'medidove_footer_card_label', __( 'We Support', 'medidove' ) );

$footer_bg_url = !empty($footer_bg_page_url['url']) ? $footer_bg_page_url['url'] : $footer_bg_img;

$medidove_copyright_center = $medidove_footer_card_switch ? 'col-lg-6 col-md-6' : 'col-lg-12 text-center';

// $btn_link = get_theme_mod('airvice_button_link', __('#','airvice'));


// footer color
$medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
if( !empty( $medidove_footer_bg_color ) ){
    $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
}
else{
    $medidove_footer_bg_color = get_theme_mod('medidove_footer_bg_color');
}

// footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-5-'. $num ) ){
            $footer_columns++;
        }
    } 

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-1';
        $footer_class[2] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-2 pl-40';
        $footer_class[3] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-3';
        $footer_class[4] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-4';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }  
?>
        <!-- footer start -->
        <footer>
            <?php if ( is_active_sidebar('footer-5-1') OR is_active_sidebar('footer-5-2') OR is_active_sidebar('footer-5-3') OR is_active_sidebar('footer-5-4') ): ?>
            <div class="footer-top footer-6-bg footer-map pos-rel pt-100 pb-60" data-bg-color="<?php echo esc_attr($medidove_footer_bg_color); ?>" data-background="<?php echo esc_url($footer_bg_url); ?>">
                <div class="container">
                    <div class="row">
                        <?php
                        if ( $footer_columns < 4 ) {     
                            print '<div class="col-xl-3 col-lg-6 col-md-6">';
                            dynamic_sidebar( 'footer-5-1');
                            print '</div>';
                        
                            print '<div class="col-xl-3 col-lg-6 col-md-6">';
                            dynamic_sidebar( 'footer-5-2');
                            print '</div>';
                        
                            print '<div class="col-xl-3 col-lg-6 col-md-6">';
                            dynamic_sidebar( 'footer-5-3');
                            print '</div>'; 

                            print '<div class="col-xl-3 col-lg-6 col-md-6">';
                            dynamic_sidebar( 'footer-5-4');
                            print '</div>';       
                        }
                        else{
                                for( $num=1; $num <= $footer_columns; $num++ ) {
                                    if ( !is_active_sidebar( 'footer-5-'. $num ) ) continue;
                                    print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                    dynamic_sidebar( 'footer-5-'. $num );
                                    print '</div>';
                                }  
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="footer-6-copyright pt-25 pb-20">
                <div class="container">
                    <div class="row">
                        <div class="<?php print esc_attr($medidove_copyright_center); ?>">
                            <div class="copyright-text">
                                <p><?php print medidove_copyright_text(); ?></p>
                            </div>
                        </div>

                        <?php if(!empty($medidove_footer_card_switch)) : ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="support-card-section">
                                <p><?php print esc_html($medidove_footer_card_label); ?></p>
                                <div class="supported-cards">
                                    <a href="<?php print esc_url($footer_card_img_url); ?>"><img src="<?php echo esc_url($footer_card_img); ?>" alt="card img"></a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
<?php 
}
/**
* footer style 6
*/
function medidove_footer_style_6() {

    // footer img
    $footer_bg_page_url = function_exists('get_field') ? get_field( 'medidove_footer_bg' ) : NULL;
    $footer_bg_img = get_theme_mod('medidove_footer_bg_url');

    $footer_bg_url = !empty($footer_bg_page_url['url']) ? $footer_bg_page_url['url'] : $footer_bg_img;

    $medidove_footer_top_logo = get_template_directory_uri() . '/img/logo/footer-logo-3.png';

    $medidove_footer_phone_number_label = get_theme_mod( 'medidove_footer_phone_number_label', __( 'Phone Number', 'medidove' ) );
    $medidove_footer_phone_number = get_theme_mod( 'medidove_footer_phone_number', __( '+012 (345) 789', 'medidove' ) );

    // footer color
    $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
    if( !empty( $medidove_footer_bg_color ) ){
        $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
    }
    else{
        $medidove_footer_bg_color = get_theme_mod('medidove_footer_bg_color');
    }

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-6-'. $num ) ){
            $footer_columns++;
        }
    } 

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-1';
        $footer_class[2] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-2 pl-60';
        $footer_class[3] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-3';
        $footer_class[4] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-4';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    } 

?>  

    <!-- footer start -->
    <footer>
        <?php if ( is_active_sidebar('footer-6-1') OR is_active_sidebar('footer-6-2') OR is_active_sidebar('footer-6-3') OR is_active_sidebar('footer-6-4') ): ?>
        <div class="footer-top footer-7-bg pos-rel pt-80 pb-0" data-bg-color="<?php echo esc_attr($medidove_footer_bg_color); ?>" data-background="<?php echo esc_url($footer_bg_url); ?>">
            <div class="container">
                <div class="footer7-top-links">
                    <div class="row align-items-center">

                        <div class="col-lg-3">
                            <div class="footer7-top-links-logo">
                                <div class="footer-logo mb-30">
                                    <a href="<?php print esc_url(home_url('/')); ?>">
                                        <img src="<?php print esc_url($medidove_footer_top_logo); ?>" alt="Medidove">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="footer7-top-links-social text-center mb-30">
                                <div class="h4footer-social">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <?php if ( !empty ( $medidove_footer_phone_number ) ) : ?>
                        <div class="col-lg-3">
                            <div class="footer7-top-links-phone text-right mb-30">
                                <div class="link-phone">
                                    <div class="link-phone-icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    <div class="link-phone-text">
                                        <span><?php print esc_html($medidove_footer_phone_number_label); ?> </span> 
                                        <h4><a href="<?php print esc_attr($medidove_footer_phone_number); ?>"><?php print esc_html($medidove_footer_phone_number); ?></a></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <?php
                    if ( $footer_columns < 4 ) {     
                        print '<div class="col-xl-3 col-lg-6 col-md-6 mb-40">';
                        dynamic_sidebar( 'footer-6-1');
                        print '</div>';
                    
                        print '<div class="col-xl-3 col-lg-6 col-md-6 mb-40">';
                        dynamic_sidebar( 'footer-6-2');
                        print '</div>';
                    
                        print '<div class="col-xl-3 col-lg-6 col-md-6 mb-40">';
                        dynamic_sidebar( 'footer-6-3');
                        print '</div>'; 

                        print '<div class="col-xl-3 col-lg-6 col-md-6 mb-40">';
                        dynamic_sidebar( 'footer-6-4');
                        print '</div>';       
                    }
                    else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-6-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-6-'. $num );
                                print '</div>';
                            }  
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer-bottom footer-bottom-7 pt-25 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-copyright footer-copyright-3 text-center">
                            <p><?php print medidove_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <footer class="d-none">
        <div class="footer-top footer-7-bg pos-rel pt-80 pb-0" data-background="<?php print get_template_directory_uri() ?>/img/home8/bg/footer8-map.png">
            <div class="container">
                <div class="footer7-top-links">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="footer7-top-links-logo">
                                <div class="footer-logo mb-30"><a href="#"><img src="https://www.devsnews.com/wp/medidove/wp-content/uploads/2019/05/footer-logo-3.png" alt="Medidove"></a></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer7-top-links-social text-center mb-30">
                                <div class="h4footer-social">
                                    <?php medidove_footer_social_profiles(); ?>
                                    <ul class="list-inline d-none">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer7-top-links-phone text-right mb-30">
                                <div class="link-phone">
                                    <div class="link-phone-icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    <div class="link-phone-text">
                                        <span>Phone Number</span>
                                        <h4><a href="tel:+012(345)789">+012 (345) 789</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-40">
                        <div class="footer-contact-info footer-contact-info-3 mb-40">
                            <div class="footer-title"><h3>About Us</h3></div>
                            <div class="footer-contact-content mb-25">
                                <p class="p-0">Lorem ipsum dolor sit amet, cotetur adipisicing elit, sed do eiusmotempor incididunt ut labore et dolore </p>
                            </div>
                            <div class="footer-emailing">
                                <ul>
                                    <li><i class="far fa-envelope"></i>info@examplemedical.com</li>
                                    <li><i class="far fa-clone"></i>examplemedical.com</li>
                                    <li><i class="far fa-flag"></i>227 Marion Street, Columbia</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-40">
                        <div class="footer-widget mb-40 f7w2-ctrl-width">
                            <div class="footer-title"><h3>More Links</h3></div>
                            <div class="footer-menu footer-menu-7 footer-widget7">
                                <ul>
                                    <li ><a href="#">Surgery & Radiology</a></li>
                                    <li ><a href="#">Family Medicine</a></li>
                                    <li ><a href="#">Women’s Health</a></li>
                                    <li ><a href="#">Optician</a></li>
                                    <li ><a href="#">Pediatrics</a></li>
                                    <li ><a href="#">About Medidove</a></li>
                                    <li ><a href="#">Meet Doctors</a></li>
                                    <li ><a href="#">Our Testimonials</a></li>
                                    <li ><a href="#">Latest Blog</a></li>
                                    <li ><a href="#">Setting & Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-40">
                        <div class="footer-widget footer-widget7 mb-40 f7w3-ctrl-width">
                            <div class="footer-title">
                                <h3>Recent News</h3> </div>
                            <div class="blog-feeds pr-15">
                                <div class="signle-blog-feeds mb-20">
                                    <div class="blog-feeds-thumb">
                                        <a href="news-details.html"><img src="<?php print get_template_directory_uri() ?>/img/home8/blog/feeds-thumb-1.jpg" alt="img"></a>
                                    </div>
                                    <div class="blog-feeds-text">
                                        <h5><a href="news-details.html">Lorem ipsum dolo et, consectetur.</a></h5> <span class="feeds-date">14 July 2019</span> </div>
                                </div>
                                <div class="signle-blog-feeds mb-20">
                                    <div class="blog-feeds-thumb">
                                        <a href="news-details.html"><img src="<?php print get_template_directory_uri() ?>/img/home8/blog/feeds-thumb-2.jpg" alt="img"></a>
                                    </div>
                                    <div class="blog-feeds-text">
                                        <h5><a href="news-details.html">Lorem ipsum dolo et, consectetur.</a></h5> <span class="feeds-date">14 July 2019</span> </div>
                                </div>
                                <div class="signle-blog-feeds  mb-20">
                                    <div class="blog-feeds-thumb">
                                        <a href="news-details.html"><img src="<?php print get_template_directory_uri() ?>/img/home8/blog/feeds-thumb-3.jpg" alt="img"></a>
                                    </div>
                                    <div class="blog-feeds-text">
                                        <h5><a href="news-details.html">Lorem ipsum dolo et, consectetur.</a></h5> <span class="feeds-date">14 July 2019</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-40">
                        <div class="footer-widget footer-widget7 mb-40">
                            <div class="footer-title">
                                <h3>Newsletters</h3> 
                            </div>
                            <p>Consectetur adipisicing elit sed eiusmod tempor incididunt </p>
                            <div class="footer-widget-newsletter">
                                <form action="#">
                                    <input type="text" placeholder="Enter Email">
                                    <button class="btn btn-icon tp-el-btn mt-10"><span><i class="fal fa-plus"></i></span>contact us</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom footer-bottom-7 pt-25 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-copyright footer-copyright-3 text-center">
                            <p><?php print medidove_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php 

}


/**
* footer default 
*/
function medidove_footer_style_7() {

// footer img
$footer_bg_page_url = function_exists('get_field') ? get_field( 'medidove_footer_bg' ) : NULL;
$footer_bg_img = get_theme_mod('medidove_footer_bg_url');

$footer_bg_url = !empty($footer_bg_page_url['url']) ? $footer_bg_page_url['url'] : $footer_bg_img;


// footer color
$medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
if( !empty( $medidove_footer_bg_color ) ){
    $medidove_footer_bg_color = function_exists('get_field') ? get_field( 'medidove_footer_bg_color' ) : NULL;
}
else{
    $medidove_footer_bg_color = get_theme_mod('medidove_footer_bg_color');
}

?>
    <footer class="footer_style_default footer-defualt-widget primary-bg" data-bg-color="<?php echo esc_attr($medidove_footer_bg_color); ?>" data-background="<?php print esc_url( $footer_bg_url ); ?>">
        <?php if ( is_active_sidebar('footer-widget') ): ?>
        <div class="footer-top footer-map pos-rel pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-widget' ); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer-bottom pt-25 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-copyright footer-copyright-3 text-center">
                            <p><?php print medidove_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php 
}


function medidove_copyright_text(){
    printf(
        'Copyright ©%s by <a href="%s" target="_blank" rel="noopener">adinfinity.gr</a>',
        esc_html( date_i18n( 'Y' ) ),
        esc_url( 'https://adinfinity.gr/' )
    );
}

/** 
 * [medidove_breadcrumb_func description]
 * @return [type] [description]
 */
function medidove_breadcrumb_func() { 

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title','Blog ');
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg front-home gray-bg pt-200 pb-180';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title','Blog ');
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg only-front-page breadcrumb-spacing';
    }
    elseif ( is_home() ) {

        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts' ) );
        }
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg gray-bg breadcrumb-blog-area pt-170 pb-160 breadcrumb-spacing';
    }
    elseif ( is_single() && 'post' == get_post_type() ) { 

        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg gray-bg secondary-bg breadcrumb-area breadcrumb-others-page pt-170 pb-160 breadcrumb-spacing';
        $title = get_theme_mod('breadcrumb_blog_title_details','Blog Details');
            

    }
    elseif ( is_single() && 'product' == get_post_type() ) { 

        $breadcrumb_class = 'breadcrumb-area pt-160 pb-170 breadcrumb-bg-color gray-bg breadcrumb-spacing';
        $title = get_theme_mod('breadcrumb_product_details','Product Details');
    }
    elseif ( is_single() && 'bdevs-service' == get_post_type() ) { 

        $breadcrumb_class = 'breadcrumb-area pt-160 pb-170 breadcrumb-bg-color gray-bg breadcrumb-spacing';
        $title = get_theme_mod('breadcrumb_department_details','Department Details');
            

    }
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'medidove' ) . get_search_query();
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg gray-bg pt-200 pb-180';
    }
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'medidove' );
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg gray-bg pt-200 pb-180';
    }

    elseif ( function_exists('is_woocommerce') && is_woocommerce() ) {
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg gray-bg breadcrumb-blog-area pt-170 pb-160 breadcrumb-spacing';
        $title = esc_html__('Shop','medidove');
    }
    
    elseif ( is_archive() ) {
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg gray-bg breadcrumb-blog-area pt-170 pb-160 breadcrumb-spacing';
        $title = get_the_archive_title();
    }

    else {
        $breadcrumb_class = 'breadcrumb-area breadcrumb-bg gray-bg breadcrumb-blog-area pt-170 pb-160 breadcrumb-spacing';
        $title = get_the_title();
    }

    
    $medidove_invisible_breadcrumb = function_exists('get_field') ? get_field( 'medidove_invisible_breadcrumb' ) : NULL;
    
    if( !$medidove_invisible_breadcrumb ) { 

        $breadcrumb_bg_img_from_page = function_exists('get_field') ? get_field( 'breadcrumb_bg_img_from_page' ) : NULL;
        $hide_breadcrumb_bg_img = function_exists('get_field') ? get_field( 'hide_breadcrumb_bg_img' ) : NULL;
        $bg_img = get_theme_mod('breadcrumb_bg_img');

        if( $hide_breadcrumb_bg_img ){
            $bg_img = '';
        }
        else {
          $bg_img = !empty($breadcrumb_bg_img_from_page['url']) ? $breadcrumb_bg_img_from_page['url'] : $bg_img;  
        } 

        ?>
        <?php    
        $medidove_breadcrumbs_switch = get_theme_mod('medidove_breadcrumbs_switch', true); 
        ?>

        <?php if(!empty($medidove_breadcrumbs_switch)) : ?>
        <div class="<?php print esc_attr($breadcrumb_class); ?> breadcrumb-area pt-160 pb-170 breadcrumb-bg-color gray-bg breadcrumb-spacing" style="background-image:url(<?php print esc_url($bg_img);?>)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <h2><?php echo wp_kses_post( $title );?></h2>
                            <div class="breadcrumb-menu">
                                <?php medidove_breadcrumb_callback();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php 
    }
}
add_action('medidove_before_main_content', 'medidove_breadcrumb_func');


function medidove_breadcrumb_callback() {

    $args = array(
        'show_browse'   => false,
        'post_taxonomy' => array( 'product' =>'product_cat' )
    );
    $breadcrumb = new Breadcrumb_Class( $args );
    return $breadcrumb->trail();

}

// medidove_search_form
function medidove_search_form() { ?>
        <!-- Fullscreen search -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fas fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get">
                        <div class="search-field-holder">
                            <input class="main-search-input" type="search" name="s" value="<?php print esc_attr( get_search_query() ) ?>" placeholder="<?php print esc_attr__('Search here...', 'medidove'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end fullscreen search -->

    <?php 
}

add_action('medidove_before_main_content', 'medidove_search_form');

if(!function_exists('medidove_breadcrumbs')) {

    function _medidove_home_callback($home) {
        return $home;
    }

    function _medidove_breadcrumbs_callback($breadcrumbs) {
        return $breadcrumbs;
    }

    function medidove_breadcrumbs() {
        global $post;

        // Archive
        $breadcrumb_archive = get_theme_mod('breadcrumb_archive','Archive for category ');
        
        // Search results
        $breadcrumb_search = get_theme_mod('breadcrumb_search','Search results for ');

        // Posts tagged
        $breadcrumb_post_tags = get_theme_mod('breadcrumb_post_tags','Posts tagged ');

        // posted by
        $breadcrumb_artitle_post_by = get_theme_mod('breadcrumb_artitle_post_by','Articles posted by ');

        // Page Not Found
        $breadcrumb_404 = get_theme_mod('breadcrumb_404','Page Not Found ');
        
        // Page
        $breadcrumb_page = get_theme_mod('breadcrumb_page','Page ');
        
        // Shop
        $breadcrumb_shop = get_theme_mod('breadcrumb_shop','Shop ');
        
        // Home
        $breadcrumb_home = get_theme_mod('breadcrumb_home','Home ');

        $home = '<li class="breadcrumb-list"><a href="'.esc_url(home_url('/')).'" title="'.esc_attr($breadcrumb_home).'">'.esc_html($breadcrumb_home).'</a></li>';
        $showCurrent = 1;               
        $homeLink = esc_url(home_url('/'));
        if ( is_front_page() ) { return; }  // don't display breadcrumbs on the homepage (yet)

        print _medidove_home_callback($home);

        if ( is_category() ) {
            // category section
            $thisCat = get_category(get_query_var('cat'), false);
            if (!empty($thisCat->parent)) print get_category_parents($thisCat->parent, TRUE, ' ' . '/' . ' ');
            print '<li class="active">'.  esc_html($breadcrumb_archive).' "' . single_cat_title('', false) . '"' . '</li>';
        } 
        elseif ( is_search() ) {
            // search section
            print '<li class="active">' .  esc_html($breadcrumb_search).' "' . get_search_query() . '"' .'</li>';
        } 
        elseif ( is_day() ) {
            print '<li class="breadcrumb-list"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            print '<li class="breadcrumb-list"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> </li>';
            print '<li class="active">' . get_the_time('d') .'</li>';
        } 
        elseif ( is_month() ) {
            // monthly archive
            print '<li class="breadcrumb-list"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li>';
            print '<li class=" active">' . get_the_time('F') .'</li>';
        } 
        elseif ( is_year() ) {
            // yearly archive
            print '<li class="active">'. get_the_time('Y') .'</li>';
        } 
        elseif ( is_single() && !is_attachment() ) {
            // single post or page
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                print '<li class="breadcrumb-list"><a href="' . $homeLink . '/?post_type=' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a></li>';
                if ($showCurrent) print '<li class="active">'. get_the_title() .'</li>';
            } 
            else {
                $cat = get_the_category(); if (isset($cat[0])) {$cat = $cat[0];} else {$cat = false;}
                if ($cat) {$cats = get_category_parents($cat, TRUE, ' ' .' ' . ' ');} else {$cats=false;}
                if (!$showCurrent && $cats) $cats = preg_replace("#^(.+)\s\s$#", "$1", $cats);
                print '<li class="breadcrumb-list">'.$cats.'</li>';
                if ($showCurrent) print '<li class="active">'. get_the_title() .'</li>';
            }
        } 
        elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            // some other single item
            $post_type = get_post_type_object(get_post_type());
            print '<li class="breadcrumb-list">' . $post_type->labels->singular_name .'<li>';
            if ( is_shop() && !get_query_var('paged') ) {
                print '<span class="active">'. esc_html($breadcrumb_shop) .'</span>';
            }
        } 
        elseif ( is_attachment() ) {
            // attachment section
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); if (isset($cat[0])) {$cat = $cat[0];} else {$cat=false;}
            if ($cat) print get_category_parents($cat, TRUE, ' ' . ' ' . ' ');
            print '<li class="breadcrumb-list"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
            if ($showCurrent) print  '<li class="active">'. get_the_title() .'</li>';
        } 
        elseif ( is_page() && !$post->post_parent ) {

            // parent page
            if ($showCurrent) 
                print '<li class="breadcrumb-list"><a href="' . get_permalink() . '">'. get_the_title() .'</a></li>';
        } 
        elseif ( is_page() && $post->post_parent ) {
            // child page
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();

            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li class="breadcrumb-list"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                print _medidove_breadcrumbs_callback($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1);
            }
            if ($showCurrent) print '<li class="active">'. get_the_title() .'</li>';
        } 
        elseif ( is_tag() ) {
            // tags archive
            print '<li class="breadcrumb-list">' .  esc_html($breadcrumb_post_tags).' "' . single_tag_title('', false) . '"' . '</li>';
        } 
        elseif ( is_author() ) {
            // author archive 
            global $author;
            $userdata = get_userdata($author);
            print '<li class="breadcrumb-list">' .  esc_html($breadcrumb_artitle_post_by). ' ' . $userdata->display_name . '</li>';
        } 
        elseif ( is_404() ) {
            // 404
            print '<li class="active salim">'. esc_html($breadcrumb_404) .'</li>';
        }
      
        if ( get_query_var('paged') ) {
            
            if ( function_exists('is_shop') && is_shop() ) {
                print '<span class="active">'. esc_html($breadcrumb_page) . ' ' . get_query_var('paged') .'</span>';
            }
            else {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) print '<li class="breadcrumb-list"> (';
                print  '<li class="active">'.esc_html($breadcrumb_page) . ' ' . get_query_var('paged').'</li>';
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) print ')</li>';
            }

        }
    }
}

/**
*
* pagination
*/
if( !function_exists('medidove_pagination') ) {

    function _medidove_pagi_callback($home) {
        return $home;
    }

    //page navegation
    function medidove_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        
        if( $pages=='' ){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            
            if(!$pages)
                $pages = 1;
        }

        $pagination = array(
            'base' => add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        $pagi = '';
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
                        foreach ($paginations as $key => $pg) {
                            $pagi.= '<li>'.$pg.'</li>';
                        }
            $pagi .= '</ul>';
        }

        print _medidove_home_callback($pagi);
    }
}


function medidove_kses_allowed_html() {
    $allowed_tags = array(
        'a' => array(
            'class' => array(),
            'href' => array(),
            'rel' => array(),
            'title' => array(),
        ),
        'abbr' => array(
            'title' => array(),
        ),
        'b' => array(),
        'blockquote' => array(
            'cite' => array(),
        ),
        'cite' => array(
            'title' => array(),
        ),
        'code' => array(),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'dl' => array(),
        'dt' => array(),
        'em' => array(),
        'h1' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'i' => array(),
        'img' => array(
            'alt' => array(),
            'class' => array(),
            'height' => array(),
            'src' => array(),
            'width' => array(),
        ),
        'li' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'data-text-preloader' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'strike' => array(),
        'strong' => array(),
        'ul' => array(
            'class' => array(),
        ),
    );

    return $allowed_tags;
}


// theme color
function medidove_custom_color(){
    $color_code = get_theme_mod( 'medidove_color_option','#e12454');
    wp_enqueue_style( 'medidove-custom', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".btn,.btn.green-bg-btn:hover,.team-link:hover,#scrollUp,.service-box-3 a.service-link:hover,.pricing-menu a.nav-link.active,.play-btn:hover,.testi-box-2:hover .testi-quato-icon-green,.btn.gray-btn-border:hover,.about-text-list ul li:hover i,.counter-box-white h6::before,.pricing-area nav.pricing-nav .nav-item.nav-link.active,.pink-bg,.pricing-title h6.pink-bg,.price-box-flat:hover .pricing-title h6,.product-action a:hover,.basic-pagination ul li a:hover, .basic-pagination ul li.active a, .basic-pagination-2 ul li span.current,
            .bakix-details-tab ul li a.active::before,.postbox__gallery .slick-arrow:hover,.video-btn:hover,.paginations ul li:hover a, .paginations ul li .current,.widget .widget-title::before,.search-form button:hover,.sidebar-tad li a:hover, .tagcloud a:hover,.wp-block-quote, blockquote,.blog-post-tag > a:hover,.testi-quato-icon,.portfolio-filter button::before,.contact:hover i,.contact-btn input.btn,.slider-active button:hover,.h4service-active .slick-arrow:hover,.h4team-thumb .team-link,.gallery-filter > button.active,.h5medical-tab-menu > nav > .nav a.active,.h5medical-content > h4::before,.h4testi-iconquato > i,.mean-container a.meanmenu-reveal span,.h4gallery-active .slick-arrow:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.pro-list-content .product-action a:hover,.pro-list-content a.button.yith-wcqv-button:hover,.cart .site-btn.brand-btn,.rev-btn button,.woocommerce #respond input#submit, .woocommerce a.buttons, .woocommerce button.button, .woocommerce input.button,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,button#place_order:hover,.sec-sub span,.info-shape,.gallery-slider-active .slick-arrow, .gallery-slider-active .slick-arrow,a.btn-icon-green:hover { background: ".$color_code."}";

        $custom_css .= " .header-info span i,.header-lang-list li a:hover,.author-desination h6,.pink-color,.team-social-profile ul li a:hover,.news-meta span a,.service-box-2 .service-content-2 a.service-link:hover,.team-author-info span,.header__menu.header-menu-white ul li:hover > a,.header__menu.header-menu-white ul li ul.submenu li:hover > a,.team-content h6,.author-desination-2 h6,.pink-color,.news-meta span a,.section-text-small h5,.pro-title a:hover,.post-meta span i,.post-meta span a:hover,.blog-title a:hover,.widget li a:hover,.read-more,.avatar-name span,.comment-reply-link:hover,.logged-in-as a:hover,.project-details-content h3 a:hover,.single-couter h1,.appoinment-content span,.portfolio-filter button:hover, .portfolio-filter button.active,.header__menu4 ul li a:hover, .header__menu ul li ul.submenu li a:hover,.team-social-profile ul li a:hover,.top4-menu ul li a:hover,.top4-social ul li a:hover i,.h4team-social ul li a:hover,.h4input-icon,.h5gallery-content > a > i:hover,.h5gallery-content > span > a:hover,.h5fact-wrapper > span,.mean-container a.meanmenu-reveal,.emmergency-call-icon i,.shop-tabs .nav-link.active,.side-cat ul li a:hover,.woocommerce ul.product_list_widget li a:hover,.pro-desc-tab .nav-link.active,.rev-btn button:hover,.sec-sub,.icon-box .button-border:hover,.fact-num .counter,.video-wrap a,.post-form-area .input-text::before{ color: ".$color_code."}";

        $custom_css .= ".header__menu ul li ul.submenu,.faq-right-box .card-body,.faq-right-box .btn-link,.basic-pagination ul li a:hover, .basic-pagination ul li.active a, .basic-pagination-2 ul li span.current,.paginations ul li:hover a, .paginations ul li .current,.comment-form textarea:focus,.blog-post-tag > a:hover,.team-box:hover .h4team-thumb > img,.mean-container a.meanmenu-reveal, .wp-block-quote, blockquote,.cart .site-btn.brand-btn,.rev-btn button,.comment-form input:focus,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,button#place_order:hover,.icon-box .button-border:hover,.post-form-area .input-text input:focus { border-color: ".$color_code."}";

        $custom_css .= ".ctn-preloader .animation-preloader .spinner{ border-top-color: ".$color_code."}";
        wp_add_inline_style('medidove-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_custom_color');

// sec color
function medidove_sec_custom_color(){
    $color_code = get_theme_mod( 'medidove_sec_color_option','#8fb569');
    wp_enqueue_style( 'medidove-sec-custom', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".play-btn,.btn-icon:hover,.btn:hover,.service-box-3 .service-link,.btn.green-bg-btn,.team-link,.price-box-flat:hover .price-btn-2 a,.price-box-flat .price-btn-2 a.green-bg,.testi-quato-icon-green,.team-activation .slick-dots li.slick-active button,.professinals-list li:hover i,.contact i,.contact-btn input.btn:hover,.green-bg,.h4service-active .slick-arrow, .h4gallery-active .slick-arrow,.routine__table .table tbody td.active-doctor,#scrollUp:hover,.pro-list-content .product-action a,.pro-list-content a.button.yith-wcqv-button,.cart .site-btn.brand-btn:hover,.gallery-slider-active .slick-arrow:hover,a.btn-icon-green,.h4service-active .slick-dots li.slick-active button,.h4gallery-active .slick-dots li.slick-active button, .h5service-active .slick-dots li.slick-active button { background: ".$color_code."}";

        $custom_css .= ".single-satisfied h1,.green-color,a:focus, a:hover,.news-meta span a:hover,.latest-news-box-2 .latest-news-content h3 a:hover,.footer-widget ul li a:hover,.footer-defualt-widget .footer-social a:hover,.footer-widget ul li a:hover,.professinals-list li i ,.details-price span,.section-text-green h5,.h4events-list ul li > span.close-days,.h5fact-wrapper > i,.h4events-list ul li i,.h5services-content > a:hover,.service-box .service-content h3 a:hover,.more-service-list ul li a:hover .more-service-title, .contact-icon::before, .ser-fea-list ul li i, .testi-author-desination,.service-box .service-link:hover{ color: ".$color_code."}";

        $custom_css .= ".news-meta span a:hover,.latest-news-box-2 .latest-news-content h3 a:hover,.professinals-list li i,.btn-icon-white:hover,.team-box:hover .h4team-thumb > img,.service-widget,.testi-content span,.cart .site-btn.brand-btn:hover { border-color: ".$color_code."}";
        wp_add_inline_style('medidove-sec-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_sec_custom_color');

// header top bg color
function medidove_header_top_bg_color(){
    $color_code = get_theme_mod( 'medidove_header_top_bg_color','#F4F9FD');
    wp_enqueue_style( 'medidove-header-top-bg', MEDIOVE_THEME_CSS_DIR . '/custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".top-bar{ background: ".$color_code."}";

        wp_add_inline_style('medidove-header-top-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_header_top_bg_color');

// header top bg color
function medidove_breadcrumb_bg_color(){
    $color_code = get_theme_mod( 'medidove_breadcrumb_bg_color','#F4F9FD');
    wp_enqueue_style( 'medidove-breadcrumb-bg', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: ".$color_code."}";

        wp_add_inline_style('medidove-breadcrumb-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_breadcrumb_bg_color');

// breadcrumb-spacing top
function medidove_breadcrumb_spacing(){
    $padding_px = get_theme_mod( 'medidove_breadcrumb_spacing','160px');
    wp_enqueue_style( 'medidove-breadcrumb-top-spacing', MEDIOVE_THEME_CSS_DIR . '/custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: ".$padding_px."}";

        wp_add_inline_style('medidove-breadcrumb-top-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_breadcrumb_spacing');

// breadcrumb-spacing bottom
function medidove_breadcrumb_bottom_spacing(){
    $padding_px = get_theme_mod( 'medidove_breadcrumb_bottom_spacing','160px');
    wp_enqueue_style( 'medidove-breadcrumb-bottom-spacing', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: ".$padding_px."}";

        wp_add_inline_style('medidove-breadcrumb-bottom-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_breadcrumb_bottom_spacing');

// slider height
function medidove_slider_spacing(){
    $slider_height = get_theme_mod( 'medidove_slider_spacing','900px');
    wp_enqueue_style( 'medidove-slider-spacing', MEDIOVE_THEME_CSS_DIR . '/custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($slider_height!=''){
        $custom_css = '';
        $custom_css .= ".slider-active .slider-height{ min-height: ".$slider_height."}";

        wp_add_inline_style('medidove-slider-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_slider_spacing');

// slider 2 height
function medidove_slider2_spacing(){
    $slider_height = get_theme_mod( 'medidove_slider2_spacing','1000px');
    wp_enqueue_style( 'medidove-slider2-spacing', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($slider_height!=''){
        $custom_css = '';
        $custom_css .= ".slider-active .slider-height-2{ min-height: ".$slider_height."}";

        wp_add_inline_style('medidove-slider2-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_slider2_spacing');

// slider 3 height
function medidove_slider3_spacing(){
    $slider_height = get_theme_mod( 'medidove_slider3_spacing','780px');
    wp_enqueue_style( 'medidove-slider3-spacing', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($slider_height!=''){
        $custom_css = '';
        $custom_css .= ".slider-height.slider-height-3{ min-height: ".$slider_height."}";

        wp_add_inline_style('medidove-slider3-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_slider3_spacing');

// slider 3 height
function medidove_scrollup_switch(){
    $scrollup_switch = get_theme_mod( 'medidove_scrollup_switch');
    wp_enqueue_style( 'medidove-scrollup-switch', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($scrollup_switch){
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('medidove-scrollup-switch',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_scrollup_switch');


// body font
function medidove_body_font(){
    $medidove_body_font = get_theme_mod( 'medidove_body_font',"'Rubik', sans-serif");
    wp_enqueue_style( 'medidove-body-font', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($medidove_body_font!=''){
        $custom_css = '';
        $custom_css .= "body{ font-family: " . $medidove_body_font . "}";
        wp_add_inline_style('medidove-body-font',$custom_css);
    } 
}
add_action('wp_enqueue_scripts', 'medidove_body_font');

// Heading font
function medidove_heading_font(){
    $medidove_heading_font = get_theme_mod( 'medidove_heading_font',"'Poppins', sans-serif");
    wp_enqueue_style( 'medidove-heading-font', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($medidove_heading_font!=''){
        $custom_css = '';
        $custom_css .= "h1,h2,h3,h4,h5,h6{ font-family: " . $medidove_heading_font . "}";
        wp_add_inline_style('medidove-heading-font',$custom_css);
    } 
}
add_action('wp_enqueue_scripts', 'medidove_heading_font');


// breadcrumb font size
function medidove_breadcrumb_font_size(){
    $bred_font_size = get_theme_mod( 'medidove_breadcrumb_font_size','48px');
    wp_enqueue_style( 'medidove-breadcrumb-font-size', MEDIOVE_THEME_CSS_DIR . 'custom-style.css', array(), filemtime( get_template_directory() . '/css/custom-style.css' ));
    if($bred_font_size!=''){
        $custom_css = '';
        $custom_css .= ".page-title h2{ font-size: ".$bred_font_size."}";

        wp_add_inline_style('medidove-breadcrumb-font-size',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'medidove_breadcrumb_font_size');