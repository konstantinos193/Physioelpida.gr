<?php
/**
 * Medidove-child functions and definitions
 *
 * @package medidove-child
 */

/** Loading language **/
function medidove_child_theme_setup() {
	load_child_theme_textdomain( 'medidove-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'medidove_child_theme_setup' );

/** Enqueue the child theme stylesheet **/
function medidove_child_enqueue_scripts() {
	wp_enqueue_style( 'medidove-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'medidove_child_enqueue_scripts', 100 );

/* -------------------------------------------------------------------------
 * Easy Appointments — Greek strings missing from the bundled el.mo (4.x UI)
 * ---------------------------------------------------------------------- */
function physio_ea_greek_strings( $translation, $text, $domain ) {
	if ( 'easy-appointments' !== $domain || physio_seo_is_en() ) {
		return $translation;
	}

	$map = array(
		'Book an appointment'                        => 'Κλείστε ραντεβού',
		'Book appointment'                           => 'Κλείστε ραντεβού',
		'Select a date & time to continue'           => 'Επιλέξτε ημερομηνία και ώρα για να συνεχίσετε',
		'Booking...'                                 => 'Καταχώρηση…',
		'Booked'                                     => 'Κλείστηκε',
		'Available times'                            => 'Διαθέσιμες ώρες',
		'Not Available'                              => 'Μη διαθέσιμο',
		'Not Working'                                => 'Κλειστά',
		'Only tomorrow is available for booking'     => 'Μόνο για αύριο είναι διαθέσιμη κράτηση',
		'Please select another day'                  => 'Παρακαλώ επιλέξτε άλλη ημέρα',
		'Date & time'                                => 'Ημερομηνία & ώρα',
		'Price'                                      => 'Τιμή',
		'Submit'                                     => 'Υποβολή',
		'Cancel'                                     => 'Ακύρωση',
		'min'                                        => 'λεπτά',
		'week(s)'                                    => 'εβδομάδα(ες)',
		'Never'                                      => 'Ποτέ',
		'This field is required.'                    => 'Το πεδίο είναι υποχρεωτικό.',
		'Please enter a valid email address'         => 'Παρακαλώ εισάγετε έγκυρη διεύθυνση email',
		'Please enter at least 3 characters.'        => 'Παρακαλώ εισάγετε τουλάχιστον 3 χαρακτήρες.',
		'Please enter at least 3 digits.'            => 'Παρακαλώ εισάγετε τουλάχιστον 3 ψηφία.',
		'You can\'t select this time slot!'          => 'Δεν μπορείτε να επιλέξετε αυτήν την ώρα!',
		'Form validation code expired. Please refresh page in order to continue.' => 'Ο κωδικός επικύρωσης έληξε. Παρακαλώ ανανεώστε τη σελίδα.',
		'Internal error. Please try again later.'    => 'Εσωτερικό σφάλμα. Παρακαλώ δοκιμάστε ξανά αργότερα.',
		'Unable to make ajax request. Please try again later.' => 'Αδυναμία αποστολής αιτήματος. Παρακαλώ δοκιμάστε ξανά αργότερα.',
	);

	return isset( $map[ $text ] ) ? $map[ $text ] : $translation;
}
add_filter( 'gettext', 'physio_ea_greek_strings', 10, 3 );

/* -------------------------------------------------------------------------
 * SEO layer (no SEO plugin installed)
 * ---------------------------------------------------------------------- */

define( 'PHYSIO_LOGO_URL', '/wp-content/uploads/2022/02/final-logo.png' );
define( 'PHYSIO_PHONE', '+302681073248' );
define( 'PHYSIO_PHONE_MOBILE', '+306972876704' );
define( 'PHYSIO_EMAIL', 'info@physioelpida.gr' );
define( 'PHYSIO_ADDRESS_STREET', 'Βασιλέως Πύρρου 15' );
define( 'PHYSIO_ADDRESS_CITY', 'Άρτα' );
define( 'PHYSIO_ADDRESS_ZIP', '47100' );

/** True when the current request is for the English (/en/) version. */
function physio_seo_is_en() {
	$path = isset( $_SERVER['REQUEST_URI'] ) ? trim( wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' ) : '';
	return 'en' === $path || 0 === strpos( $path, 'en/' );
}

/** Curated meta descriptions keyed by post slug (targets observed GSC queries). */
function physio_seo_description_map() {
	return array(
		'home'                                           => 'Φυσικοθεραπεία Άρτα – «Ελπίδα» Επιστημονικό Κέντρο Φυσικοθεραπείας. Αποκατάσταση τραυματισμών, ψηφιακός πελματογράφος, θεραπευτικό γυμναστήριο. Ραντεβού: 26810-73248.',
		'bio'                                            => 'Βιογραφικό του φυσικοθεραπευτή Τσώλα Π. Δημήτριου, επιστημονικού υπεύθυνου του κέντρου φυσικοθεραπείας «Ελπίδα» στην Άρτα.',
		'about'                                          => 'Γνωρίστε το επιστημονικό κέντρο φυσικοθεραπείας «Ελπίδα» στην Άρτα – ο χώρος, η ομάδα και η φιλοσοφία της περίθαλψης που προσφέρουμε.',
		'gym'                                            => 'Θεραπευτικό γυμναστήριο στο κέντρο φυσικοθεραπείας «Ελπίδα» στην Άρτα – θεραπευτική άσκηση, κινησιοθεραπεία και ενδυνάμωση με καθοδήγηση.',
		'serv1'                                          => 'Υπηρεσίες φυσικοθεραπείας στην Άρτα – αποκατάσταση μυοσκελετικών παθήσεων, αθλητικών κακώσεων και μετεγχειρητική αποκατάσταση.',
		'rantevou'                                       => 'Κλείστε ραντεβού φυσικοθεραπείας στο κέντρο «Ελπίδα» στην Άρτα. Τηλέφωνο: 26810-73248, 6972876704.',
		'contact'                                        => 'Επικοινωνία με το κέντρο φυσικοθεραπείας «Ελπίδα» – Βασιλέως Πύρρου 15, Άρτα 47100. Τηλ: 26810-73248, 6972876704.',
		'blog'                                           => 'Άρθρα και συμβουλές φυσικοθεραπείας από το κέντρο «Ελπίδα» στην Άρτα.',
		'amfit-digital-morphology-pedometer'             => 'Ψηφιακό πελματογράφημα με το σύστημα Amfit στο κέντρο «Ελπίδα» στην Άρτα – ανάλυση πίεσης και μορφολογίας πέλματος, σχεδιασμός εξατομικευμένων πάτων.',
		'laba-yperythron'                                => 'Λάμπα υπερύθρων για φυσικοθεραπεία στην Άρτα – υπέρυθρη ακτινοβολία για ανακούφιση πόνου, μυϊκή χαλάρωση και επιτάχυνση αποκατάστασης.',
		'parafynoloutro'                                 => 'Παραφινόλουτρο στο κέντρο «Ελπίδα» στην Άρτα – θερμοθεραπεία με παραφίνη για αρθρίτιδα, δυσκαμψία και πόνο στα άκρα.',
		'dinoloutro'                                     => 'Δινόλουτρο (υδρομασάζ) στο κέντρο «Ελπίδα» στην Άρτα – θεραπεία με κυκλοφορία νερού για μυϊκή χαλάρωση και ανακούφιση του πόνου.',
		'diathermia-mikrokymaton'                        => 'Διαθερμία μικροκυμάτων στην Άρτα – βαθιά θερμοθεραπεία για μυοσκελετικές παθήσεις στο κέντρο φυσικοθεραπείας «Ελπίδα».',
		'psifiaki-elxi'                                  => 'Αποσυμπίεση σπονδυλικής στήλης στην Άρτα – θεραπεία εκτάσεων για κήλη δίσκου, ισχιαλγία και οσφυαλγία στο κέντρο «Ελπίδα».',
		'laser-ypsisychno'                               => 'Laser υψίσυχνο (laser υψηλής έντασης) στο κέντρο «Ελπίδα» στην Άρτα – θεραπεία για πόνο, φλεγμονή και τραυματισμούς.',
		'tecar-therapeia'                                => 'TECAR θεραπεία στην Άρτα – στοχευμένες ραδιοσυχνότητες για ταχύτερη αποκατάσταση μυοσκελετικών τραυματισμών στο κέντρο «Ελπίδα».',
		'tumble-forms-therapeies-se-paidia-me-eidikes-anagkes' => 'Tumble Forms – θεραπείες σε παιδιά με ειδικές ανάγκες στο κέντρο «Ελπίδα» στην Άρτα με προσαρμοστικό θεραπευτικό εξοπλισμό.',
		'eswt-btl'                                       => 'ESWT θεραπεία κρουστικών κυμάτων BTL στο κέντρο «Ελπίδα» στην Άρτα – μη επεμβατική αντιμετώπιση τενοντοπαθειών και χρόνιου πόνου.',
		's-i-s-yperepagogikos-magnitikos-diegertis'        => 'S.I.S. υπερεπαγωγικός μαγνητικός διεγέρτης στο κέντρο «Ελπίδα» στην Άρτα – μαγνητική διέγερση για νευρομυϊκή αποκατάσταση.',
		'kykloforitis-akron'                             => 'Κυκλοφορητής άκρων (πιεσοθεραπεία) στο κέντρο «Ελπίδα» στην Άρτα – αντιμετώπιση οιδήματος και ενίσχυση της κυκλοφορίας.',
		'cpm-gonatos-ischiou-agkona-omou'                => 'CPM συσκευές συνεχούς παθητικής κίνησης γόνατος, ισχίου, αγκώνα και ώμου – μετεγχειρητική αποκατάσταση στο κέντρο «Ελπίδα» στην Άρτα.',
	);
}

/** English descriptions for /en/ URLs, keyed the same way. */
function physio_seo_description_map_en() {
	return array(
		'home'    => 'Elpida physiotherapy center in Arta, Greece – rehabilitation of injuries, digital foot pressure analysis (pedograph) and therapeutic gym. Book: +30 26810 73248.',
		'bio'     => 'Biography of physiotherapist Dimitrios P. Tsolas, scientific director of the Elpida physiotherapy center in Arta, Greece.',
		'about'   => 'About the Elpida physiotherapy center in Arta, Greece – our facilities, our team and our approach to patient care.',
		'gym'     => 'Therapeutic gym at the Elpida physiotherapy center in Arta, Greece – supervised therapeutic exercise and strengthening.',
		'serv1'   => 'Physiotherapy services in Arta, Greece – rehabilitation of musculoskeletal disorders, sports injuries and postoperative care.',
		'rantevou' => 'Book a physiotherapy appointment at the Elpida center in Arta, Greece. Phone: +30 26810 73248.',
		'contact' => 'Contact the Elpida physiotherapy center – 15 Vasileos Pyrrou, Arta 47100, Greece. Phone: +30 26810 73248.',
	);
}

/** Resolve the meta description for the current page. */
function physio_seo_get_description() {
	$en   = physio_seo_is_en();
	$map  = $en ? physio_seo_description_map_en() : physio_seo_description_map();
	$slug = '';

	if ( is_front_page() ) {
		$slug = 'home';
	} elseif ( is_singular() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
	}

	if ( $slug && isset( $map[ $slug ] ) ) {
		return $map[ $slug ];
	}

	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post instanceof WP_Post ) {
			$text = $post->post_excerpt ? $post->post_excerpt : wp_strip_all_tags( strip_shortcodes( $post->post_content ) );
			$text = trim( preg_replace( '/\s+/', ' ', $text ) );
			if ( '' !== $text ) {
				return wp_trim_words( $text, 28, '' );
			}
		}
		$title = get_the_title( $post );
		return $en
			? sprintf( '%s at the Elpida physiotherapy center in Arta, Greece.', $title )
			: sprintf( '%s στο επιστημονικό κέντρο φυσικοθεραπείας «Ελπίδα» στην Άρτα.', $title );
	}

	return $en
		? 'Elpida physiotherapy center in Arta, Greece – rehabilitation, therapeutic exercise and modern equipment.'
		: '«Ελπίδα» Επιστημονικό Κέντρο Φυσικοθεραπείας στην Άρτα – αποκατάσταση, θεραπευτική άσκηση και σύγχρονος εξοπλισμός.';
}

/** Slugs of utility/demo pages that must not appear in search results. */
function physio_seo_noindex_page_slugs() {
	return array( 'cart', 'checkout', 'home-7' );
}

/** CPTs that hold widget/demo content (lorem ipsum), not real pages. */
function physio_seo_noindex_post_types() {
	return array( 'bdevs-portfolio', 'bdevs-pricetables', 'bdevs-routine' );
}

/** Meta description, Open Graph, Twitter Card and JSON-LD output. */
function physio_seo_head() {
	$desc   = physio_seo_get_description();
	$title  = wp_get_document_title();
	$url    = is_front_page() ? home_url( '/' ) : ( is_singular() ? get_permalink() : home_url( add_query_arg( null, null ) ) );
	$en     = physio_seo_is_en();
	$image  = home_url( PHYSIO_LOGO_URL );

	if ( is_singular() && has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' );
		if ( $thumb ) {
			$image = $thumb;
		}
	}

	echo '<meta name="description" content="' . esc_attr( $desc ) . '" />' . "\n";
	echo '<meta property="og:locale" content="' . esc_attr( $en ? 'en_US' : 'el_GR' ) . '" />' . "\n";
	echo '<meta property="og:type" content="' . esc_attr( is_singular( 'post' ) ? 'article' : 'website' ) . '" />' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '" />' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '" />' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '" />' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $image ) . '" />' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '" />' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '" />' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $image ) . '" />' . "\n";

	$graph = array(
		array(
			'@context'      => 'https://schema.org',
			'@type'         => 'PhysicalTherapy',
			'@id'           => home_url( '/#business' ),
			'name'          => '«Ελπίδα» Επιστημονικό Κέντρο Φυσικοθεραπείας',
			'alternateName' => 'Elpida Physiotherapy Center',
			'description'   => physio_seo_description_map()['home'],
			'url'           => home_url( '/' ),
			'logo'          => home_url( PHYSIO_LOGO_URL ),
			'image'         => home_url( PHYSIO_LOGO_URL ),
			'telephone'     => PHYSIO_PHONE,
			'email'         => PHYSIO_EMAIL,
			'priceRange'    => '€',
			'currenciesAccepted' => 'EUR',
			'address'       => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => PHYSIO_ADDRESS_STREET,
				'addressLocality' => PHYSIO_ADDRESS_CITY,
				'postalCode'      => PHYSIO_ADDRESS_ZIP,
				'addressCountry'  => 'GR',
			),
			'openingHoursSpecification' => array(
				array(
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
					'opens'     => '09:00',
					'closes'    => '15:00',
				),
				array(
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
					'opens'     => '17:00',
					'closes'    => '21:00',
				),
				array(
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => 'Saturday',
					'opens'     => '09:00',
					'closes'    => '15:00',
				),
			),
			'hasMap'  => 'https://maps.google.com/maps?q=' . rawurlencode( PHYSIO_ADDRESS_STREET . ', ' . PHYSIO_ADDRESS_CITY . ', ' . PHYSIO_ADDRESS_ZIP ),
			'sameAs'  => array(
				'https://www.facebook.com/Επιστημονικό-Κέντρο-Φυσικοθεραπείας-Ελπίδα-110048058174064',
				'https://www.instagram.com/physioelpida/',
			),
		),
		array(
			'@context' => 'https://schema.org',
			'@type'    => 'WebSite',
			'@id'      => home_url( '/#website' ),
			'url'      => home_url( '/' ),
			'name'     => get_bloginfo( 'name' ),
			'publisher' => array( '@id' => home_url( '/#business' ) ),
			'inLanguage' => array( 'el', 'en' ),
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'physio_seo_head', 5 );

/** Shorter, keyword-led <title> for the front page and content singles. */
function physio_seo_title_parts( $parts ) {
	$en = physio_seo_is_en();

	if ( is_front_page() ) {
		$parts['title']   = $en
			? 'Physiotherapy in Arta | Elpida Physiotherapy Center'
			: 'Φυσικοθεραπεία Άρτα | «Ελπίδα» Κέντρο Φυσικοθεραπείας';
		$parts['tagline'] = $en ? 'Dimitrios P. Tsolas' : 'Τσώλας Π. Δημήτριος';
		$parts['site']    = '';
	} elseif ( is_singular( array( 'bdevs-member', 'bdevs-service' ) ) ) {
		$parts['site']    = $en ? 'Elpida Physiotherapy Arta' : 'Ελπίδα Φυσικοθεραπεία Άρτα';
		$parts['tagline'] = '';
	}

	return $parts;
}
add_filter( 'document_title_parts', 'physio_seo_title_parts' );

/** noindex utility/demo pages and content-free CPTs. */
function physio_seo_robots( $robots ) {
	$noindex = is_search()
		|| is_page( physio_seo_noindex_page_slugs() )
		|| is_singular( physio_seo_noindex_post_types() );

	if ( $noindex ) {
		$robots['noindex']  = true;
		$robots['follow']   = true;
		unset( $robots['index'] );
	}

	return $robots;
}
add_filter( 'wp_robots', 'physio_seo_robots' );

/** Drop junk CPTs from the XML sitemap. */
function physio_seo_sitemap_post_types( $post_types ) {
	foreach ( physio_seo_noindex_post_types() as $type ) {
		unset( $post_types[ $type ] );
	}
	return $post_types;
}
add_filter( 'wp_sitemaps_post_types', 'physio_seo_sitemap_post_types' );

/** Drop thin taxonomy archives from the sitemap. */
function physio_seo_sitemap_taxonomies( $taxonomies ) {
	unset( $taxonomies['price_tables_categories'], $taxonomies['portfolio_categories'] );
	return $taxonomies;
}
add_filter( 'wp_sitemaps_taxonomies', 'physio_seo_sitemap_taxonomies' );

/** Drop the author (users) sitemap — exposes the admin username, no SEO value. */
function physio_seo_sitemap_provider( $provider, $name ) {
	return 'users' === $name ? false : $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'physio_seo_sitemap_provider', 10, 2 );

/** Exclude utility/demo pages from the pages sitemap. */
function physio_seo_sitemap_query_args( $args, $post_type ) {
	if ( 'page' !== $post_type ) {
		return $args;
	}
	$exclude = isset( $args['post__not_in'] ) ? (array) $args['post__not_in'] : array();
	foreach ( physio_seo_noindex_page_slugs() as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			$exclude[] = $page->ID;
		}
	}
	$args['post__not_in'] = $exclude;
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'physio_seo_sitemap_query_args', 10, 2 );

/** Extend robots.txt — keep noindexed pages crawlable so Google sees the meta. */
function physio_seo_robots_txt( $output, $public ) {
	if ( ! $public ) {
		return $output;
	}
	// Own User-agent group: the Sitemap line above may have ended the first group.
	$output .= "\nUser-agent: *\n";
	$output .= "Disallow: /author/\n";
	$output .= "Disallow: /*?s=\n";
	$output .= "Disallow: /*?add-to-cart=\n";
	return $output;
}
add_filter( 'robots_txt', 'physio_seo_robots_txt', 10, 2 );