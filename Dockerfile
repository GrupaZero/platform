FROM gzero/docker-platform:latest

MAINTAINER Adrian Skierniewski <adrian.skierniewski@gmail.com>

ADD . /var/www/

RUN chown www-data:www-data -R /var/www

VOLUME ["/var/www"]
