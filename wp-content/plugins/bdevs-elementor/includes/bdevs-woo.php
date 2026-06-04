<?php

/**
 * [bdevs_woo_product_cart_button description]
 * @return [type] [description]
 */
function bdevs_woo_product_cart_button() {
	global $product;
	$class      = 'product_type_' . $product->get_type() . ' add_to_cart_button ' . ( $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '' );
	$attributes = array(
		'data-product_id'  => $product->get_id(),
		'data-product_sku' => $product->get_sku(),
		'aria-label'       => $product->add_to_cart_description(),
		'rel'              => 'nofollow',
	);
	print '<div class="product-action text-center">';
	print '<a ' . http_build_query( $attributes, ' ', ' ' ) . ' class="' . $class . '" href="' . $product->add_to_cart_url() . '"><i class="fal fa-cart-arrow-down"></i></a>';
	print bdevs_woo_quick_view_button( $product->get_id() );
	print bdevs_woo_vc_yith_wishlist();
	print '</div>';
}

/**
 * [bdevs_woo_list_product_cart_button description]
 * @return [type] [description]
 */
function bdevs_woo_list_product_cart_button() {
	global $product;
	$class      = 'product_type_' . $product->get_type() . ' r-btn-b product_type_simple add_to_cart_button ' . ( $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '' );
	$attributes = array(
		'data-product_id'  => $product->get_id(),
		'data-product_sku' => $product->get_sku(),
		'aria-label'       => $product->add_to_cart_description(),
		'rel'              => 'nofollow',
	);
	print '<div class="product-action dotd-action">';
	print '<a ' . http_build_query( $attributes, ' ', ' ' ) . ' class="' . $class . '" href="' . $product->add_to_cart_url() . '">Add to Cart</a>';
	print bdevs_woo_quick_view_button( $product->get_id() );
	print bdevs_woo_vc_yith_wishlist();
	print '</div>';
}

/**
 * [bdevs_woo_woo_rating description]
 * @return [type] [description]
 */


function bdevs_woo_woo_rating() {
	global $product;
	$rating = $product->get_average_rating();
	$review = 'Rating ' . $rating . ' out of 5';
	$html   = '';
	$html   .= '<div class="details-rating mb-10" title="' . $review . '">';
	for ( $i = 0; $i <= 4; $i ++ ) {
		if ( $i < floor( $rating ) ) {
			$html .= '<a href="#" class="active"><i class="fas fa-star"></i></a>';
		} else {
			$html .= '<a href="#"><i class="far fa-star"></i></a>';
		}
	}
	$html .= '<span>( ' . $rating . ' out of 5 )</span>';
	$html .= '</div>';
	print bdevs_woo_woo_rating_html( $html );
}

function bdevs_woo_woo_rating_html( $html ) {
	return $html;
}

/**
 * [bdevs_woo_woo_rating description]
 * @return [type] [description]
 */
function bdevs_woo_shop_rating() {
	global $product;
	$rating = $product->get_average_rating();
	$review = esc_html( 'Rating ' . $rating . ' out of 5' );
	ob_start(); ?>
    <div class="rating" title="<?php print esc_attr( $review ); ?>">
		<?php
		for ( $i = 0; $i <= 4; $i ++ ) {
			if ( $i < floor( $rating ) ) { ?>
                <a href="#"><i class="fas fa-star"></i></a>
				<?php
			} else { ?>
                <a href="#"><i class="far fa-star"></i></a>
				<?php
			}
		}
		?>
    </div>
	<?php
	return ob_get_clean();
}

function bdevs_woo_get_price() {
	ob_start(); ?>
    <h5 class="pro-price p-price"><?php print bdevs_woo_get_price_html(); ?></h5>
	<?php
	return ob_get_clean();
}

function bdevs_woo_get_price_html() {
	global $product;

	return $product->get_price_html();
}



/**
 * [bdevs_woo_comment_rating description]
 *
 * @param  [type] $rating [description]
 *
 * @return [type]         [description]
 */
function bdevs_woo_comment_rating( $rating ) {
	$review = 'Rating ' . $rating . ' out of 5';
	$html   = '';
	$html   .= '<div class="rating" title="' . $review . '">';
	for ( $i = 0; $i <= 4; $i ++ ) {
		if ( $i < floor( $rating ) ) {
			$html .= '<a href="#"><i class="fas fa-star"></i></a>';
		} else {
			$html .= '<a href="#"><i class="far fa-star"></i></a>';
		}
	}
	$html .= '</div>';

	return $html;
}


