## GZERO CMS PLATFORM [![Build Status](https://travis-ci.org/GrupaZero/platform.png?branch=master)](https://travis-ci.org/GrupaZero/platform) [![Coverage Status](https://coveralls.io/repos/GrupaZero/platform/badge.svg?branch=master&service=github)](https://coveralls.io/github/GrupaZero/platform?branch=master)

GZERO CMS PLATFORM it's a base to build custom application on GZERO CMS

**The project is still in the phase of intensive development**

## Installation

Clone this project directly form github

Install dependencies

```
composer install
```

Create and configure database:
 - create database and user
 - copy .env.example as .env in root directory and put your credentials in to it
 
 ```
 DB_HOST=localhost
 DB_DATABASE=database_name
 DB_USERNAME=database_user
 DB_PASSWORD=database_password
 ```
 - create database schema and required data (remember to set env to dev)
 
```
php artisan migrate --path=vendor/gzero/cms/src/migrations/
```

 - you can also seed database with example data using this command
 
```
php artisan db:seed --class="Gzero\Core\CMSSeeder"
```
 - publish vendor assets
 
```
php artisan vendor:publish --tag=public --force
```
 - run php build in server
  
```
php artisan serve
```
 - done
 
 To check progress on project development you can occasionally run composer install


## Testing

Copy .env.example as .env.testing in root directory and put your credentials in to it

To run tests use:

```
./vendor/bin/codecept run
```
