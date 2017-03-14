## GZERO CMS PLATFORM [![Build Status](https://travis-ci.org/GrupaZero/platform.png?branch=master)](https://travis-ci.org/GrupaZero/platform) [![Coverage Status](https://coveralls.io/repos/GrupaZero/platform/badge.svg?branch=master&service=github)](https://coveralls.io/github/GrupaZero/platform?branch=master)

GZERO CMS PLATFORM it's a base to build custom application on GZERO CMS

**[VIEW DEMO](https://staging.gzero.pl/en)** - you can log in with this credentials:

```
login: admin@gzero.pl
pass: test
```

**The project is still in the phase of intensive development**

**The project uses [Docker](https://www.docker.com/what-docker) containers to package entire application with all of its dependencies into a standardized unit.**

**The project uses [Ansible](https://www.ansible.com/how-ansible-works) automation engine to deploy entire application.**
## Installation

Use composer to create new project:

```
composer create-project --prefer-dist gzero/platform platform dev-master
```

##### Directories permissions

Set permissions to storage & bootstrap cache:

```
sudo chmod 777 -R storage/
sudo chmod 777 -R bootstrap/cache/
sudo chmod 777 -R public/
```

_[optional]_

If you have www-data group in your system you can consider adding you to it.
This will allow you to write to files created by php due to umask 002 set in dev mode.

```
sudo usermod -a -G www-data user

```

##### Environment Configuration.

Environment configuration is stored in .env file (copied from .env.example during create-project stage).
 
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
After Installing Docker Engine you need to start docker containers, go to project directory and run:

- Start Docker containers
 
```
./develop up -d
```
  
This will run all application containers (give some time to ssl certs to generate)
 
```
Starting platform_db_server_1
Starting platform_redis_server_1
Starting platform_db_tests_server_1
Starting platform_web_server_1
```
 
- Create database schema and required data __(NOTICE: container uses directory name without _ as a prefix)__
 
```
./develop artisan migrate
```
 
- Create laravel passport oauth keys & db entries
 
```
./develop artisan passport:client --personal
./develop artisan passport:client --password
```

- You can also seed database with example data using this command
 
```
./develop artisan db:seed --class="Gzero\Core\CMSSeeder"
```

- You may want to publish vendor assets as well
 
```
./develop artisan vendor:publish --tag=public --force
```

 - Done
 
#### Stopping Docker
If you want to stop docker containers just run:

```
./develop stop
```

This will stop all running application containers
 
```
Stopping platform_web_server_1 ... done
Stopping platform_db_tests_server_1 ... done
Stopping platform_redis_server_1 ... done
Stopping platform_db_server_1 ... done
```
 
To remove stopped containers run:
 
```
./develop rm
```
 
#### Viewing docker logs
If you want to view logs from docker you can run:

```
./develop logs web_server
```
   
#### Updating Docker container for platform
To check for changes in Docker containers for platform u can occasionally run  

```
./develop pull
```
  
## Testing

To run tests use:

```
./develop test
```

## Working on frontend

Install required npm modules:

```
./develop npm install
```

To use gulp:

```
./develop gulp {command}
```

## Updating composer dependencies

You can run composer directly from docker:

```
./develop composer update
```

## Continuous Integration

We're providing some boilerplate configs for travis & gitlab-ci so that you can modify them to match your requirements.
 
## Deployment

We're using Ansible as automation tool. We include some example playbooks.