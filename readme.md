To install follow these steps:

1.clone project into your local machine with `git clone {url}`
2.enter folder via command `cd {package-name}`
3.install composer packages via composer install, this will put vendor folder with installed packages
4.create database in your local machine;
5.copy example env to .env via command cp .env.example .env
6.edit .env with configurations you have(app name, database credentials ...)
7.now, generate key php artisan key:generate
8.php artisan serve to run server