add_filter( 'add_to_cart_fragments', 'bdevs_woo_woocommerce_header_add_to_cart_fragment' );

/**
 * [bdevs_woo_woocommerce_header_add_to_cart_fragment description]
 *
 * @param  [type] $fragments [description]
 *
 * @return [type]            [description]
 */
function bdevs_woo_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
    <a class="cp-minicart" href="<?php echo wc_get_cart_url(); ?>"><i class="fas fa-shopping-cart"></i><span
                id="medidove-cart"
                class="mini-cart-items"><?php print WC()->cart->get_cart_contents_count(); ?></span></a>
	<?php
	$fragments['a.cp-minicart'] = ob_get_clean();

	return $fragments;
}

function bdevs_woo_vc_yith_wishlist() {

	global $product;

	$cssclass = 'wishlist-rd';
	$mar      = 'tanzim-mar-top';

	$id   = $product->get_id();
	$type = $product->get_type();
	$link = get_site_url();

	$img    = '<img src="' . esc_attr( $link ) . '/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading tanzim_wi_loder" alt="' . esc_attr( 'loading' ) . '" width="16" height="16" style="visibility:hidden">';
	$markup = '';

	if ( MEDIDOVE_WISHLIST_ACTIVED ) {

		$markup .= '<div class="yith-wcwl-add-to-wishlist ' . $mar . ' add-to-wishlist-' . $id . '">';
		$markup .= '<div class="yith-wcwl-add-button wishlist show" style="display:block">';
		$markup .= '<a href="' . $link . '/shop/?add_to_wishlist=' . $id . '" rel="nofollow" data-product-id="' . $id . '" data-product-type="' . $type . '" class="add_to_wishlist ' . $cssclass . '">';
		$markup .= '<i class="fal fa-heart"></i></a>';
		$markup .= $img;
		$markup .= '</div>';
		$markup .= '<div class="yith-wcwl-wishlistaddedbrowse wishlist hide" style="display:none;">';
		$markup .= '<a href="' . $link . '/wishlist/view/" rel="nofollow" class=" ' . $cssclass . '"><i class="fal fa-heart"></i></a>';
		$markup .= $img;
		$markup .= '</div>';
		$markup .= '<div class="yith-wcwl-wishlistexistsbrowse wishlist  hide" style="display:none">';
		$markup .= '<a href="' . $link . '/wishlist/view/" rel="nofollow" class=" ' . $cssclass . '"><i class="fal fa-heart"></i></a>';
		$markup .= $img;
		$markup .= '</div>';
		$markup .= '<div style="clear:both"></div>';
		$markup .= '<div class="yith-wcwl-wishlistaddresponse"></div>';
		$markup .= '</div>';

	}

	return $markup;
}

add_filter( 'woocommerce_product_additional_information_heading', 'bdevs_woo_tab_heading' );
add_filter( 'woocommerce_product_description_heading', 'bdevs_woo_tab_heading' );

/**
 * [bdevs_woo_tab_heading description]
 *
 * @param  [type] $heading [description]
 *
 * @return [type]          [description]
 */
function bdevs_woo_tab_heading( $heading ) {
	return '';
}

/**
 * [bdevs_woo_woo_pagination description]
 *
 * @param  [type] $pagination [description]
 *
 * @return [type]             [description]
 */
function bdevs_woo_woo_pagination( $pagination ) {
	$pagi = '';
	if ( $pagination != '' ) {
		$pagi .= '<ul class="pagination justify-content-start">';
		foreach ( $pagination as $key => $pg ) {
			$pagi .= '<li class="page-item">' . $pg . '</li>';
		}
		$pagi .= '</ul>';
	}

	return $pagi;
}

function bdevs_woo_woocommerce_get_sidebar() {
	dynamic_sidebar( 'product-sidebar' );
}

function bdevs_woo_woocommerce_template_loop_price() {
	print '<div class="pro-text">';
	print '<div class="pro-title">';
	bdevs_woo_product_title();
	echo bdevs_woo_get_price();
	//    bdevs_woo_woo_rating();
	print '</div>';
	print '</div>';
}

