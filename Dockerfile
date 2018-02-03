FROM gzero/platform-container:v4

MAINTAINER Adrian Skierniewski <adrian.skierniewski@gmail.com>

COPY . /var/www/
COPY ./.server/nginx/site.conf /etc/nginx/conf.d/site.template

RUN chown www-data:www-data -R /var/www