FROM gzero/docker-platform:latest

MAINTAINER Adrian Skierniewski <adrian.skierniewski@gmail.com>

ADD . /var/www/

VOLUME ["/var/www"]
