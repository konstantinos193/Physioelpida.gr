<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 6.0.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

$_shop_id = wc_get_page_id('shop');
$_content_layout_style = function_exists('get_field') ? get_field( 'content_layout_style', $_shop_id ) : NULL;
if( $_content_layout_style == 'no-sidebar' ) {
    $medidove_woo_col = "col-xl-12 col-lg-12";
    $medidove_sidebar_col = "d-none";
}
elseif( $_content_layout_style == 'right-sidebar' AND is_active_sidebar('product-sidebar') ) {
    $medidove_sidebar_col = "col-xl-3 col-lg-3";
    $medidove_woo_col = "col-xl-9 col-lg-9 shop-sidebar-pad order-first";
}
elseif( $_content_layout_style == 'full-width' ) {
    $medidove_woo_col = "col-xl-12 col-lg-12";
    $medidove_woo_full_container = "container-fluid";
    $medidove_sidebar_col = "d-none";
}
elseif( $_content_layout_style == 'default' OR $_content_layout_style == 'left-sidebar' OR is_active_sidebar('product-sidebar') ) {
    $medidove_sidebar_col = "col-xl-3 col-lg-3";
    $medidove_woo_col = "col-xl-9 col-lg-9 shop-sidebar-pad";
}
else {
    $medidove_woo_col = "col-xl-12 col-lg-12";
    $medidove_sidebar_col = "d-none";
}

// for sidebar
$_sidebar = !empty($_GET['sidebar']) ? $_GET['sidebar'] : '';

if($_sidebar == 'no') {
    $medidove_sidebar_col = "d-none";
    $medidove_woo_col = "col-xl-12 col-lg-12";
}
elseif($_sidebar == 'right') {
    $medidove_woo_col = "col-xl-9 col-lg-9 shop-sidebar-pad order-first";
}

// for product columns
$_product_columns = function_exists('get_field') && !empty(get_field( 'product_columns', $_shop_id ))  ? get_field( 'product_columns', $_shop_id ) : 4;

$medidove_product_col = "col-lg-". intval($_product_columns) ." col-sm-6 custom-col-10";


if( !empty($_GET['pcol']) ) {
    $medidove_product_col = "col-lg-". intval($_GET['pcol']) ." col-sm-6 custom-col-10";
}

    
?>

    <div class="shop-wrapper">
        <div class="container <?php print esc_attr($medidove_woo_full_container); ?>">
            <div class="row">
                <?php if (is_active_sidebar('product-sidebar')): ?>
                    <div class="<?php print esc_attr($medidove_sidebar_col); ?>">
                        <div class="product-sidebar" >
                            <?php
                            /**
                             * woocommerce_sidebar hook.
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                            do_action('woocommerce_sidebar');
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="<?php print esc_attr($medidove_woo_col); ?>">
                    <header class="woocommerce-products-header">
                        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                        <?php endif; ?>

                        <?php
                        /**
                         * Hook: woocommerce_archive_description.
                         *
                         * @hooked woocommerce_taxonomy_archive_description - 10
                         * @hooked woocommerce_product_archive_description - 10
                         */
                        do_action('woocommerce_archive_description');
                        ?>
                    </header>
                    <?php
                    if (woocommerce_product_loop()) {

                        /**
                         * Hook: woocommerce_before_shop_loop.
                         *
                         * @hooked wc_print_notices - 10
                         * @hooked woocommerce_result_count - 20
                         * @hooked woocommerce_catalog_ordering - 30
                         */
                        print '<div class="row align-items-center shop-count-ordering-wrap">';
                        do_action('woocommerce_before_shop_loop');
                        print '</div>';
                        ?>
                        <div class="tab-content shop-tabs-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <?php
                                print '<div class="row custom-row-10">';
                                woocommerce_product_loop_start();
                                if (wc_get_loop_prop('total')) {
                                    while (have_posts()) {
                                        the_post();

                                        print '<div class="'. esc_attr($medidove_product_col) .'">';
                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         *
                                         * @hooked WC_Structured_Data::generate_product_data() - 10
                                         */
                                        do_action('woocommerce_shop_loop');

                                        wc_get_template_part('content', 'product');
                                        print '</div>';
                                    }
                                }
                                woocommerce_product_loop_end();
                                print '</div>';
                                ?>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php
                                woocommerce_product_loop_start();
                                if (wc_get_loop_prop('total')) {
                                    while (have_posts()) {
                                        the_post();

                                        print '<div class="row mb-20">';
                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         *
                                         * @hooked WC_Structured_Data::generate_product_data() - 10
                                         */
                                        do_action('woocommerce_shop_loop');

                                        wc_get_template_part('list-content', 'product');
                                        print '</div>';
                                    }
                                }
                                woocommerce_product_loop_end();
                                ?>
                            </div>
                        </div>
                        <?php

                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        print '<div class="row shop-pagination-wrap"><div class="col-xl-12">';
                        do_action('woocommerce_after_shop_loop');
                        print '</div></div>';
                    } else {
                        /**
                         * Hook: woocommerce_no_products_found.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action('woocommerce_no_products_found');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer('shop');
