FROM php:7.2-fpm-alpine

# set work directory
WORKDIR /home/app
RUN chown -R www-data:www-data /home/app

COPY public ./public
COPY src ./src
COPY composer.json ./composer.json
COPY composer.phar ./composer.phar
COPY manage.php ./manage.php

RUN php composer.phar u

