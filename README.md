Movie Theater
=============

#Requirements
        PHP 5.6+
        MySQL  5.7

#Instructions
        `cd <app_root_path>`
        create database user `movie_theater` pass `mov_thtr`
        run `composer install` to install the required packages
        run `php bin/console doctrine:database:create` to create DataBase
        run `php bin/console doctrine:query:sql 'ALTER DATABASE symfony_movie_theater CHARACTER SET utf8 COLLATE utf8_general_ci;'`