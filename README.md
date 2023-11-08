# Mares de Portugal

[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F309df289-c70c-44a5-9b59-00b43b2a601a%3Fdate%3D1&style=flat)](https://forge.laravel.com/servers/449430/sites/2156237)

Just a simple website to show the tides of Portugal.

## Getting Started

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
