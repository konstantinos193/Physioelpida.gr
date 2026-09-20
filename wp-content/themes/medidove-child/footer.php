<?php
/**
 * Footer — rebuilt 2026.
 *
 * Replaces the parent's medidove_footer_style hook chain (empty widget areas
 * + a bare copyright bar) with a single coherent footer: local-entity columns
 * on the theme's dark background, then the copyright strip.
 *
 * @package medidove-child
 */
?>
	<footer class="physio-footer">
		<div class="physio-footer-main">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="physio-footer-brand">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="physio-footer-logo">
								<img src="<?php echo esc_url( PHYSIO_LOGO_URL ); ?>" alt="Ελπίδα Physiotherapy" loading="lazy">
							</a>
							<p>Επιστημονικό Κέντρο Φυσικοθεραπείας στην Άρτα — λειτουργία από το 2005.</p>
							<p class="physio-footer-clinician">Επιστημονικός Υπεύθυνος: <a href="<?php echo esc_url( home_url( PHYSIO_CLINICIAN_URL ) ); ?>"><?php echo esc_html( PHYSIO_CLINICIAN_NAME ); ?></a></p>
							<div class="physio-footer-social">
								<?php medidove_footer_social_profiles(); ?>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="physio-footer-col">
							<h4>Αποκατάσταση</h4>
							<ul>
								<li><a href="<?php echo esc_url( home_url( '/apokatastasi/myoskeletiki-apokatastasi/' ) ); ?>">Μυοσκελετική αποκατάσταση</a></li>
								<li><a href="<?php echo esc_url( home_url( '/apokatastasi/athlitiki-apokatastasi/' ) ); ?>">Αθλητική αποκατάσταση</a></li>
								<li><a href="<?php echo esc_url( home_url( '/apokatastasi/metegxeiritiki-apokatastasi/' ) ); ?>">Μετεγχειρητική αποκατάσταση</a></li>
								<li><a href="<?php echo esc_url( home_url( '/apokatastasi/nevrologiki-apokatastasi/' ) ); ?>">Νευρολογική αποκατάσταση</a></li>
								<li><a href="<?php echo esc_url( home_url( '/apokatastasi/' ) ); ?>">Όλες οι υπηρεσίες</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="physio-footer-col">
							<h4>Θεραπείες</h4>
							<ul>
								<li><a href="<?php echo esc_url( home_url( '/therapeies/tecar/' ) ); ?>">TECAR</a></li>
								<li><a href="<?php echo esc_url( home_url( '/therapeies/kroustika-kymata/' ) ); ?>">Κρουστικά κύματα</a></li>
								<li><a href="<?php echo esc_url( home_url( '/therapeies/sis-magnitikos-diegertis/' ) ); ?>">S.I.S.</a></li>
								<li><a href="<?php echo esc_url( home_url( '/therapeies/cpm/' ) ); ?>">CPM</a></li>
								<li><a href="<?php echo esc_url( home_url( '/therapeies/' ) ); ?>">Όλες οι θεραπείες</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="physio-footer-col">
							<h4>Επικοινωνία</h4>
							<ul class="physio-footer-contact">
								<li><i class="fas fa-map-marker-alt"></i><?php echo esc_html( PHYSIO_ADDRESS_STREET . ', ' . PHYSIO_ADDRESS_CITY . ' ' . PHYSIO_ADDRESS_ZIP ); ?></li>
								<li><i class="fas fa-phone"></i><a href="tel:<?php echo esc_attr( PHYSIO_PHONE ); ?>">26810 73248</a></li>
								<li><i class="fas fa-mobile-alt"></i><a href="tel:<?php echo esc_attr( PHYSIO_PHONE_MOBILE ); ?>">697 287 6704</a></li>
								<li><i class="fas fa-envelope"></i><a href="mailto:<?php echo esc_attr( PHYSIO_EMAIL ); ?>"><?php echo esc_html( PHYSIO_EMAIL ); ?></a></li>
								<li><i class="fas fa-calendar-check"></i><a href="<?php echo esc_url( home_url( '/rantevou/' ) ); ?>">Κλείστε ραντεβού</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="physio-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<p class="physio-footer-copyright"><?php medidove_copyright_text(); ?></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>
