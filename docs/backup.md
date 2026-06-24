# Інструкція резервного копіювання бази даних

У проєкті передбачена Artisan-команда для створення резервної копії бази даних:

```bash
php artisan db:backup
```

Файли резервних копій створюються у директорії:

```text
storage/app/backups
```

Назва файлу формується автоматично у форматі:

```text
backup-YYYY-MM-DD-HHMMSS.sql
```

## Рекомендований порядок резервного копіювання

1. Перейти до кореня проєкту:

```bash
cd /d C:\laragon\www\polissia-science-park
```

2. Виконати команду:

```bash
php artisan db:backup
```

3. Перевірити наявність файлу в:

```text
storage/app/backups
```

## Відновлення з резервної копії MySQL/MariaDB

```bash
mysql -u root polissia_science_park < storage/app/backups/backup-file.sql
```

Перед відновленням бажано створити додаткову копію поточної бази.

## Примітка

Файли `.sql` не додаються в Git, оскільки вони можуть містити персональні або службові дані.
