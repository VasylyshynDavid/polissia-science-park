#!/usr/bin/env bash
set -e

export PORT="${PORT:-10000}"
export APP_ENV="${APP_ENV:-production}"
export APP_DEBUG="${APP_DEBUG:-false}"
export APP_URL="${APP_URL:-http://localhost:${PORT}}"
export APP_FORCE_HTTPS="${APP_FORCE_HTTPS:-false}"
export DB_CONNECTION="${DB_CONNECTION:-sqlite}"
export DB_DATABASE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
export SESSION_DRIVER="${SESSION_DRIVER:-file}"
export CACHE_STORE="${CACHE_STORE:-file}"
export QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"
export LOG_CHANNEL="${LOG_CHANNEL:-stderr}"

if [ -z "${APP_KEY:-}" ]; then
    export APP_KEY="$(php artisan key:generate --show --no-ansi)"
fi

if [ "${DB_CONNECTION}" = "sqlite" ]; then
    mkdir -p "$(dirname "${DB_DATABASE}")"
    touch "${DB_DATABASE}"
fi

chown -R www-data:www-data storage bootstrap/cache database || true
chmod -R 775 storage bootstrap/cache database || true

php artisan config:clear --no-ansi || true
php artisan route:clear --no-ansi || true
php artisan view:clear --no-ansi || true
php artisan cache:clear --no-ansi || true

# Free Render deployments normally use ephemeral SQLite for demo access.
# Fresh migration keeps the public demo consistent after each cold deploy/restart.
if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
    php artisan migrate:fresh --seed --force --no-ansi
fi

php artisan storage:link --no-ansi || true
php artisan config:cache --no-ansi || true
php artisan route:cache --no-ansi || true
php artisan view:cache --no-ansi || true

sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:\${PORT}>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

exec apache2-foreground
