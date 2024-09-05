# Mares de Portugal

<img src="/public/images/sea-logo.webp" alt="Mares de Portugal logo" width="400">

A simple website that shows the tides of the Portuguese coast. 

The website is built with Laravel and Tailwind CSS.

**Why?**

-   The existing websites are not user-friendly and are confusing to navigate.
-   Sometimes you just want to know the tides of a specific location and if it's tide is rising or falling.
-   There was no clean way to check the moon phase as well.
-   To learn and practice Laravel and Tailwind CSS.

Check the website live: [https://mares.varandas.io](https://mares.varandas.io), analytics are available at [https://analytics.varandas.io/mares.varandas.io](https://analytics.varandas.io/mares.varandas.io).

## Getting Started

If you want to run the project locally, or contribute, please follow the instructions below to get started. If you have any questions, feel free to open an issue.

### Prerequisites

-   Node.js
-   Composer
-   PHP 8.2
-   Any database (MySQL, PostgreSQL, SQLite, etc.)

### Installing

1. Clone the repository

```bash
git clone git@github.com:AndreVarandas/mares-portugal.git
```

2. Install dependencies

```bash
composer install
yarn install
```

3. Create a `.env` file

```bash
cp .env.example .env
```

4. Generate an application key

```bash
php artisan key:generate
```

5. Create a database and fill the `.env` file with the database credentials

6. Run the migrations

```bash
php artisan migrate
```

7. Run the seeder

```bash
php artisan db:seed
```

8. Compile the assets

```bash
yarn dev
```

9. Run the server

```bash
php artisan serve
```

## Built With

-   [Laravel](https://laravel.com/) - The PHP framework used
-   [Tailwind CSS](https://tailwindcss.com/) - The CSS framework used

## Authors

-   **André Varandas** - _Initial work_ - [GitHub](https://github.com/AndreVarandas)
-   **André Bravo Ferreira** - _Initial work_ - [GitHub](https://github.com/AndreBravoFerreira)