function bdevs_woo_woocommerce_template_single_price() {
	print '<div class="price mt-15 mb-20">';
	print bdevs_woo_get_price_html();
	print '</div>';
}

function bdevs_woo_template_single_stock() {
	global $product;
	if ( $product->get_stock_quantity() > 0 ) {
		echo 'In Stock';
	} else {
		if ( $product->backorders_allowed() ) {
			echo 'On Backorder';
		} else {
			echo '<span class="stock-out">Out of stock</span>';
		}
	}
}

if ( ! function_exists( 'bdevs_woo_header_add_to_cart_fragment' ) ) {
	function bdevs_woo_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
        <span class="cart__count" id="medidove-cart-item">
			<?php echo esc_html( WC()->cart->cart_contents_count ); ?>
		</span>
		<?php
		$fragments['#medidove-cart-item'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'bdevs_woo_header_add_to_cart_fragment' );

if ( ! function_exists( 'bdevs_woo_header_add_to_cart_price' ) ) {
	function bdevs_woo_header_add_to_cart_price( $fragments ) {
		ob_start();
		?>
        <span class="cart__amount" id="medidove-total-price">
			<?php echo WC()->cart->get_cart_total(); ?>
		</span>
		<?php
		$fragments['#medidove-total-price'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'bdevs_woo_header_add_to_cart_price' );


function bdevs_woo_product_tab() {
	ob_start();
	?>
    <div class="ch-left mb-20">
        <ul class="nav shop-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true"><i class="fas fa-th"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false"><i class="fas fa-list-ul"></i></a>
            </li>
        </ul>
    </div>
    </div> <!-- pro-filter parent end -->
	<?php
	print ob_get_clean();
}

function bdevs_woo_quick_view_button( $product_id ) {
	if ( MEDIDOVE_QUICK_VIEW_ACTIVED ) {
		$product = wc_get_product( $product_id );
		$button  = '';
		if ( $product_id ) {

			$button = '<a href="#" class="button yith-wcqv-button" data-product_id="' . esc_attr( $product_id ) . '" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fal fa-eye"></i></a>';
			$button = apply_filters( 'yith_add_quick_view_button_html', $button, '', $product );
		}

		return $button;
	}
}

function bdevs_woo_product_compare_button( $product_id ) {
	if ( bdevs_woo_COMPARE_ACTIVED ) {
		$product = wc_get_product( $product_id );
		$button  = '';
		if ( $product_id ) {
			$url_args = array(
				'action' => 'yith-woocompare-add-product',
				'id'     => $product_id
			);
			$button   = sprintf( '<a href="%1$s" class="compare button" data-product_id="%2$s" rel="nofollow"><i class="fal fa-exchange"></i></a>',
				get_page_link() . '?action=yith-woocompare-add-product&amp;id=' . esc_attr( $product_id ),
				esc_attr( $product_id )
			);
		}

		return $button;
	}
}

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
    <div class="header-mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['.header-mini-cart'] = ob_get_clean();
    return $fragments;
});


// product_price_sale
function bdevs_woo_product_price_sale($product_id, $oldp = false)
{

    $product = wc_get_product($product_id);
    $woo_sale_tag = get_theme_mod('woo_sale_tag', 'Sale');

    $price = $product->get_regular_price();
    $old = '';

    if ($product->get_sale_price() != '') {
        if ($oldp) {
            return '<span class="sale-text">' . $woo_sale_tag . '</span> ';
        }
        else{
            '';
        }
    }
    return false;
}


function sale_badge_percentage() {
   global $product;
   if ( ! $product->is_on_sale() ) return;

   $max_percentage = 0;
   if ( $product->is_type( 'simple' ) ) {
      $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
   } 
   elseif ( $product->is_type( 'variable' ) ) {
      foreach ( $product->get_children() as $child_id ) {
         $variation = wc_get_product( $child_id );
         $price = $variation->get_regular_price();
         $sale = $variation->get_sale_price();
         if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
         if ( $percentage > $max_percentage ) {
            $max_percentage = $percentage;
         }
      }
   }

   if ( $max_percentage > 0 ) echo "<span class='product-tag discount'>-" . round($max_percentage) . "%</span>"; // If you would like to show -40% off then add text after % sign
}