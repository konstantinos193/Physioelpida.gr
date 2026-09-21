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

	// Parent registers this child stylesheet as 'medidove-style' with the WP
	// version as cache key — it never changes when the file does. Re-version
	// by filemtime so edits actually reach browsers.
	wp_dequeue_style( 'medidove-style' );
	wp_deregister_style( 'medidove-style' );
	wp_enqueue_style( 'medidove-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'medidove_child_enqueue_scripts', 100 );

/**
 * Purge the W3TC page cache once after each deploy that touches style.css.
 * Deploys go over FTP with no hook on the server, so the first uncached
 * request after the upload does the flush (cached pages never reach init,
 * but any query-string or logged-in request does).
 */
function physio_flush_cache_on_deploy() {
	$ver = (string) filemtime( get_stylesheet_directory() . '/style.css' );
	if ( get_option( 'physio_style_ver' ) === $ver ) {
		return;
	}
	update_option( 'physio_style_ver', $ver, false );
	if ( function_exists( 'w3tc_flush_all' ) ) {
		w3tc_flush_all();
	}
}
add_action( 'init', 'physio_flush_cache_on_deploy' );

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
 * Parent theme — the comment form labels ship untranslated (no el.mo)
 * ---------------------------------------------------------------------- */
function physio_theme_greek_strings( $translation, $text, $domain ) {
	if ( 'medidove' !== $domain || physio_seo_is_en() ) {
		return $translation;
	}

	$map = array(
		'Your name *'  => 'Το όνομά σας *',
		'Your email *' => 'Το email σας *',
		'Comments *'   => 'Σχόλιο *',
		'Post Comment' => 'Αποστολή σχολίου',
		'Reply'        => 'Απάντηση',
		'Pages:'       => 'Σελίδες:',
	);

	return isset( $map[ $text ] ) ? $map[ $text ] : $translation;
}
add_filter( 'gettext', 'physio_theme_greek_strings', 10, 3 );

/* -------------------------------------------------------------------------
 * SEO layer (no SEO plugin installed)
 * ---------------------------------------------------------------------- */

define( 'PHYSIO_LOGO_URL', '/wp-content/uploads/2022/02/final-logo.png' );
define( 'PHYSIO_PHONE', '+302681073248' );
define( 'PHYSIO_PHONE_MOBILE', '+306972876704' );
define( 'PHYSIO_EMAIL', 'info@physioelpida.gr' );
define( 'PHYSIO_ADDRESS_STREET', 'Βασιλέως Πύρρου & Πλαστήρα 15' );
define( 'PHYSIO_ADDRESS_CITY', 'Άρτα' );
define( 'PHYSIO_ADDRESS_ZIP', '47100' );
define( 'PHYSIO_CLINICIAN_NAME', 'Τσώλας Π. Δημήτριος' );
define( 'PHYSIO_CLINICIAN_URL', '/fysiotherapeftis/tsolas-dimitrios/' );

/** True when the current request is for the English (/en/) version. */
function physio_seo_is_en() {
	$path = isset( $_SERVER['REQUEST_URI'] ) ? trim( wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' ) : '';
	return 'en' === $path || 0 === strpos( $path, 'en/' );
}

/** Curated meta descriptions keyed by post slug (targets observed GSC queries). */
function physio_seo_description_map() {
	return array(
		'home'                                           => 'Φυσικοθεραπεία στην Άρτα στο Επιστημονικό Κέντρο «Ελπίδα». Εξατομικευμένα προγράμματα αποκατάστασης, σύγχρονος εξοπλισμός και δυνατότητα online ραντεβού. Βασ. Πύρρου & Πλαστήρα 15.',
		'apokatastasi'                                   => 'Υπηρεσίες φυσικοθεραπείας και αποκατάστασης στην Άρτα – μυοσκελετική, αθλητική, μετεγχειρητική, νευρολογική και παιδιατρική αποκατάσταση στο κέντρο «Ελπίδα».',
		'myoskeletiki-apokatastasi'                      => 'Εξατομικευμένη μυοσκελετική αποκατάσταση στην Άρτα για πόνο, τραυματισμούς και περιορισμό κίνησης, μετά από κλινική φυσικοθεραπευτική αξιολόγηση.',
		'athlitiki-apokatastasi'                         => 'Αθλητική φυσικοθεραπεία στην Άρτα με αξιολόγηση, προοδευτική αποκατάσταση, ενδυνάμωση και ασφαλή επιστροφή στη δραστηριότητα.',
		'metegxeiritiki-apokatastasi'                    => 'Μετεγχειρητική αποκατάσταση στην Άρτα – δομημένα πρωτόκολλα μετά από αρθροπλαστικές, συνδεσμοπλαστικές και επεμβάσεις, σε συνεργασία με τον χειρουργό.',
		'nevrologiki-apokatastasi'                       => 'Νευρολογική αποκατάσταση στην Άρτα – προγράμματα για ΑΕΕ, νωτιαίο, Parkinson και νευροπαθή πόνο στο κέντρο «Ελπίδα».',
		'paidiatriki-fysikotherapeia'                    => 'Παιδιατρική φυσικοθεραπεία στην Άρτα – αναπτυξιακή και νευροκινητική αποκατάσταση για παιδιά, με εξοπλισμό Tumble Forms στο κέντρο «Ελπίδα».',
		'anapneystiki-fysikotherapeia'                   => 'Αναπνευστική φυσικοθεραπεία στην Άρτα – αναπνευστική γυμναστική και τεχνικές παροχέτευσης στο κέντρο «Ελπίδα».',
		'fysikotherapeia-kat-oikon'                      => 'Φυσικοθεραπεία κατ\' οίκον στην Άρτα – επισκέψεις στο σπίτι για ασθενείς με δυσκολία μετακίνησης. Τηλ: 26810-73248.',
		'kliniki-axiologisi'                             => 'Κλινική φυσικοθεραπευτική αξιολόγηση στην Άρτα – ιστορικό, κλινικές δοκιμασίες και εξατομικευμένο θεραπευτικό πλάνο.',
		'ekfylitikes-patheiseis'                         => 'Φυσικοθεραπεία για εκφυλιστικές παθήσεις στην Άρτα – διατήρηση λειτουργικότητας και ποιότητας ζωής στο κέντρο «Ελπίδα».',
		'aisthitiki-fysikotherapeia'                     => 'Αισθητική φυσικοθεραπεία στην Άρτα – λεμφική μάλαξη, πιεσοθεραπεία και τεκμηριωμένες τεχνικές στο κέντρο «Ελπίδα».',
		'therapeies'                                     => 'Θεραπείες και τεχνολογία φυσικοθεραπείας στο κέντρο «Ελπίδα» στην Άρτα – TECAR, κρουστικά κύματα, laser, αποσυμπίεση, θεραπευτική άσκηση.',
		'tecar'                                          => 'Μάθετε πώς χρησιμοποιείται η TECAR στο πλαίσιο ενός εξατομικευμένου προγράμματος φυσικοθεραπείας στο Κέντρο Ελπίδα στην Άρτα.',
		'kroustika-kymata'                               => 'Κρουστικά κύματα (shockwave / ESWT) στην Άρτα – μη επεμβατική θεραπεία για τενοντοπάθειες και χρόνιο πόνο στο κέντρο «Ελπίδα».',
		'sis-magnitikos-diegertis'                       => 'S.I.S. υπερεπαγωγικός μαγνητικός διεγέρτης στο κέντρο «Ελπίδα» στην Άρτα – μαγνητική διέγερση για νευρομυϊκή αποκατάσταση.',
		'laser-ypsilis-isxyos'                           => 'Laser υψηλής έντασης (υψίσυχνο) στο κέντρο «Ελπίδα» στην Άρτα – θεραπεία για πόνο, φλεγμονή και τραυματισμούς.',
		'cpm'                                            => 'CPM συσκευές συνεχούς παθητικής κίνησης γόνατος, ισχίου, αγκώνα και ώμου – μετεγχειρητική αποκατάσταση στο κέντρο «Ελπίδα» στην Άρτα.',
		'aposympiesi-spondylikis-stilis'                 => 'Αποσυμπίεση σπονδυλικής στήλης στην Άρτα – θεραπεία εκτάσεων για κήλη δίσκου, ισχιαλγία και οσφυαλγία στο κέντρο «Ελπίδα».',
		'pelmatografima'                                 => 'Ψηφιακό πελματογράφημα με το σύστημα Amfit στο κέντρο «Ελπίδα» στην Άρτα – ανάλυση πίεσης και μορφολογίας πέλματος, σχεδιασμός εξατομικευμένων πάτων.',
		'therapeftiki-askisi'                            => 'Θεραπευτική άσκηση και γυμναστήριο αποκατάστασης στο κέντρο «Ελπίδα» στην Άρτα – ενδυνάμωση, ισορροπία, επιστροφή στη λειτουργία και στον αθλητισμό.',
		'lemfiki-malaxi'                                 => 'Λεμφική μάλαξη (λεμφική παροχέτευση) στην Άρτα – αντιμετώπιση λέμφοιδημα και οιδήματος στο κέντρο «Ελπίδα».',
		'xeiromalaxi'                                    => 'Χειρομάλαξη μαλακών μορίων στο κέντρο «Ελπίδα» στην Άρτα – ανακούφιση μυϊκής έντασης και χρόνιου πόνου.',
		'xeironaktiki-therapeia'                         => 'Χειρονακτικές τεχνικές (manual therapy) στην Άρτα – κινητοποίηση αρθρώσεων και αντιμετώπιση μυοσκελετικού πόνου στο κέντρο «Ελπίδα».',
		'piesotherapeia'                                 => 'Πιεσοθεραπεία (κυκλοφορητής άκρων) στο κέντρο «Ελπίδα» στην Άρτα – αντιμετώπιση οιδήματος και ενίσχυση της κυκλοφορίας.',
		'parafynoloutro'                                 => 'Παραφινόλουτρο στο κέντρο «Ελπίδα» στην Άρτα – θερμοθεραπεία με παραφίνη για αρθρίτιδα, δυσκαμψία και πόνο στα άκρα.',
		'dinoloutro'                                     => 'Δινόλουτρο (υδρομασάζ) στο κέντρο «Ελπίδα» στην Άρτα – θεραπεία με κυκλοφορία νερού για μυϊκή χαλάρωση και ανακούφιση του πόνου.',
		'diathermia-mikrokymaton'                        => 'Διαθερμία μικροκυμάτων στην Άρτα – βαθιά θερμοθεραπεία για μυοσκελετικές παθήσεις στο κέντρο φυσικοθεραπείας «Ελπίδα».',
		'laba-yperythron'                                => 'Λάμπα υπερύθρων για φυσικοθεραπεία στην Άρτα – υπέρυθρη ακτινοβολία για ανακούφιση πόνου, μυϊκή χαλάρωση και επιτάχυνση αποκατάστασης.',
		'tumble-forms'                                   => 'Tumble Forms – θεραπευτικός προσαρμοστικός εξοπλισμός για παιδιά με ειδικές ανάγκες στο κέντρο «Ελπίδα» στην Άρτα.',
		'pathiseis'                                      => 'Παθήσεις και συμπτώματα που αντιμετωπίζει η φυσικοθεραπεία – οδηγοί αξιολόγησης και αποκατάστασης από το κέντρο «Ελπίδα» στην Άρτα.',
		'osfyaligia'                                     => 'Οσφυαλγία και φυσικοθεραπεία στην Άρτα – αξιολόγηση, στόχοι αποκατάστασης και τι μπορεί να περιλαμβάνει η θεραπεία στο κέντρο «Ελπίδα».',
		'ayxeniko'                                       => 'Αυχενικό σύνδρομο και πόνος αυχένα – φυσικοθεραπευτική αξιολόγηση και αποκατάσταση στο κέντρο «Ελπίδα» στην Άρτα.',
		'isxialgia'                                      => 'Ισχιαλγία – αίτια, φυσικοθεραπευτική αξιολόγηση και αποκατάσταση στο κέντρο «Ελπίδα» στην Άρτα.',
		'ponos-gonatou'                                  => 'Πόνος στο γόνατο – φυσικοθεραπευτική αξιολόγηση και αποκατάσταση στο κέντρο «Ελπίδα» στην Άρτα.',
		'tenontopatheia-omou'                            => 'Τενοντοπάθεια ώμου (συστροφικής μανσέτας) – φυσικοθεραπεία και αποκατάσταση στο κέντρο «Ελπίδα» στην Άρτα.',
		'diastremma-podoknimikis'                        => 'Διάστρεμμα ποδοκνημικής – στάδια αποκατάστασης και ασφαλής επιστροφή στη δραστηριότητα στο κέντρο «Ελπίδα» στην Άρτα.',
		'arthroplastiki-gonatou-apokatastasi'            => 'Αποκατάσταση μετά από αρθροπλαστική γόνατος στην Άρτα – δομημένο πρόγραμμα, CPM και θεραπευτική άσκηση στο κέντρο «Ελπίδα».',
		'pelmatiaia-aponeurositidi'                      => 'Πελματιαία απονευρωσίτιδα – φυσικοθεραπεία, πελματογράφημα και κρουστικά κύματα στο κέντρο «Ελπίδα» στην Άρτα.',
		'fysiotherapeftis'                               => 'Ο φυσικοθεραπευτής του κέντρου «Ελπίδα» στην Άρτα – προσόντα, κλινική εμπειρία και θεραπευτική προσέγγιση.',
		'tsolas-dimitrios'                               => 'Τσώλας Π. Δημήτριος – φυσικοθεραπευτής στην Άρτα, επιστημονικός υπεύθυνος του κέντρου «Ελπίδα» από το 2005. Βιογραφικό και κλινική εμπειρία.',
		'omada'                                          => 'Η ομάδα του επιστημονικού κέντρου φυσικοθεραπείας «Ελπίδα» στην Άρτα – φυσικοθεραπευτές και βοηθητικό προσωπικό.',
		'syxnes-erotiseis'                               => 'Συχνές ερωτήσεις για τη φυσικοθεραπεία στο κέντρο «Ελπίδα» στην Άρτα – ραντεβού, συνεδρίες, τι να προσέχετε.',
		'bio'                                            => 'Βιογραφικό του φυσικοθεραπευτή Τσώλα Π. Δημήτριου, επιστημονικού υπεύθυνου του κέντρου φυσικοθεραπείας «Ελπίδα» στην Άρτα.',
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
		'home'                     => 'Physiotherapy in Arta at the Elpida Scientific Physiotherapy Center – individualized rehabilitation programs, modern equipment and online booking. 15 Vasileos Pyrrou & Plastira.',
		'apokatastasi'             => 'Physiotherapy and rehabilitation services in Arta, Greece – musculoskeletal, sports, postoperative, neurological and paediatric rehabilitation at the Elpida center.',
		'myoskeletiki-apokatastasi'=> 'Musculoskeletal rehabilitation in Arta for pain, injuries and restricted movement, following a clinical physiotherapy assessment.',
		'athlitiki-apokatastasi'   => 'Sports physiotherapy in Arta with assessment, progressive rehabilitation, strengthening and safe return to activity.',
		'metegxeiritiki-apokatastasi' => 'Postoperative rehabilitation in Arta – structured protocols after joint replacement and orthopaedic surgery, in cooperation with your surgeon.',
		'nevrologiki-apokatastasi' => 'Neurological rehabilitation in Arta – programs for stroke, spinal cord injury, Parkinson\'s and neuropathic pain at the Elpida center.',
		'paidiatriki-fysikotherapeia' => 'Paediatric physiotherapy in Arta – developmental and neuromotor rehabilitation for children, with Tumble Forms equipment at the Elpida center.',
		'fysikotherapeia-kat-oikon' => 'Home physiotherapy visits in Arta – for patients unable to travel. Phone: +30 26810 73248.',
		'therapeies'               => 'Physiotherapy treatments and technology at the Elpida center in Arta – TECAR, shockwave, laser, spinal decompression, therapeutic exercise.',
		'tecar'                    => 'How TECAR therapy is used within an individualized physiotherapy program at the Elpida center in Arta, Greece.',
		'kroustika-kymata'         => 'Shockwave therapy (ESWT) in Arta – non-invasive treatment for tendinopathies and chronic pain at the Elpida center.',
		'cpm'                      => 'CPM continuous passive motion devices for knee, hip, elbow and shoulder – postoperative rehabilitation at the Elpida center in Arta.',
		'aposympiesi-spondylikis-stilis' => 'Spinal decompression therapy in Arta – traction treatment for disc herniation, sciatica and low back pain at the Elpida center.',
		'pelmatografima'           => 'Digital pedography with the Amfit system at the Elpida center in Arta – foot pressure analysis and custom orthotic design.',
		'therapeftiki-askisi'      => 'Therapeutic exercise and rehabilitation gym at the Elpida center in Arta – strengthening, balance, return to function and sport.',
		'pathiseis'                => 'Conditions and symptoms treated with physiotherapy – assessment and rehabilitation guides from the Elpida center in Arta.',
		'fysiotherapeftis'         => 'The physiotherapist of the Elpida center in Arta – qualifications, clinical experience and treatment approach.',
		'tsolas-dimitrios'         => 'Dimitrios P. Tsolas – physiotherapist in Arta, scientific director of the Elpida center since 2005. Biography and clinical experience.',
		'omada'                    => 'The team of the Elpida physiotherapy center in Arta – physiotherapists and support staff.',
		'syxnes-erotiseis'         => 'Frequently asked questions about physiotherapy at the Elpida center in Arta – appointments, sessions, what to expect.',
		'bio'                      => 'Biography of physiotherapist Dimitrios P. Tsolas, scientific director of the Elpida physiotherapy center in Arta, Greece.',
		'about'                    => 'About the Elpida physiotherapy center in Arta, Greece – our facilities, our team and our approach to patient care.',
		'gym'                      => 'Therapeutic gym at the Elpida physiotherapy center in Arta, Greece – supervised therapeutic exercise and strengthening.',
		'serv1'                    => 'Physiotherapy services in Arta, Greece – rehabilitation of musculoskeletal disorders, sports injuries and postoperative care.',
		'rantevou'                 => 'Book a physiotherapy appointment at the Elpida center in Arta, Greece. Phone: +30 26810 73248.',
		'contact'                  => 'Contact the Elpida physiotherapy center – 15 Vasileos Pyrrou & Plastira, Arta 47100, Greece. Phone: +30 26810 73248.',
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

/** Per-slug SEO titles (audit title map). EL keyed by slug; EN falls back to suffix pattern. */
function physio_seo_title_map() {
	return array(
		'apokatastasi'                => 'Υπηρεσίες Αποκατάστασης στην Άρτα | Ελπίδα',
		'myoskeletiki-apokatastasi'   => 'Μυοσκελετική Αποκατάσταση Άρτα | Ελπίδα',
		'athlitiki-apokatastasi'      => 'Αθλητική Φυσικοθεραπεία & Αποκατάσταση Άρτα | Ελπίδα',
		'metegxeiritiki-apokatastasi' => 'Μετεγχειρητική Αποκατάσταση Άρτα | Ελπίδα',
		'nevrologiki-apokatastasi'    => 'Νευρολογική Αποκατάσταση Άρτα | Ελπίδα',
		'paidiatriki-fysikotherapeia' => 'Παιδιατρική Φυσικοθεραπεία Άρτα | Ελπίδα',
		'anapneystiki-fysikotherapeia'=> 'Αναπνευστική Φυσικοθεραπεία Άρτα | Ελπίδα',
		'fysikotherapeia-kat-oikon'   => 'Φυσικοθεραπεία κατ\' Οίκον Άρτα | Ελπίδα',
		'kliniki-axiologisi'          => 'Κλινική Φυσικοθεραπευτική Αξιολόγηση Άρτα | Ελπίδα',
		'ekfylitikes-patheiseis'      => 'Εκφυλιστικές Παθήσεις – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'aisthitiki-fysikotherapeia'  => 'Αισθητική Φυσικοθεραπεία Άρτα | Ελπίδα',
		'therapeies'                  => 'Θεραπείες & Τεχνολογία Φυσικοθεραπείας Άρτα | Ελπίδα',
		'tecar'                       => 'TECAR Άρτα | Θεραπεία TECAR — Ελπίδα',
		'kroustika-kymata'            => 'Κρουστικά Κύματα Άρτα | Shockwave / ESWT',
		'sis-magnitikos-diegertis'    => 'Μαγνητικός Διεγέρτης S.I.S. Άρτα | Ελπίδα',
		'laser-ypsilis-isxyos'        => 'Laser Υψηλής Ισχύος Άρτα | Ελπίδα',
		'cpm'                         => 'CPM Αποκατάσταση Γόνατος–Ισχίου–Ώμου Άρτα | Ελπίδα',
		'aposympiesi-spondylikis-stilis' => 'Αποσυμπίεση Σπονδυλικής Στήλης | Ελπίδα Άρτα',
		'pelmatografima'              => 'Ψηφιακό Πελματογράφημα Άρτα | Ελπίδα',
		'therapeftiki-askisi'         => 'Θεραπευτική Άσκηση & Αποκατάσταση | Ελπίδα Άρτα',
		'lemfiki-malaxi'              => 'Λεμφική Μάλαξη Άρτα | Ελπίδα',
		'xeiromalaxi'                 => 'Χειρομάλαξη Άρτα | Ελπίδα',
		'xeironaktiki-therapeia'      => 'Χειρονακτική Θεραπεία (Manual Therapy) Άρτα | Ελπίδα',
		'piesotherapeia'              => 'Πιεσοθεραπεία Άρτα | Ελπίδα',
		'parafynoloutro'              => 'Παραφινόλουτρο Άρτα | Ελπίδα',
		'dinoloutro'                  => 'Δινόλουτρο Άρτα | Ελπίδα',
		'diathermia-mikrokymaton'     => 'Διαθερμία Μικροκυμάτων Άρτα | Ελπίδα',
		'laba-yperythron'             => 'Λάμπα Υπερύθρων – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'tumble-forms'                => 'Tumble Forms – Παιδιατρική Θεραπεία Άρτα | Ελπίδα',
		'pathiseis'                   => 'Παθήσεις & Συμπτώματα | Φυσικοθεραπεία Ελπίδα Άρτα',
		'osfyaligia'                  => 'Οσφυαλγία – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'ayxeniko'                    => 'Αυχενικό Σύνδρομο – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'isxialgia'                   => 'Ισχιαλγία – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'ponos-gonatou'               => 'Πόνος Γόνατος – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'tenontopatheia-omou'         => 'Τενοντοπάθεια Ώμου – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'diastremma-podoknimikis'     => 'Διάστρεμμα Ποδοκνημικής – Αποκατάσταση Άρτα | Ελπίδα',
		'arthroplastiki-gonatou-apokatastasi' => 'Αποκατάσταση μετά από Αρθροπλαστική Γόνατος | Άρτα',
		'pelmatiaia-aponeurositidi'   => 'Πελματιαία Απονευρωσίτιδα – Φυσικοθεραπεία Άρτα | Ελπίδα',
		'fysiotherapeftis'            => 'Ο Φυσικοθεραπευτής | Ελπίδα Άρτα',
		'tsolas-dimitrios'            => 'Τσώλας Δημήτριος — Φυσικοθεραπευτής στην Άρτα | Ελπίδα',
		'omada'                       => 'Η Ομάδα μας | Φυσικοθεραπεία Ελπίδα Άρτα',
		'syxnes-erotiseis'            => 'Συχνές Ερωτήσεις | Φυσικοθεραπεία Ελπίδα Άρτα',
		'about'                       => 'Σχετικά με Εμάς | Φυσικοθεραπεία Ελπίδα Άρτα',
		'contact'                     => 'Επικοινωνία | Φυσικοθεραπεία Άρτα — Ελπίδα',
		'rantevou'                    => 'Κλείστε Ραντεβού | Φυσικοθεραπεία Ελπίδα Άρτα',
		'blog'                        => 'Άρθρα Φυσικοθεραπείας | Ελπίδα Άρτα',
	);
}

/** Shorter, keyword-led <title> for the front page and content singles. */
function physio_seo_title_parts( $parts ) {
	$en = physio_seo_is_en();

	if ( is_front_page() ) {
		$parts['title']   = $en
			? 'Physiotherapy in Arta | Elpida Physiotherapy Center'
			: 'Φυσικοθεραπεία Άρτα | Επιστημονικό Κέντρο Ελπίδα';
		$parts['tagline'] = '';
		$parts['site']    = '';
	} elseif ( is_singular() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		$map  = physio_seo_title_map();
		if ( ! $en && isset( $map[ $slug ] ) ) {
			$parts['title']   = $map[ $slug ];
			$parts['site']    = '';
			$parts['tagline'] = '';
		} elseif ( is_singular( array( 'bdevs-member', 'bdevs-service' ) ) ) {
			$parts['site']    = $en ? 'Elpida Physiotherapy Arta' : 'Ελπίδα Φυσικοθεραπεία Άρτα';
			$parts['tagline'] = '';
		}
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

/**
 * Drop taxonomy archives from the sitemap. service_categories is noindexed
 * (is_tax) so listing it contradicts the robots meta; the single blog
 * category (/category/arthra/) duplicates /blog/.
 */
function physio_seo_sitemap_taxonomies( $taxonomies ) {
	unset(
		$taxonomies['price_tables_categories'],
		$taxonomies['portfolio_categories'],
		$taxonomies['service_categories'],
		$taxonomies['category']
	);
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

/** 2026 SEO restructure — URL map, redirects, schema, trust blocks, footer. */
require get_stylesheet_directory() . '/seo-2026.php';
require get_stylesheet_directory() . '/layout-2026.php';
