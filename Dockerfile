FROM php:8-fpm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

