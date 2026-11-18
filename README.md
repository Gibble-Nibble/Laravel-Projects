# Laravel Projects

This repository contains a Laravel project hub and POS assessment projects.

## Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install
npm run build
php artisan serve
```

Open the project hub at `http://localhost:8000`.

## Projects

- `/tfa5` - POS foundation using static PHP arrays and Blade `@foreach` loops.
- `/tfa6` - Database-backed POS application using migrations, the `Tfa6Seeder`, and Eloquent models.
- `/tfa7` - Editable POS application with validated customer/user forms and user avatar uploads.

TFA6 provides these pages:

- `/tfa6`
- `/tfa6/about`
- `/tfa6/customers`
- `/tfa6/users`

The TFA6 customers and users pages retrieve records through Eloquent models. Run `php artisan migrate --seed` to create and populate the database tables.

TFA7 uses isolated `tfa7_customers` and `tfa7_users` tables and Intervention Image to store uploaded avatars as 320×320 JPEGs on Laravel's public disk. PHP's Fileinfo and GD extensions are required for avatar validation and processing. Run `php artisan migrate --seed` to create and seed its tables.
