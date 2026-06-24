# Доступи до адміністративної частини сайту

> Увага: реальні паролі не зберігаються в GitHub. Цей файл є шаблоном для передачі доступів Замовнику окремим захищеним каналом.

Адреса адміністративної панелі:

```text
/admin
```

Приклад для локального середовища:

```text
URL: http://polissia-science-park.test/admin
Email: admin@example.com
Password: передається окремо
```

Для production:

```text
URL: https://your-domain.example/admin
Email: вказується під час розгортання
Password: передається окремо
```

## Створення адміністратора через Tinker

```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::updateOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Administrator',
        'password' => Hash::make('strong-password'),
        'email_verified_at' => now(),
    ]
);
```

Після створення адміністратора потрібно вийти з Tinker:

```php
exit
```
