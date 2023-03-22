FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git \
    libicu-dev g++ libxml2-dev build-essential libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var/www

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
