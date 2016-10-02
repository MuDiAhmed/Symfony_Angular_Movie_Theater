Movie Theater
=============

##Requirements
        PHP 5.6+
        MySQL  5.7
        bower

##Instructions
`cd <app_root_path>`
create database user `movie_theater` pass `mov_thtr` with all privileges  
run `composer install` to install the required packages  
update database params `database_name: symfony_movie_theaters` `database_user: movie_theater` `database_password: mov_thtr` in `config/parameters.yml`  
run `sudo php bin/console doctrine:database:create` to create DataBase  
run `sudo php bin/console doctrine:query:sql 'ALTER DATABASE symfony_movie_theater CHARACTER SET utf8 COLLATE utf8_general_ci;'`  
run `sudo php bin/console doctrine:migrations:migrate`  
run `sudo php bin/console doctrine:fixtures:load` to insert fake data to database  
run `bower install` to install bower components  
run `sudo php bin/console server:run` to start server  
go to `localhost:8000` and enjoy  