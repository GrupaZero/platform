## GZERO CMS PLATFORM [![Build Status](https://travis-ci.org/GrupaZero/platform.png?branch=master)](https://travis-ci.org/GrupaZero/platform) [![Coverage Status](https://coveralls.io/repos/GrupaZero/platform/badge.svg?branch=master&service=github)](https://coveralls.io/github/GrupaZero/platform?branch=master)

GZERO CMS PLATFORM it's a base to build custom application on GZERO CMS

**The project uses [Docker](https://www.docker.com/what-docker) containers to package entire application with all of its dependencies into a standardized unit.**

**The project uses [Ansible](https://www.ansible.com/how-ansible-works) automation engine to deploy entire application.**
## Installation

Use composer to create new project:

```
composer create-project --prefer-dist gzero/platform platform
```

##### Directories permissions

Set permissions to storage & bootstrap cache:

```
chmod 777 -R storage/
chmod 777 -R bootstrap/cache/
chmod 777 -R uploads/
chmod 777 -R public/
```

_[optional]_

If you have www-data group in your system you can consider adding you to it.
This will allow you to write to files created by php due to umask 002 set in dev mode.

```
sudo usermod -a -G www-data user

```

##### Generate application key

```
./develop artisan key:genarate
```

##### Environment Configuration.

Environment configuration is stored in .env file (copied from .env.example during create-project stage).
 
##### Setting the local domains

For proper communication with the API is required to modify the hosts file in your OS.
In Ubuntu hosts file should looks like the following:

```
# /etc/hosts
127.0.0.1 localhost
...
127.0.0.1 dev.gzero.pl
127.0.0.1 api.dev.gzero.pl
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
Starting platform_db_1
Starting platform_redis_1
Starting platform_db_tests_1
Starting platform_web_1
```
 
- Create database schema and required data
 
```
./develop artisan migrate
```

- You can also seed database with example data using this command
 
```
./develop artisan db:seed --class='Gzero\\Cms\\CMSSeeder'
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
Stopping platform_web_1 ... done
Stopping platform_db_tests_1 ... done
Stopping platform_redis_1 ... done
Stopping platform_db_1 ... done
```
 
To remove stopped containers run:
 
```
./develop rm
```
 
#### Viewing docker logs
If you want to view logs from docker you can run:

```
./develop logs web
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
./develop test-debug # it runs xdebug
./develop test-frontend
```

## Working on frontend

Install required npm modules:

```
./develop npm install
```

To run webpack:

```
./develop npm run dev
```
  or
```
./develop npm run watch
```

## Testing on frontend

To run only ava tests:

```
./develop npm test
```
  or
```
./develop npm run test:watch
```

To run only eslint:

```
./develop npm lint
```
  or
```
./develop npm run lint:watch
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

Some example usages:
```
ansible-playbook -i staging provision.yml 
```
```
ansible-playbook -i staging deploy-stack.yml \
 -e "APP_ENV='$(cat example.env)'"
 -e DOMAIN=docker-test.example.com \
 -e LETSENCRYPT_EMAIL=office@example.com \
 -e DB_NAME=gzero_cms \
 -e DB_USER=gzero_cms \
 -e DB_PASSWORD=test \
 -e GITLAB_REPO=example/project
```
```
ansible-playbook -i staging deploy-app.yml \
 -e TAG=0.0.5 \
 -e GITLAB_REPO=example/project \
 -e "APP_ENV='$(cat example.env)'"
```