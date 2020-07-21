FROM php:7.2-fpm-alpine

# set work directory
RUN mkdir -p /home/app
WORKDIR /home/app

COPY src .

RUN php composer.phar require slim/slim:3.*

COPY build/bin ../build/bin

ENTRYPOINT ["sh", "../build/bin/entrypoint.sh"]