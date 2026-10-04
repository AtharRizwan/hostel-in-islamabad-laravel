# Group Members: 
Muhammad Athar (408369)\
Muhammad Arsalan Khan (410963)\
Muhammad Saad Ashraf (424991)

# GitHub Repo Link:
[https://github.com/AtharRizwan/hostel-in-islamabad-laravel](https://github.com/AtharRizwan/hostel-in-islamabad-laravel)

# Hostel in Islamabad (Laravel)

The Laravel 11 version of the Hostel in Islamabad website. Visitors register and log in to browse the home, about and services pages, add and delete their own reviews, and view each service. Admins can also edit services and delete any review.

## Requirements

- PHP 8.2 or newer with the `pdo_sqlite` extension
- Composer
- Node.js and npm

On Arch Linux, SQLite support is a separate package:

```sh
sudo pacman -S php-sqlite
# then uncomment extension=pdo_sqlite and extension=sqlite3 in /etc/php/php.ini
```

## Setup

```sh
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm run build
php artisan serve
```

Then open http://127.0.0.1:8000. While working on styles, run `npm run dev` in a second terminal instead of `npm run build`.

To reset the database to the seeded content at any time, run `php artisan migrate:fresh --seed`.

## Seeded accounts

| Role  | Email               | Password   |
|-------|---------------------|------------|
| Admin | `admin@example.com` | `admin`    |
| User  | `test@example.com`  | `password` |

## Structure

- `routes/web.php`: page routes, review add/delete and the admin service update (all behind login)
- `routes/auth.php`: register, login and logout
- `app/Http/Controllers/AddReview.php`, `UpdateService.php`: review and service actions
- `resources/views/layouts/app.blade.php`: the shared layout; `partials/` holds the header, footer and flash messages
- `resources/views/pages/`: home, about, services and the single service page
- `resources/css/`: `base.css` and `components.css` are shared with the static site; `app.css` holds the Laravel-only pieces; the rest are page styles, all built by Vite
- `public/js/`: `theme.js` (saved theme), `main.js` (Page Styles menu and mobile menu) and `about.js` (About page)

## Tests

```sh
php artisan test
```

Tests run against an in-memory SQLite database, so they never touch `database/database.sqlite`.
