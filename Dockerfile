FROM gzero/docker-platform:v2

MAINTAINER Adrian Skierniewski <adrian.skierniewski@gmail.com>

COPY . /var/www/

RUN chown www-data:www-data -R /var/www
