# Local Docker DB — changes needed

Site runs at http://localhost:8080 via `docker-compose.local.yml`, seeded from `db_export.sql` (verbatim binary import — keep it that way).

## Required for login (already applied to running DB)

- **`wp_users.user_pass`** — the dump stores `Kk.25102002` as plaintext, which WP cannot authenticate. Replaced with a bcrypt hash for the same password.
  - Credentials: `admin` / `Kk.25102002`
  - **Re-seeding reverts this.** `db_export.sql` still has plaintext — `docker compose down -v` will break login again unless the dump is patched or `import-db.sh` gets a fix-up step.

## Masked by wp-config (harmless, out of sync)

- **`wp_options.siteurl` / `home`** = `https://physioelpida.gr` — overridden by `WP_HOME` / `WP_SITEURL` in `.docker-local/wp-config.php`. Site works; updating to `http://localhost:8080` is optional.

## Live-domain references (~6,241 occurrences of `https://physioelpida.gr`)

These still hit the real site — links, images, emails. Rendered fine locally as long as the live site is up.

- **`wp_posts.guid`** — 721 rows. Harmless (WP never uses guid for routing). Leave as-is.
- **`wp_posts.post_content`** — 465 posts with live-domain URLs (internal links, embedded images).
- **`wp_postmeta`** — 385 rows, incl. Elementor `_elementor_data` and attachment metadata. **Serialized** — use `wp search-replace`, never raw SQL.
- **`wp_options`** — 13 rows: `theme_mods_medidove-child`, `widget_media_image`, `booked_email_logo`, `booking_email_new_admin`, `wp_mail_smtp`, `ssa_settings_json`, etc.

## Worth checking

- **`wp_mail_smtp` is configured** — if it has real SMTP credentials, the local site can send real emails (booking notifications etc.). Neuter locally.
- **`user_activation_key`** — stale reset key `1740088303:$P$...` from an old password-reset request. Harmless; can clear.

## Recommendation

Don't edit the dump. Add a small post-import step to `import-db.sh` that re-hashes the password (and optionally updates `siteurl`/`home`). Domain search-replace is optional — do it serialized-safe in the running DB only, keeping `db_export.sql` byte-identical.

---

# Production DB changes needed after deploy

Everything below lives in the **database**, so the FTP deploy (`.github/workflows/deploy.yml`) does NOT carry it over. Files deploy automatically; this list is what you must apply on the live DB once.

## 1. Trash junk/demo content (11 posts)

```sql
UPDATE wp_posts SET post_status='trash'
WHERE post_type='bdevs-portfolio' AND post_status='publish';

UPDATE wp_posts SET post_status='trash'
WHERE post_type='page' AND post_name IN ('cart','checkout','home-7') AND post_status='publish';
```

Local IDs (verify against prod before running — prod IDs may differ):
`409, 425, 426, 427, 428, 429, 430, 431` (all bdevs-portfolio, lorem ipsum demos),
`462` (cart), `463` (checkout), `1147` (home-7 demo page).

## 2. Service pages — real content (15 posts)

All `bdevs-service` posts had **empty post_content**; Greek content (intro + h2 + bullet list) was written for each slug:

`rehabilitation-of-musculoskeletal-disorders`, `rehabilitation-in-sports-injuries`,
`postoperative-rehabilitation`, `physiotherapy-at-home`, `clinical-evaluation`,
`footprint`, `therapeutic-exercise`, `lymphatic-massage`, `hand-massage`,
`respiratory`, `craniocerebral-spinal-cord-injuries`,
`degenerative-type-motor-dysfunctions`, `rehabilitation-in-metabolic-diseases`,
`aesthetics`, `chiropractic`

## 3. Member (equipment) pages — appended sections (13 posts)

A keyword-targeted block was **appended** to existing content of every published
`bdevs-member` post, marked with `<!-- seo-extra -->` for idempotency:

`amfit-digital-morphology-pedometer`, `psifiaki-elxi`, `laba-yperythron`,
`parafynoloutro`, `dinoloutro`, `diathermia-mikrokymaton`, `laser-ypsisychno`,
`tecar-therapeia`, `eswt-btl`, `s-i-s-yperepagogikos-magnitikos-diegertis`,
`kykloforitis-akron`, `cpm-gonatos-ischiou-agkona-omou`,
`tumble-forms-therapeies-se-paidia-me-eidikes-anagkes`

## How to apply on production

**Option A (recommended):** re-run the one-off script on the server.
Regenerate `seo-content-update.php` with slug/post_type lookups (not hardcoded
IDs) so it's portable. Then: FTP upload → open
`https://physioelpida.gr/seo-content-update.php` once → delete the file.
It is idempotent (skips non-empty services and members already containing
`<!-- seo-extra -->`).

