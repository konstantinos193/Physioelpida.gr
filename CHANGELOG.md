# Changelog

All notable changes to this project will be documented here.

Format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

---

## [Unreleased] — 2026 Resurrection

The great modernisation. Four years of dust, incoming.

### In Progress
- WordPress 6.0.0 → 6.7.x upgrade
- All 15+ plugins updated
- `WP_DEBUG` disabled in production (yes, it was on)
- `DB_CHARSET` corrected to `utf8mb4`
- WordPress secret keys regenerated (2021 keys, finally retired)
- WP Reset plugin removed from production before someone has a very bad day
- Booked plugin replacement under evaluation (Amelia / Simply Schedule Appointments)
- Caching layer added (LiteSpeed Cache)
- Image compression pass (Smush / Imagify)
- Database cleanup: post revisions, spam, transients purged
- Repository set up and made public on GitHub

---

## [1.0.0] — December 2021 — Initial Launch

The beginning. Or, depending on how you look at it, the crime.

### Added
- Full WordPress site for PhysioElpida clinic
- Medidove theme with child theme customizations
- Elementor page layouts: Home, Services, About, Contact, Booking
- Appointment booking via Booked plugin
- Greek + English translations via TranslatePress
- Contact Form 7 + WP Mail SMTP
- Mailchimp newsletter integration
- ACF custom fields (v5.12.3)
- Akismet spam protection
- Autoconvert Greeklish Permalinks for SEO
- Gallery pages via Navz Photo Gallery
- Deployed to InfinityFree hosting

### Immediately Forgotten
- WordPress updates
- Plugin updates
- Security patches
- Basically everything after launch

---

*Previous versions: none. This site was born in 2021 and immediately entered a coma.*
