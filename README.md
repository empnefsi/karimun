# KARIMUN CMS

## Prerequisites

1. Git
2. XAMPP, or any local web server solution that has PHP and MySQL in it.
3. Composer

## Getting Started Karimun CMS

To running Karimun on your local server, follow these steps:
1. Clone the repo inside XAMPP htdocs (or other local web server) <br/>`git clone https://github.com/empnefsi/karimun.git`
2. Go to `main` branch <br/>`git switch main`
4. Copy and rename the `.env.example` to `.env`<br/>`cp .env.example .env`
5. Edit your credentials in the `.env` file
- Database credentials
- Mail server configuration. Eg. mailtrap
6. Run `$ composer install` in the project directory
7. Run `$ composer dump-autoload`
8. Run `$ php artisan key:generate`
9. Run `$ php artisan migrate --seed`
10. Run `$ php artisan storage:link`
11. Thats it, now run `$ php artisan serve`
12. Open your browser and fill the url `localhost:8000`
13. To test the admin side, you can go into 'localhost:8000/admin'. You can use this credentials for logging in into admin dashboard:
* Email : admin@argon.com
* Password : secret
