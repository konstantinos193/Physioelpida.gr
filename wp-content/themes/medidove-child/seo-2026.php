<?php
/**
 * SEO restructure (2026) — URL architecture, redirects, schema, trust blocks.
 *
 * Included from functions.php. Implements the physioelpida SEO audit:
 * semantic URL bases (/therapeies/, /apokatastasi/), 301 redirect map for all
 * legacy URLs, BreadcrumbList/Person/Article/MedicalWebPage JSON-LD, clinical
 * reviewer block, thin-archive noindex and wp_head cleanup. The local-entity
 * footer block lives in footer.php.
 *
 * @package medidove-child
 */

/* -------------------------------------------------------------------------
 * 1. Semantic URL bases for the bdevs CPTs
 * ---------------------------------------------------------------------- */

/** Equipment posts live under /therapeies/, service posts under /apokatastasi/. */
function physio_seo_cpt_rewrite( $args, $post_type ) {
	if ( 'bdevs-member' === $post_type ) {
		$args['rewrite']['slug'] = 'therapeies';
		$args['has_archive']     = false; // hub page owns /therapeies/
	} elseif ( 'bdevs-service' === $post_type ) {
		$args['rewrite']['slug'] = 'apokatastasi';
		$args['has_archive']     = false; // hub page owns /apokatastasi/
	}
	return $args;
}
add_filter( 'register_post_type_args', 'physio_seo_cpt_rewrite', 10, 2 );

/* -------------------------------------------------------------------------
 * 2. Legacy URL → new URL 301 map (PHP-level; works regardless of .htaccess)
 * ---------------------------------------------------------------------- */

function physio_seo_redirect_map() {
	return array(
		// Equipment: /member/* → /therapeies/*
		'member/tecar-therapeia'                              => 'therapeies/tecar',
		'member/eswt-btl'                                     => 'therapeies/kroustika-kymata',
		'member/cpm-gonatos-ischiou-agkona-omou'              => 'therapeies/cpm',
		'member/psifiaki-elxi'                                => 'therapeies/aposympiesi-spondylikis-stilis',
		'member/amfit-digital-morphology-pedometer'           => 'therapeies/pelmatografima',
		'member/s-i-s-yperepagogikos-magnitikos-diegertis'    => 'therapeies/sis-magnitikos-diegertis',
		'member/laser-ypsisychno'                             => 'therapeies/laser-ypsilis-isxyos',
		'member/kykloforitis-akron'                           => 'therapeies/piesotherapeia',
		'member/tumble-forms-therapeies-se-paidia-me-eidikes-anagkes' => 'therapeies/tumble-forms',
		'member/parafynoloutro'                               => 'therapeies/parafynoloutro',
		'member/dinoloutro'                                   => 'therapeies/dinoloutro',
		'member/diathermia-mikrokymaton'                      => 'therapeies/diathermia-mikrokymaton',
		'member/laba-yperythron'                              => 'therapeies/laba-yperythron',
		'member'                                              => 'therapeies',
		// Services: /service/* → /apokatastasi/* (treatments moved to /therapeies/)
		'service/rehabilitation-of-musculoskeletal-disorders' => 'apokatastasi/myoskeletiki-apokatastasi',
		'service/rehabilitation-in-sports-injuries'           => 'apokatastasi/athlitiki-apokatastasi',
		'service/postoperative-rehabilitation'                => 'apokatastasi/metegxeiritiki-apokatastasi',
		'service/craniocerebral-spinal-cord-injuries'         => 'apokatastasi/nevrologiki-apokatastasi',
		'service/degenerative-type-motor-dysfunctions'        => 'apokatastasi/ekfylitikes-patheiseis',
		'service/respiratory'                                 => 'apokatastasi/anapneystiki-fysikotherapeia',
		'service/physiotherapy-at-home'                       => 'apokatastasi/fysikotherapeia-kat-oikon',
		'service/clinical-evaluation'                         => 'apokatastasi/kliniki-axiologisi',
		'service/rehabilitation-in-metabolic-diseases'        => 'apokatastasi/metavolikes-patheiseis',
		'service/aesthetics'                                  => 'apokatastasi/aisthitiki-fysikotherapeia',
		'service/therapeutic-exercise'                        => 'therapeies/therapeftiki-askisi',
		'service/footprint'                                   => 'therapeies/pelmatografima',
		'service/lymphatic-massage'                           => 'therapeies/lemfiki-malaxi',
		'service/hand-massage'                                => 'therapeies/xeiromalaxi',
		'service/chiropractic'                                => 'therapeies/xeironaktiki-therapeia',
		'service'                                             => 'apokatastasi',
		// Pages
		'serv1'                                               => 'apokatastasi',
		'gym'                                                 => 'therapeies/therapeftiki-askisi',
		'bio'                                                 => 'fysiotherapeftis/tsolas-dimitrios',
	);
}

