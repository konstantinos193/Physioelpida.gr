<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * Child theme override: parent theme called undefined rtl_enable()
 * which caused a fatal error (HTTP 500) on every 404.
 *
 * @package medidove-child
 */

$physio_404_en = function_exists( 'physio_seo_is_en' ) && physio_seo_is_en();

$physio_404_defaults = $physio_404_en
	? array(
		'title'   => 'Page not found',
		'desc'    => 'The page you are looking for does not exist or has been moved. Head back to the homepage or use the links below.',
		'cta'     => 'Back to home',
		'cta2'    => 'Book an appointment',
		'nav'     => 'Useful links',
		'serv'    => 'Services',
		'about'   => 'About us',
		'contact' => 'Contact',
		'help'    => 'Need help? Call us:',
	)
	: array(
		'title'   => 'Η σελίδα δεν βρέθηκε',
		'desc'    => 'Η σελίδα που αναζητάτε δεν υπάρχει ή έχει μετακινηθεί. Επιστρέψτε στην αρχική ή δείτε τις βασικές ενότητες του ιστότοπου.',
		'cta'     => 'Αρχική σελίδα',
		'cta2'    => 'Κλείστε ραντεβού',
		'nav'     => 'Χρήσιμοι σύνδεσμοι',
		'serv'    => 'Υπηρεσίες',
		'about'   => 'Σχετικά με εμάς',
		'contact' => 'Επικοινωνία',
		'help'    => 'Χρειάζεστε βοήθεια; Καλέστε μας:',
	);

/** Return a theme mod, treating unset/stock-demo values as "use our default". */
function physio_404_mod( $mod, $stock, $default ) {
	$val = get_theme_mod( $mod, '' );
	if ( '' === $val ) {
		return $default;
	}
	$norm = mb_strtolower( trim( $val ) );
	foreach ( (array) $stock as $s ) {
		if ( $norm === $s ) {
			return $default;
		}
	}
	return $val;
}

$physio_404_title = physio_404_mod( 'medidove_error_title', array( 'page not found' ), $physio_404_defaults['title'] );
$physio_404_desc  = physio_404_mod( 'medidove_error_desc', array(
	'oops! the page you are looking for does not exist. it might have been moved or deleted.',
	'oops! η σελίδα που ψάχνετε δεν υπάρχει.',
), $physio_404_defaults['desc'] );
$physio_404_cta   = physio_404_mod( 'medidove_error_link_text', array( 'back to home' ), $physio_404_defaults['cta'] );
$physio_404_phone = defined( 'PHYSIO_PHONE' ) ? PHYSIO_PHONE : '+302681073248';
$physio_404_phone_label = $physio_404_en ? '+30 26810 73248' : '26810 73248';

get_header();
?>

<div class="p404">
	<div class="container">
		<div class="p404-inner">
			<p class="p404-code" aria-hidden="true"><span class="p404-digit">4</span><span class="p404-badge"><i>+</i></span><span class="p404-digit">4</span></p>
			<h1 class="p404-title"><?php print esc_html( $physio_404_title ); ?></h1>
			<p class="p404-lead"><?php print esc_html( $physio_404_desc ); ?></p>
			<div class="p404-actions">
				<a href="<?php print esc_url( home_url( '/' ) ); ?>" class="p404-btn p404-btn-primary"><span>+</span><?php print esc_html( $physio_404_cta ); ?></a>
				<a href="<?php print esc_url( home_url( '/rantevou/' ) ); ?>" class="p404-btn p404-btn-outline"><?php print esc_html( $physio_404_defaults['cta2'] ); ?></a>
			</div>
			<nav class="p404-links" aria-label="<?php print esc_attr( $physio_404_defaults['nav'] ); ?>">
				<a href="<?php print esc_url( home_url( '/serv1/' ) ); ?>"><?php print esc_html( $physio_404_defaults['serv'] ); ?></a>
				<a href="<?php print esc_url( home_url( '/about/' ) ); ?>"><?php print esc_html( $physio_404_defaults['about'] ); ?></a>
				<a href="<?php print esc_url( home_url( '/contact/' ) ); ?>"><?php print esc_html( $physio_404_defaults['contact'] ); ?></a>
			</nav>
			<p class="p404-phone"><?php print esc_html( $physio_404_defaults['help'] ); ?> <a href="tel:<?php print esc_attr( $physio_404_phone ); ?>"><?php print esc_html( $physio_404_phone_label ); ?></a></p>
		</div>
	</div>
</div>

<?php
get_footer();
