System Requirements:
```
PHP 8.2
Composer
Laravel 11
MySQL
```
Installation:

1. Clone the repository from GitHub:
```
https://github.com/piyas33/safaetul_analyzenbd_task
```

2. Navigate to the project directory:

```
cd safaetul_analyzenbd_task
```

3. Install dependencies using Composer:

```
   composer install
   npm install
```

4. Create a copy of the .env.example file and rename it to .env. Update the database credentials accordingly.

```
    cp .env.example .env
```

5. Generate application key:

```
   php artisan key:generate
```

5. Run database migrations:

```
   php artisan migrate
```

6. Start the development server:

```
   php artisan serve
   npm run dev
```

7. Access the application via the browser:

```
   http://localhost:8000
```

