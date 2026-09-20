#!/usr/bin/env bash
# update-plugins.sh — the `ncu -u && pnpm install` equivalent for WordPress.
#
# Updates every wp.org-hosted plugin to its latest version via WP-CLI,
# running inside the `wordpress:cli` image against the running stack.
#
# Usage:
#   ./update-plugins.sh           # update all plugins (minus PROTECTED)
#   ./update-plugins.sh --dry-run # show what would update, change nothing
#
# PROTECTED slugs are never touched:
#   - booked, bdevs-elementor, bdevs-toolkit, navz-photo-gallery
#     (premium/bundled — not on wp.org, or would install the WRONG plugin
#      if wp.org happens to host a different plugin under the same slug)
#   - easy-appointments
#     (we patched src/fields/tablecolumns.php — an update reverts the
#      new-UI Greek translation fix; update it manually then re-apply)

set -euo pipefail
cd "$(dirname "$0")"

# Git Bash (MSYS) rewrites /var/www/html to a Windows path — disable it.
export MSYS_NO_PATHCONV=1

COMPOSE="docker compose -f docker-compose.local.yml"
CLI_IMAGE="wordpress:cli-php8.4"
PROTECTED="booked,bdevs-elementor,bdevs-toolkit,navz-photo-gallery,easy-appointments"

# 1. Make sure the stack is up
$COMPOSE up -d >/dev/null

# 2. Resolve the wordpress container (for --volumes-from / --network)
WP_CID=$($COMPOSE ps -q wordpress)
if [ -z "$WP_CID" ]; then
  echo "wordpress container not found" >&2
  exit 1
fi

# 3. Show available updates first (always informational)
echo "=== Plugins with available updates ==="
docker run --rm --user root \
  --volumes-from "$WP_CID" \
  --network "container:$WP_CID" \
  "$CLI_IMAGE" \
  wp plugin list --update=available --fields=name,version,update_version \
  --path=/var/www/html --allow-root || true
echo

if [ "${1:-}" = "--dry-run" ]; then
  echo "(dry run — nothing changed)"
  exit 0
fi

# 4. Update everything except PROTECTED
echo "=== Updating (excluding: $PROTECTED) ==="
docker run --rm --user root \
  --volumes-from "$WP_CID" \
  --network "container:$WP_CID" \
  "$CLI_IMAGE" \
  wp plugin update --all --exclude="$PROTECTED" \
  --path=/var/www/html --allow-root

# 5. PHP files changed on disk but opcache runs with validate_timestamps=0 —
#    restart so Apache picks up the new code.
echo "=== Restarting wordpress container (opcache) ==="
docker restart "$WP_CID" >/dev/null

echo
echo "Done. Reminder: easy-appointments was skipped — it carries a manual patch"
echo "(src/fields/tablecolumns.php translation whitelist). If you update it,"
echo "re-apply that patch or the booking form goes back to English."