# Mares de Portugal

Just a simple website to show the tides of Portugal.

Check the website live: [https://mares.varandas.io](https://mares.varandas.io), analytics available at [https://analytics.varandas.io/mares.varandas.io](https://analytics.varandas.io/mares.varandas.io).

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
