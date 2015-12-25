FROM ubuntu:14.04

MAINTAINER Adrian Skierniewski <adrian.skierniewski@gmail.com>

# Set correct environment variables
ENV HOME /root
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
    apt-get install -y software-properties-common && \
    LANG=C.UTF-8 add-apt-repository ppa:ondrej/php5-5.6 && \
    apt-get update && \
    apt-get install -y \
      curl \
      php5 \
      php5-cli \
      php5-gd \
      php5-json \
      php5-ldap \
      php5-mcrypt \
      php5-mysql

RUN php5enmod mcrypt

RUN /usr/bin/curl -sS https://getcomposer.org/installer | /usr/bin/php
RUN /bin/mv composer.phar /usr/local/bin/composer

ADD . /code

VOLUME ["/code"]

# Expose ports
EXPOSE 8000
