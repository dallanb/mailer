FROM php:7.2-fpm-alpine

# set work directory
WORKDIR /var/www/html

COPY src .


RUN php composer.phar u

RUN chown -R www-data:www-data /var/www/html