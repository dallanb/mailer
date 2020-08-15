FROM composer as builder

WORKDIR /app

COPY public ./public
COPY src ./src
COPY composer.json ./composer.json
COPY manage.php ./manage.php

RUN composer install

####
FROM php:7.2-fpm-alpine

# set work directory
WORKDIR /home/app

COPY --from=builder /app/. /home/app/.

RUN chown -R www-data:www-data /home/app
