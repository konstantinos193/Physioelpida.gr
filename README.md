<p align="center">
  <img src="wp-content/themes/medidove-child/assets/logo.png" alt="PhysioElpida" width="200" />
</p>

<h1 align="center">PhysioElpida</h1>

<p align="center"><i>Physiotherapy clinic website. On life support since 2021.</i></p>

<p align="center">
  <img src="https://img.shields.io/badge/WordPress-6.0.0-21759B?style=for-the-badge&logo=wordpress&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-7.4-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Elementor-page%20builder-E2348A?style=for-the-badge&logo=elementor&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-5.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Hosting-InfinityFree-555555?style=for-the-badge" />
  <img src="https://img.shields.io/badge/Status-In%20Recovery-FF6B35?style=for-the-badge" />
  <img src="https://img.shields.io/badge/License-Proprietary-red?style=for-the-badge" />
</p>

---

## Overview

A WordPress site for [PhysioElpida](https://physioelpida.gr) — a physiotherapy clinic in Greece. Built in 2021, immediately forgotten, and now being dragged kicking and screaming into 2026. Four years of glorious neglect. Seven major WordPress versions behind. Fifteen plugins screaming for updates. `WP_DEBUG = true` in production because whoever set this up apparently loved living dangerously.

We're fixing it. Probably.

---

## Stack

- **WordPress 6.0.0** — seven major versions behind when we picked it back up. This is fine.
- **PHP 7.4** — because PHP 8 would've been too easy, and apparently 7.4 is the hill InfinityFree chose to die on
- **MySQL 5.x** — no utf8mb4, no emoji, no dignity
- **Elementor** — drag-and-drop go brrr, actual CSS is a myth
- **Medidove Theme** (ThemeForest, ~2019) — a medical theme that has definitely aged like fine milk
- **medidove-child** — where all the customizations live. don't touch it, don't look at it, just respect it
- **TranslatePress** — Greek + English, for maximum audience confusion
- **InfinityFree Hosting** — exactly what it sounds like: infinite limitations, free regret

---

## Plugins

| Plugin | Purpose | Vibe |
|--------|---------|------|
| Elementor | Page builder | the reason this site looks decent |
| BDevs Elementor | Theme widgets | Elementor's needy little sibling |
| BDevs Toolkit | Theme companion | still not sure what this one does |
| Advanced Custom Fields 5.x | Custom fields | needs updating to 6.x, hasn't been told yet |
| Booked | Appointment booking | was abandoned by its authors, much like this site |
| TranslatePress | Greek / English | two languages, double the broken strings |
| Contact Form 7 | Contact form | had security patches in 2022, 2023, and 2024 that we missed |
| WP Mail SMTP | Transactional email | standing between patients and the void |
| Mailchimp for WP | Newsletter | for the newsletter nobody subscribed to |
| Akismet | Spam protection | the only thing that's been updated since 2021 |
| Autoconvert Greeklish Permalinks | SEO-friendly Greek URLs | surprisingly niche, suspiciously necessary |
| WPForms Lite | Additional forms | backup contact form for backup reasons |
| Navz Photo Gallery | Gallery pages | last updated when jQuery was exciting |
| Duplicate Page | Content utility | used twice, installed forever |
| WP Reset | **NUCLEAR OPTION** | **why is this on a production site. remove immediately.** |
| Classic Editor | Legacy editor | Gutenberg said hi, this plugin refused |

---

## Local Development

1. Install [LocalWP](https://localwp.com/) or [Laragon](https://laragon.org/) — your choice of poison
2. Create a new WordPress site (`physioelpida.local` or whatever, you're free)
3. Download WordPress core from [wordpress.org](https://wordpress.org/download/) and drop it at the repo root — WP core is not in the repo because we're not animals
4. Copy `wp-config-sample.php` → `wp-config.php` and fill in your local DB credentials (no, the production credentials are not in this repo, good try)
5. Import `db_export.sql` into your local MySQL via phpMyAdmin or CLI — obtained separately, from a trusted source, definitely
6. Run URL swap via WP-CLI or the Better Search Replace plugin:
   ```bash
   wp search-replace 'https://physioelpida.gr' 'http://physioelpida.local'
   ```
7. Log in at `/wp-admin`, pray everything loads, begin the upgrade process

---

## Project Structure

What's actually in this repo (spoiler: not that much):

```
physioelpida/
├── wp-content/
│   ├── plugins/         # all installed plugins
│   ├── languages/       # Greek locale files
│   └── index.php        # WordPress' little security blanket
├── .htaccess            # Apache rules, don't touch unless you know what you're doing
├── wp-config-sample.php # safe template — fill in your own credentials
├── .gitignore           # keeping secrets out since 2026
└── README.md            # you're reading it. congrats.
```

Not in this repo: WordPress core, `wp-config.php`, `db_export.sql`, `wp-content/uploads/`. They live elsewhere, as God intended.

---

## Deployment

InfinityFree has no SSH. No SFTP. Just raw, unfiltered FTP — the way our ancestors deployed.

1. **Upload files via FTP** (FileZilla recommended, patience required):
   - Upload changed files under `wp-content/plugins/` and `wp-content/themes/`
   - Do NOT overwrite `wp-content/uploads/` — those images already live on the server
   - Do NOT overwrite the production `wp-config.php` — it has the real DB credentials, unlike you
2. **Handle the database** via phpMyAdmin (InfinityFree control panel):
   - Export upgraded local DB: `wp db export upgraded_db.sql`
   - Import to InfinityFree
   - Run URL swap back: `wp search-replace 'http://physioelpida.local' 'https://physioelpida.gr'`
3. Verify site loads over HTTPS, forms work, nothing is on fire

---

## Known Issues / Tech Debt

The honest list. It's a lot.

- `WP_DEBUG = true` was set in production. Yes, really. Errors were broadcasting to the world.
- `DB_CHARSET = utf8` instead of `utf8mb4` — no emoji support and some edge-case Greek character issues. Classic.
- WordPress secret keys haven't been rotated since 2021 — five-year-old session tokens are a vibe.
- **WP Reset plugin is installed on production.** One misclick and the entire database is gone. Remove this immediately.
- Booked (appointment plugin) was effectively abandoned by its authors. Needs replacing with Amelia or Simply Schedule Appointments.
- Classic Editor coexisting with Elementor coexisting with Gutenberg — nobody knows what editor is actually in charge.
- No caching plugin active — every page load hits the database fresh, on free shared hosting, forever.
- SSL certificate is provided by InfinityFree for free — check it hasn't silently expired.

---

## Contributing

Please don't. But if you absolutely must:

- Don't commit `wp-config.php`. Seriously.
- Don't commit `*.sql` files. There's a `.gitignore` for a reason.
- Test locally before touching production. There is no staging. You are the staging.
- If you break the booking form, you're scheduling 40 physiotherapy appointments manually. Your problem now.

---

## License

Proprietary — built by [AdInfinity](https://adinfinity.gr) for PhysioElpida. Published here for portfolio purposes. Not MIT, not open source, not yours. All rights reserved.

---

**Live site:** [physioelpida.gr](https://physioelpida.gr)  
**Built by:** [AdInfinity](https://adinfinity.gr)  
**Status:** being resurrected, slowly, with care
