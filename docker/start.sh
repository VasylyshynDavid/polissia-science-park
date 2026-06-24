#!/usr/bin/env bash
set -e

cd /var/www/html

export PORT="${PORT:-10000}"
export APP_ENV="${APP_ENV:-production}"
export APP_DEBUG="${APP_DEBUG:-false}"
export APP_URL="${APP_URL:-https://polissia-science-park.onrender.com}"
export APP_FORCE_HTTPS="${APP_FORCE_HTTPS:-true}"

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

if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
    php artisan migrate:fresh --seed --force --no-ansi
fi

php artisan storage:link --no-ansi || true

php artisan config:cache --no-ansi || true
php artisan route:cache --no-ansi || true
php artisan view:cache --no-ansi || true

exec php artisan serve --host=0.0.0.0 --port="${PORT}"