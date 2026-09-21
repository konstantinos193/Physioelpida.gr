<?php
/**
 * Page layout 2026 — title band, breadcrumb, hub cards.
 *
 * The SEO restructure created ~20 classic pages that the parent theme renders
 * as bare content: no H1, no breadcrumb (medidove_breadcrumbs_switch is off),
 * full-width text. This file adds a consistent page head to every non-Elementor
 * page and CPT single, and turns hub link-lists into card grids — all on output,
 * the post content in the DB is untouched.
 *
 * Kinds (body class physio-layout--{kind}):
 *   hub        /therapeies/ /apokatastasi/ /pathiseis/ /fysiotherapeftis/ /omada/
 *   condition  children of /pathiseis/
 *   person     children of /fysiotherapeftis/
 *   faq        /syxnes-erotiseis/
 *   page       any other classic page
 *   member     bdevs-member single (θεραπείες)
 *   service    bdevs-service single (αποκατάσταση)
 *   post/blog/archive/search
 *
 * @package medidove-child
 */

/** Slugs of the hub/listing pages whose <ul> link-lists render as cards. */
function physio_layout_hub_slugs() {
	return array( 'therapeies', 'apokatastasi', 'pathiseis', 'fysiotherapeftis', 'omada' );
}

/**
 * Portrait photo for person pages, from the clinic's own 2022 shoot (already
 * in uploads/ on the live server). Keyed by page slug; no DB featured image
 * needed.
 */
function physio_layout_photo_map() {
	return array(
		'tsolas-dimitrios' => '/wp-content/uploads/2022/01/D4S_6667.jpg',
	);
}

function physio_layout_photo( $slug ) {
	$map = physio_layout_photo_map();
	return isset( $map[ $slug ] ) ? home_url( $map[ $slug ] ) : '';
}

/** Which layout the current request gets; '' = leave the theme alone. */
function physio_layout_kind() {
	static $kind = null;
	if ( null !== $kind ) {
		return $kind;
	}
	$kind = '';

	if ( is_admin() || is_front_page() || is_404() ) {
		return $kind;
	}

	if ( is_page() ) {
		$id = get_queried_object_id();
		// Elementor pages (home, about, contact, rantevou) bring their own hero.
		if ( 'builder' === get_post_meta( $id, '_elementor_edit_mode', true ) ) {
			return $kind;
		}
		if ( function_exists( 'get_field' ) && get_field( 'medidove_invisible_breadcrumb', $id ) ) {
			return $kind;
		}
		$slug   = get_post_field( 'post_name', $id );
		$parent = get_post_field( 'post_parent', $id ) ? get_post_field( 'post_name', get_post_field( 'post_parent', $id ) ) : '';

		if ( in_array( $slug, physio_layout_hub_slugs(), true ) ) {
			$kind = 'hub';
		} elseif ( 'pathiseis' === $parent ) {
			$kind = 'condition';
		} elseif ( 'fysiotherapeftis' === $parent ) {
			$kind = 'person';
		} elseif ( 'syxnes-erotiseis' === $slug ) {
			$kind = 'faq';
		} else {
			$kind = 'page';
		}
	} elseif ( is_singular( 'bdevs-member' ) ) {
		$kind = 'member';
	} elseif ( is_singular( 'bdevs-service' ) ) {
		$kind = 'service';
	} elseif ( is_singular( 'post' ) ) {
		$kind = 'post';
	} elseif ( is_home() ) {
		$kind = 'blog';
	} elseif ( is_search() ) {
		$kind = 'search';
	} elseif ( is_archive() ) {
		$kind = 'archive';
	}

	return $kind;
}

function physio_layout_body_class( $classes ) {
	$kind = physio_layout_kind();
	if ( $kind ) {
		$classes[] = 'physio-layout';
		$classes[] = 'physio-layout--' . $kind;
	}
	return $classes;
}
add_filter( 'body_class', 'physio_layout_body_class' );

/* -------------------------------------------------------------------------
 * Breadcrumb trail — shared by the visible band and the BreadcrumbList JSON-LD
 * ---------------------------------------------------------------------- */

/** @return array<int, array{name:string, url:string}> Home first, current page last. */
function physio_breadcrumb_trail() {
	$en    = function_exists( 'physio_seo_is_en' ) && physio_seo_is_en();
	$trail = array(
		array( 'name' => $en ? 'Home' : 'Αρχική', 'url' => home_url( '/' ) ),
	);

	if ( is_home() ) {
		$blog = (int) get_option( 'page_for_posts' );
		if ( $blog ) {
			$trail[] = array( 'name' => get_the_title( $blog ), 'url' => get_permalink( $blog ) );
		}
		return $trail;
	}

	if ( is_search() ) {
		$trail[] = array( 'name' => ( $en ? 'Search: ' : 'Αναζήτηση: ' ) . get_search_query(), 'url' => '' );
		return $trail;
	}

	if ( is_archive() ) {
		$trail[] = array( 'name' => wp_strip_all_tags( get_the_archive_title() ), 'url' => '' );
		return $trail;
	}

	if ( ! is_singular() ) {
		return $trail;
	}

	$post = get_queried_object();
	$hubs = function_exists( 'physio_seo_hub_map' ) ? physio_seo_hub_map() : array();
	$hub  = null;

	if ( $post instanceof WP_Post ) {
		if ( 'bdevs-service' === $post->post_type && isset( $hubs['apokatastasi'] ) ) {
			$hub = $hubs['apokatastasi'];
		} elseif ( 'bdevs-member' === $post->post_type && isset( $hubs['therapeies'] ) ) {
			$hub = $hubs['therapeies'];
		} elseif ( 'page' === $post->post_type && $post->post_parent ) {
			$parent = get_post( $post->post_parent );
			if ( $parent && isset( $hubs[ $parent->post_name ] ) ) {
				$hub = $hubs[ $parent->post_name ];
			} elseif ( $parent ) {
				$hub = array( 'title' => get_the_title( $parent ), 'url' => wp_parse_url( get_permalink( $parent ), PHP_URL_PATH ) );
			}
		} elseif ( 'post' === $post->post_type && get_option( 'page_for_posts' ) ) {
			$hub = array(
				'title' => get_the_title( get_option( 'page_for_posts' ) ),
				'url'   => wp_parse_url( get_permalink( get_option( 'page_for_posts' ) ), PHP_URL_PATH ),
			);
		}
	}

	if ( $hub ) {
		$trail[] = array( 'name' => $hub['title'], 'url' => home_url( $hub['url'] ) );
	}
	$trail[] = array( 'name' => get_the_title(), 'url' => get_permalink() );

	return $trail;
}