/** 301 every legacy URL (with or without /en/ prefix) to its new canonical location. */
function physio_seo_redirects() {
	if ( is_admin() || empty( $_SERVER['REQUEST_URI'] ) ) {
		return;
	}
	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
	if ( 'en' === $path || '' === $path ) {
		return;
	}
	if ( 0 === strpos( $path, 'en/' ) ) {
		// TranslatePress prefixes home_url() with /en/ itself on EN requests.
		$path = substr( $path, 3 );
	}
	$map = physio_seo_redirect_map();
	if ( isset( $map[ $path ] ) ) {
		wp_safe_redirect( home_url( '/' . $map[ $path ] . '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'physio_seo_redirects', 1 );

/* -------------------------------------------------------------------------
 * 3. JSON-LD graph extensions: BreadcrumbList, Person, Article, MedicalWebPage
 * ---------------------------------------------------------------------- */

/** Hub pages used by the new architecture. */
function physio_seo_hub_map() {
	return array(
		'apokatastasi'     => array( 'title' => 'Αποκατάσταση', 'url' => '/apokatastasi/' ),
		'therapeies'       => array( 'title' => 'Θεραπείες', 'url' => '/therapeies/' ),
		'pathiseis'        => array( 'title' => 'Παθήσεις', 'url' => '/pathiseis/' ),
		'fysiotherapeftis' => array( 'title' => 'Ο Φυσικοθεραπευτής', 'url' => '/fysiotherapeftis/' ),
	);
}

function physio_seo_graph_extra() {
	$graph = array();

	if ( ! is_front_page() && ( is_singular() || is_home() ) ) {
		$crumbs = array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => 'Αρχική',
				'item'     => home_url( '/' ),
			),
		);

		$post = get_queried_object();
		$hub  = null;
		if ( $post instanceof WP_Post ) {
			if ( 'bdevs-service' === $post->post_type ) {
				$hub = physio_seo_hub_map()['apokatastasi'];
			} elseif ( 'bdevs-member' === $post->post_type ) {
				$hub = physio_seo_hub_map()['therapeies'];
			} elseif ( 'page' === $post->post_type && $post->post_parent ) {
				$parent = get_post( $post->post_parent );
				$hubs   = physio_seo_hub_map();
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
			$crumbs[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => $hub['title'],
				'item'     => home_url( $hub['url'] ),
			);
		}
		$crumbs[] = array(
			'@type'    => 'ListItem',
			'position' => count( $crumbs ) + 1,
			'name'     => is_home() ? get_the_title( get_option( 'page_for_posts' ) ) : get_the_title(),
			'item'     => is_home() ? get_permalink( get_option( 'page_for_posts' ) ) : get_permalink(),
		);

		$graph[] = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $crumbs,
		);
	}

	if ( is_singular( 'post' ) ) {
		$graph[] = array(
			'@context'         => 'https://schema.org',
			'@type'            => 'Article',
			'headline'         => get_the_title(),
			'datePublished'    => get_the_date( 'c' ),
			'dateModified'     => get_the_modified_date( 'c' ),
			'author'           => array( '@id' => home_url( '/#clinician' ) ),
			'reviewedBy'       => array( '@id' => home_url( '/#clinician' ) ),
			'publisher'        => array( '@id' => home_url( '/#business' ) ),
			'mainEntityOfPage' => get_permalink(),
			'inLanguage'       => 'el',
		);
	}

	// Condition pages (children of the /pathiseis/ hub) → MedicalWebPage.
	if ( is_page() ) {
		$parent_id = (int) get_post_field( 'post_parent', get_queried_object_id() );
		if ( $parent_id && 'pathiseis' === get_post_field( 'post_name', $parent_id ) ) {
			$graph[] = array(
				'@context'     => 'https://schema.org',
				'@type'        => 'MedicalWebPage',
				'name'         => get_the_title(),
				'url'          => get_permalink(),
				'about'        => array( '@type' => 'MedicalCondition', 'name' => wp_strip_all_tags( get_the_title() ) ),
				'reviewedBy'   => array( '@id' => home_url( '/#clinician' ) ),
				'lastReviewed' => get_the_modified_date( 'Y-m-d' ),
				'inLanguage'   => 'el',
			);
		}
	}

	// Clinician Person node — emitted sitewide so @id references resolve everywhere.
	$graph[] = array(
		'@context'  => 'https://schema.org',
		'@type'     => 'Person',
		'@id'       => home_url( '/#clinician' ),
		'name'      => PHYSIO_CLINICIAN_NAME,
		'jobTitle'  => 'Φυσικοθεραπευτής',
		'url'       => home_url( PHYSIO_CLINICIAN_URL ),
		'worksFor'  => array( '@id' => home_url( '/#business' ) ),
		'alumniOf'  => array( '@type' => 'CollegeOrUniversity', 'name' => 'Τ.Ε.Ι. Φυσικοθεραπείας Αθήνας' ),
		'address'   => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => PHYSIO_ADDRESS_CITY,
			'addressCountry'  => 'GR',
		),
	);

	if ( $graph ) {
		echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'physio_seo_graph_extra', 6 );

/* -------------------------------------------------------------------------
 * 4. Clinical reviewer + disclaimer block (YMYL trust — audit §17/§83)
 * ---------------------------------------------------------------------- */

function physio_seo_clinical_footer( $content ) {
	if ( ! is_singular() || is_feed() || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}
	$post = get_post();
	if ( ! $post ) {
		return $content;
	}
	$is_clinical = in_array( $post->post_type, array( 'bdevs-service', 'bdevs-member', 'post' ), true );
	if ( 'page' === $post->post_type ) {
		$parent      = $post->post_parent ? get_post( $post->post_parent ) : null;
		$is_clinical = $parent && 'pathiseis' === $parent->post_name;
	}
	if ( ! $is_clinical || false !== strpos( $content, 'physio-review-note' ) ) {
		return $content;
	}
	$date     = get_the_modified_date( 'F Y', $post );
	$content .= '
<div class="physio-review-note">
	<p><strong>Κλινική επιμέλεια:</strong> <a href="' . esc_url( home_url( PHYSIO_CLINICIAN_URL ) ) . '">' . esc_html( PHYSIO_CLINICIAN_NAME ) . '</a>, Φυσικοθεραπευτής — Επιστημονικός Υπεύθυνος «Ελπίδα», Άρτα. Τελευταία αναθεώρηση: ' . esc_html( $date ) . '.</p>
	<p class="physio-disclaimer">Οι πληροφορίες αυτής της σελίδας έχουν ενημερωτικό χαρακτήρα και δεν αντικαθιστούν εξατομικευμένη ιατρική ή φυσικοθεραπευτική αξιολόγηση.</p>
	<p class="physio-review-cta"><a class="physio-cta-link" href="' . esc_url( home_url( '/rantevou/' ) ) . '">Κλείστε αξιολόγηση</a> · <a href="tel:' . esc_attr( PHYSIO_PHONE ) . '">26810 73248</a></p>
</div>';
	return $content;
}
add_filter( 'the_content', 'physio_seo_clinical_footer', 30 );

/* -------------------------------------------------------------------------
 * 5. Thin-archive noindex + wp_head cleanup
 * ---------------------------------------------------------------------- */

function physio_seo_robots_archives( $robots ) {
	if ( is_date() || is_author() || is_tag() || is_attachment() || is_post_type_archive() || is_tax() ) {
		$robots['noindex'] = true;
		$robots['follow']  = true;
		unset( $robots['index'] );
	}
	return $robots;
}
add_filter( 'wp_robots', 'physio_seo_robots_archives', 20 );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

