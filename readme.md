## GZERO CMS PLATFORM [![Build Status](https://travis-ci.org/GrupaZero/platform.png?branch=master)](https://travis-ci.org/GrupaZero/platform) [![Coverage Status](https://coveralls.io/repos/GrupaZero/platform/badge.svg?branch=master&service=github)](https://coveralls.io/github/GrupaZero/platform?branch=master)

GZERO CMS PLATFORM it's a base to build custom application on GZERO CMS

**[VIEW DEMO](http://staging.gzero.pl/en)** - you can log in with this credentials:

```
login: admin@gzero.pl
pass: test
```

**The project is still in the phase of intensive development**

**The project uses [Docker](https://www.docker.com/what-docker) containers to package entire application with all of its dependencies into a standardized unit for 
software development.**

## Installation

Clone this project directly form github

##### Install dependencies
To install all required dependencies run:
```
composer install
```

##### Directories permissions
Set permissions to storage & bootstrap cache
```
sudo chmod 777 -R storage/
sudo chmod 777 -R bootstrap/cache/
sudo chmod 777 -R public/
```

##### Environment Configuration.
 Copy .env.example as .env in root directory.
 
##### Setting the local domains
For proper communication with the API is required to modify the hosts file in your OS.
In Ubuntu hosts file should looks like the following:
```
# /etc/hosts
127.0.0.1	localhost
...
127.0.0.1	dev.gzero.pl
127.0.0.1   api.dev.gzero.pl
...
```
 
##### Install and run Docker Engine:

Docker Engine is supported on Linux, Cloud, Windows, and OS X. Installation instructions are available on [Docker documentation
 page](https://docs.docker.com/engine/installation/) 

##### Build Docker container for platform
After Installing Docker Engine you need to build required docker containers, go to project directory and run:

 - Build docker containers

 
 ```
 sudo docker-compose build
 ```
 
 This will download and build application containers
 
 ```
 Building dev_db
 Building dev_redis
 Building dev_db_tests
 Building dev_web
 ```
  
 - Start Docker
 
  ```
  sudo docker-compose up -d
  ```
  
  This will run all application containers
 
 ```
  Starting platform_dev_db_1
  Starting platform_dev_redis_1
  Starting platform_dev_db_tests_1
  Starting platform_dev_web_1
 ```
 
 - Create database schema and required data
 
```
sudo docker exec -i -t platform_dev_web_1 ./commandWrapper.sh php /var/www/artisan migrate --path=vendor/gzero/cms/src/migrations/
```

 - You can also seed database with example data using this command
 
```
sudo docker exec -i -t platform_dev_web_1 ./commandWrapper.sh php /var/www/artisan db:seed --class="Gzero\Core\CMSSeeder"
```

 - Publish vendor assets
 
```
sudo docker exec -i -t platform_dev_web_1 ./commandWrapper.sh php /var/www/artisan vendor:publish --tag=public --force
```

 - Done
 
 To check progress on project development you can occasionally run composer install.

#### Stopping Docker
 If you want to stop docker just run:
 
  ```
  sudo docker-compose stop
  ```
  
  This will stop all running application containers
 
 ```
 Stopping platform_dev_web_1 ... done
 Stopping platform_dev_db_tests_1 ... done
 Stopping platform_dev_redis_1 ... done
 Stopping platform_dev_db_1 ... done
 ```
 
#### Viewing docker logs
  If you want to view logs from docker you can run:
   ```
   sudo docker-compose logs dev_web
   ```
   
#### Updating Docker container for platform
   To check for changes in Docker container for platform u can occasionally run  
   ```
  sudo docker-compose build --pull
   ```
  
## Testing

To run tests use:

```
composer test
```