/* -------------------------------------------------------------------------
 * Title band — replaces the parent's (disabled) breadcrumb area
 * ---------------------------------------------------------------------- */

function physio_layout_page_head() {
	$kind = physio_layout_kind();
	if ( ! $kind ) {
		return;
	}

	$trail = physio_breadcrumb_trail();
	$last  = end( $trail );
	$title = $last ? $last['name'] : get_the_title();

	// Plain title + breadcrumb inside the page — no band, no banner: the
	// site header and footer are the only chrome.
	$classes = array( 'physio-head', 'physio-head--' . $kind );
	// Reading-width pages align the title with the article column.
	if ( in_array( $kind, array( 'condition', 'faq', 'page', 'post', 'blog' ), true ) ) {
		$classes[] = 'physio-head--narrow';
	}
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div class="container">
			<div class="physio-head__inner">
				<?php if ( count( $trail ) > 1 ) : ?>
				<nav class="physio-crumbs" aria-label="Breadcrumb">
					<ol>
						<?php foreach ( $trail as $i => $crumb ) : ?>
						<li>
							<?php if ( $i < count( $trail ) - 1 && $crumb['url'] ) : ?>
								<a href="<?php echo esc_url( $crumb['url'] ); ?>"><?php echo esc_html( $crumb['name'] ); ?></a>
							<?php else : ?>
								<span aria-current="page"><?php echo esc_html( $crumb['name'] ); ?></span>
							<?php endif; ?>
						</li>
						<?php endforeach; ?>
					</ol>
				</nav>
				<?php endif; ?>
				<h1 class="physio-head__title"><?php echo esc_html( $title ); ?></h1>
			</div>
		</div>
	</div>
	<?php
}

function physio_layout_hooks() {
	// Parent registers its breadcrumb at load; the child's functions.php runs
	// first, so the swap has to wait until both are loaded.
	remove_action( 'medidove_before_main_content', 'medidove_breadcrumb_func' );
	add_action( 'medidove_before_main_content', 'physio_layout_page_head', 10 );
}
add_action( 'after_setup_theme', 'physio_layout_hooks', 20 );

/* -------------------------------------------------------------------------
 * Output transforms (the_content) — DB content stays as authored
 * ---------------------------------------------------------------------- */

/**
 * Hub pages: `<li><a>Title</a> — description</li>` → card link.
 * Lists without an em-dash description become title-only cards.
 */
function physio_layout_hub_cards( $content ) {
	if ( 'hub' !== physio_layout_kind() || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}

	$content = preg_replace_callback(
		'~<li>\s*<a href="([^"]+)">(.*?)</a>\s*(?:[—–-]\s*(.*?))?\s*</li>~su',
		function ( $m ) {
			$title = trim( wp_strip_all_tags( $m[2] ) );
			$desc  = isset( $m[3] ) ? trim( $m[3] ) : '';
			$html  = '<li><a class="physio-card" href="' . esc_url( $m[1] ) . '"><strong>' . esc_html( $title ) . '</strong>';
			if ( $desc ) {
				// The card is itself a link — no nested anchors inside it.
				$html .= '<span>' . wp_kses( $desc, array( 'em' => array(), 'strong' => array() ) ) . '</span>';
			}
			return $html . '</a></li>';
		},
		$content
	);

	// Only lists that became cards get the grid class.
	return preg_replace( '~<ul>(?=\s*<li><a class="physio-card")~', '<ul class="physio-hub-grid">', $content );
}
add_filter( 'the_content', 'physio_layout_hub_cards', 20 );

/**
 * bdevs-member content opens with its own `<div class="section-title"><h1>…`
 * block (legacy theme markup). The band already renders the H1, so drop the
 * duplicate on output.
 */
function physio_layout_strip_member_h1( $content ) {
	if ( 'member' !== physio_layout_kind() || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}
	return preg_replace(
		'~^\s*<div class="section-title[^"]*">\s*<h1>.*?</h1>\s*(?:<div class="section-line[^"]*">.*?</div>\s*)?</div>~su',
		'',
		$content,
		1
	);
}
add_filter( 'the_content', 'physio_layout_strip_member_h1', 20 );
