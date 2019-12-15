## About Application

a RESTful API that can allow us to utilize an internationally recognized set of diagnosis codes.

## Enviroment setup

    1. Install docker
    2. Install composer if you don't have it -> https://getcomposer.org/download/
    3. Clone or download the codebase -> https://github.com/alex-adusei1/diagnosis_api

## Terminal Activities

-   [Open terminal and move to the root directory of the codebase]
-   [Run docker-compose up -- this will builds, (re)creates, starts, and attaches to containers for a service.]
-   [Run composer install -- this will install all dependencies example phpunit]
-   [Run php artisan key:generate -- this will generate a key for user session and secure encrypted data]
-   [Run php artisan migrate:fresh --seed -- this will create database tables and persit initial data to their various tables]
-   [Run vendor/bin/phpunit -- this will test the features]

## Design pattern

Repository Pattern
