#!/bin/sh
# Import the site dump with binary client charset so legacy cp1252/cp1253
# bytes are stored verbatim (exactly as on the live server) instead of
# failing utf8mb4 validation.
set -e
mariadb -u root -p"${MYSQL_ROOT_PASSWORD}" --default-character-set=binary "${MYSQL_DATABASE}" < /seed/db_export.sql
echo "Import finished: $(mariadb -u root -p"${MYSQL_ROOT_PASSWORD}" -N -e "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='${MYSQL_DATABASE}'") tables"
