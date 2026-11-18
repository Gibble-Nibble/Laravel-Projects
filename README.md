# Laravel Projects

This repository contains a Laravel project hub and POS assessment projects.

## Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan migrate --database=tsa3 --path=database/migrations/tsa3 --force
php artisan db:seed --database=tsa3 --class='Database\Seeders\Tsa3Seeder' --force
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
- `/tsa3` - Tasks for Today, with its own database connection and task/profile pages.

TFA6 provides these pages:

- `/tfa6`
- `/tfa6/about`
- `/tfa6/customers`
- `/tfa6/users`

The TFA6 customers and users pages retrieve records through Eloquent models. Run `php artisan migrate --seed` to create and populate the database tables.

TFA7 uses isolated `tfa7_customers` and `tfa7_users` tables and Intervention Image to store uploaded avatars as 320×320 JPEGs on Laravel's public disk. PHP's Fileinfo and GD extensions are required for avatar validation and processing. Run `php artisan migrate --seed` to create and seed its tables.

## TSA3 Tasks for Today

TSA3 is isolated in a dedicated `tsa3` database connection. Locally it defaults to a separate SQLite file at `database/tsa3.sqlite`; on the Oracle VPS, configure `DB_TSA3_CONNECTION=mariadb` and `DB_TSA3_DATABASE=laravel_pos_tsa3` to use a separate MariaDB database. Create that database and grant the Laravel database account access before deploying. It never uses the main activities' `users` table.

The deployment migrates and seeds TSA3 independently. The seeder creates eight tasks across yesterday, today, and tomorrow, plus one profile. Its pages are `/tsa3`, `/tsa3/tasks`, `/tsa3/profile`, and `/tsa3/about`; the app-wide `/` project hub remains unchanged.