**Option B:** phpMyAdmin on InfinityFree → run the SQL above for trashing, and
paste content manually in wp-admin for the 28 posts (tedious but zero-risk).

## Other prod-side checks (not DB)

- `wp_options.blog_public` must be `1` on prod (it is locally).
- Purge **W3 Total Cache** after deploy, else visitors/crawlers get stale meta.
- **TranslatePress**: the new Greek strings in member pages will show untranslated
  on `/en/` pages until you add EN translations in the TranslatePress editor.
- GSC: submit `https://physioelpida.gr/wp-sitemap.xml`, then request indexing on
  the top pages (Amfit pedograph page first — 81 impressions, pos 64).

---

# Booking plugin swap: Booked → Easy Appointments

Replaces abandoned `booked` with `easy-appointments` on the `/rantevou/` page.
All of this is DB work — run on the **live** DB after the FTP deploy puts the
`wp-content/plugins/easy-appointments` files in place.

## Step 0 — activate the plugin

EA creates its `wp_ea_*` tables + seeds `wp_ea_options` on first plugin load
(`EasyAppointment::install()` runs on every request when `easy_app_db_version`
is unset). Two ways:

- **wp-admin**: Plugins → activate "Easy Appointments". Easiest.
- **DB-only**: add `easy-appointments/main.php` to the serialized array in
  `wp_options.active_plugins`, then load any front-end page once to trigger
  `install()` (creates tables + options, sets `easy_app_db_version = 4.0.2.2`).

Verify afterwards: `SHOW TABLES LIKE 'wp_ea_%'` → 10 tables
(`wp_ea_appointments, wp_ea_connections, wp_ea_customers, wp_ea_error_logs,
wp_ea_fields, wp_ea_locations, wp_ea_meta_fields, wp_ea_options, wp_ea_services,
wp_ea_staff`), and `SELECT COUNT(*) FROM wp_ea_options` → ~113 rows.

## Step 1 — deactivate Booked

```sql
-- remove booked/booked.php from active_plugins (serialized array — edit
-- carefully or via wp-admin). Booked data stays intact:
-- wp_booking, wp_bookingdates, booked_* options, booked_appointments posts.
```

Booked tables/posts are **not** deleted — 28 `booked_appointments` posts remain
in `wp_posts` if the old records are ever needed (or for a future QuickCal
migration, which reads them).

## Step 2 — seed location / service / staff

```sql
INSERT INTO wp_ea_locations (name, address)
VALUES ('Κέντρο Ελπίδα – Άρτα', 'Βασιλέως Πύρρου 15, Άρτα 47100');

INSERT INTO wp_ea_services (name, duration, slot_step, price, sequence, description)
VALUES ('Ραντεβού Φυσικοθεραπείας', 45, 45, 0, 1,
        'Συνεδρία φυσικοθεραπείας στο κέντρο Ελπίδα');

INSERT INTO wp_ea_staff (name, email, phone, description)
VALUES ('Τσώλας Δημήτριος', 'info@physioelpida.gr', '2681073248',
        'Επιστημονικός υπεύθυνος');
```

These produce IDs 1/1/1 on a fresh install — if they differ, adjust the
`location/service/worker` columns below and the shortcode params.

## Step 3 — connections (working hours)

Δε–Πα 09:00–15:00 + 17:00–21:00, Σα 09:00–15:00, Κυ κλειστά:

```sql
INSERT INTO wp_ea_connections
(group_id, location, service, worker, slot_count, day_of_week, time_from, time_to, is_working, repeat_week, repeat_booking) VALUES
(1,1,1,1,1,'Monday','09:00:00','15:00:00',1,1,0),
(1,1,1,1,1,'Monday','17:00:00','21:00:00',1,1,0),
(1,1,1,1,1,'Tuesday','09:00:00','15:00:00',1,1,0),
(1,1,1,1,1,'Tuesday','17:00:00','21:00:00',1,1,0),
(1,1,1,1,1,'Wednesday','09:00:00','15:00:00',1,1,0),
(1,1,1,1,1,'Wednesday','17:00:00','21:00:00',1,1,0),
(1,1,1,1,1,'Thursday','09:00:00','15:00:00',1,1,0),
(1,1,1,1,1,'Thursday','17:00:00','21:00:00',1,1,0),
(1,1,1,1,1,'Friday','09:00:00','15:00:00',1,1,0),
(1,1,1,1,1,'Friday','17:00:00','21:00:00',1,1,0),
(1,1,1,1,1,'Saturday','09:00:00','15:00:00',1,1,0);
```

**Gotcha:** `day_of_week` MUST be capitalized English (`'Monday'`). The
front-end JS compares it with `inArray` against `date.getDay()` names —
lowercase silently disables every calendar day (this bit us locally).

