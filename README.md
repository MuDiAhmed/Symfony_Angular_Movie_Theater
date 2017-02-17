Movie Theater
=============

##Requirements
        PHP 5.6+
        MySQL  5.7
        bower
        composer

##Instructions
* `cd <app_root_path>`
* run `sudo composer install` to install the required packages  
* create database user `movie_theater` pass `mov_thtr` with all privileges  
**Note:**
if you want to change database name, username, password, host, port
open `config/parameters.yml`
* run `php bin/console doctrine:database:create` to create DataBase  
* run `php bin/console doctrine:query:sql 'ALTER DATABASE symfony_movie_theater CHARACTER SET utf8 COLLATE utf8_general_ci;'`  
* run `php bin/console doctrine:migrations:migrate` to run database migrations 
* run `php bin/console doctrine:fixtures:load` to insert fake data to database  
* run `bower install` to install bower components  
* run `php bin/console server:run` to start server  
* go to `localhost:8000` and enjoy  
* login with `Mohamed Ahmed` pass `123456`