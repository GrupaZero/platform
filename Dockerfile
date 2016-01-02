FROM gzero/docker-platform:latest

MAINTAINER Adrian Skierniewski <adrian.skierniewski@gmail.com>

COPY . /var/www/

RUN chown www-data:www-data -R /var/www
