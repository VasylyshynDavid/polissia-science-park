# Інструкція з розгортання проєкту

## Системні вимоги

- PHP 8.2 або новіше;
- Composer;
- MySQL або MariaDB;
- Node.js та npm;
- вебсервер Apache або Nginx;
- Laravel 12 або новіше.

Для локального запуску рекомендовано Laragon.

## 1. Клонування репозиторію

```bash
git clone https://github.com/VasylyshynDavid/polissia-science-park.git
cd polissia-science-park
```

## 2. Встановлення PHP-залежностей

```bash
composer install
```

## 3. Налаштування середовища

```bash
copy .env.example .env
php artisan key:generate
```

Для Laragon/MySQL у `.env` рекомендовано:

```env
APP_NAME="Science Park"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://polissia-science-park.test
APP_FORCE_HTTPS=false

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=polissia_science_park
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

Для production потрібно встановити:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.example
APP_FORCE_HTTPS=true
SESSION_SECURE_COOKIE=true
```

## 4. Створення бази даних

```bash
mysql -u root -e "CREATE DATABASE IF NOT EXISTS polissia_science_park CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

## 5. Міграції та початкові дані

```bash
php artisan migrate --seed
```

Якщо потрібно створити адміністратора через seed, у `.env` перед запуском seed можна задати:

```env
ADMIN_NAME=Administrator
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=strong-password
```

Альтернативно адміністратора можна створити через Tinker.

## 6. Символічне посилання для файлів

```bash
php artisan storage:link
```

## 7. Frontend-залежності

```bash
npm install
npm run build
```

## 8. Очищення кешу

```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

## 9. Запуск локально

У Laragon сайт буде доступний за адресою:

```text
http://polissia-science-park.test
```

Адмінпанель:

```text
http://polissia-science-park.test/admin
```