## Step 4 — Greek labels + locale options

```sql
UPDATE wp_ea_options SET ea_value='Υπηρεσία' WHERE ea_key='trans.service';
UPDATE wp_ea_options SET ea_value='Τοποθεσία' WHERE ea_key='trans.location';
UPDATE wp_ea_options SET ea_value='Φυσικοθεραπευτής' WHERE ea_key='trans.worker';
UPDATE wp_ea_options SET ea_value='Επιλέξτε υπηρεσία' WHERE ea_key='trans.service_option';
UPDATE wp_ea_options SET ea_value='Επιλέξτε τοποθεσία' WHERE ea_key='trans.location_option';
UPDATE wp_ea_options SET ea_value='Επιλέξτε φυσικοθεραπευτή' WHERE ea_key='trans.worker_option';
UPDATE wp_ea_options SET ea_value='Αναζήτηση πελάτη' WHERE ea_key='trans.customer_search_label';
UPDATE wp_ea_options SET ea_value='Το ραντεβού σας καταχωρήθηκε με επιτυχία. Θα λάβετε σύντομα ενημέρωση από τη γραμματεία.'
WHERE ea_key IN ('trans.done_message','trans.booking_message','trans.done_message_front');
UPDATE wp_ea_options SET ea_value='Οριστικοποίηση' WHERE ea_key='trans.submit_button_text';
UPDATE wp_ea_options SET ea_value='Νέα κράτηση' WHERE ea_key='trans.create_new_booking';
UPDATE wp_ea_options SET ea_value='€' WHERE ea_key='trans.currency';
UPDATE wp_ea_options SET ea_value='Ευχαριστούμε για την κράτηση!' WHERE ea_key='trans.confirmation-title';
UPDATE wp_ea_options SET ea_value='el' WHERE ea_key='datepicker';
UPDATE wp_ea_options SET ea_value='1' WHERE ea_key IN ('price.hide','price.hide.service','currency.before');
```

Remaining English strings in the 4.x new-UI ("Book an appointment" heading etc.)
are covered by the `gettext` filter in `medidove-child/functions.php`
(`physio_ea_greek_strings`) — file deploys via FTP, nothing to do here.

## Step 5 — swap the shortcode on the booking page

Page slug is `rantevou` (post ID 2929 locally — resolve by slug on prod).
The shortcode lives in BOTH `post_content` and the serialized-ish
`_elementor_data` JSON — update both.

```sql
-- plain content: simple replace
UPDATE wp_posts SET post_content =
  REPLACE(post_content, '[booked-calendar]',
    '[ea_bootstrap location="1" service="1" worker="1" width="100%" auto_select_option="1"]')
WHERE post_name='rantevou' AND post_status='publish';
```

For `_elementor_data` the shortcode sits inside a JSON string — quotes must be
JSON-escaped (`\"`). Easiest correct way is a targeted REPLACE of the bare
shortcode name first, then add attributes:

```sql
-- _elementor_data: JSON-escaped quotes required inside the JSON string
UPDATE wp_postmeta pm JOIN wp_posts p ON p.ID = pm.post_id
SET pm.meta_value = REPLACE(pm.meta_value,
  '[booked-calendar]',
  '[ea_bootstrap location=\\"1\\" service=\\"1\\" worker=\\"1\\" width=\\"100%\\" auto_select_option=\\"1\\"]')
WHERE pm.meta_key = '_elementor_data' AND p.post_name='rantevou';

-- sanity check — must return 1
SELECT JSON_VALID(meta_value) FROM wp_postmeta pm JOIN wp_posts p ON p.ID=pm.post_id
WHERE pm.meta_key='_elementor_data' AND p.post_name='rantevou';
```

Then clear Elementor's element cache (it caches rendered HTML — the old
`[booked-calendar]` text otherwise keeps showing):

```sql
DELETE pm FROM wp_postmeta pm JOIN wp_posts p ON p.ID=pm.post_id
WHERE pm.meta_key='_elementor_element_cache' AND p.post_name='rantevou';
```

## Step 6 — caches & verification

- Purge W3 Total Cache (it serves the stale rendered page otherwise).
- `/rantevou/` → booking card shows: Υπηρεσία select, Greek calendar
  (Σεπτέμβριος…, ΔΕ ΤΡ ΤΕ ΠΕ ΠΑ ΣΑ ΚΥ), Mon–Sat days clickable,
  Email/Όνομα/Τηλέφωνο/Περιγραφή fields, Οριστικοποίηση button.
- Worker select is hidden by CSS (child theme `style.css`), value stays 1.
- A test booking writes a row to `wp_ea_appointments` and fires the
  confirmation mail via WP Mail SMTP (verify `wp_mail_smtp` config on prod).
