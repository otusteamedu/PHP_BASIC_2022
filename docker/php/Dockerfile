FROM php:8.1-fpm-bullseye

RUN apt-get update &&       \
    apt-get upgrade -y &&   \
    apt-get install -y      \
        wget                \
        unzip               \
        libzip-dev          \
        libzstd-dev         \
    && docker-php-ext-configure zip                                 \
    && docker-php-ext-install -j$(nproc) zip                        \
    && docker-php-ext-configure pdo_mysql  --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install -j$(nproc) pdo_mysql                  \
    && pecl install xdebug-3.1.6                                    \
    && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
