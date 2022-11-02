FROM php:8.1-fpm-bullseye

COPY php.ini /usr/local/etc/php/php.ini
COPY zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY composer_install.sh /tmp/
COPY composer.json /var/www/html/

RUN apt-get update &&       \
    apt-get upgrade -y &&   \
    apt-get install -y      \
        wget                \
        unzip               \
        libzip-dev          \
        libzstd-dev         \
        libfreetype6-dev    \
        libjpeg62-turbo-dev \
        libpng-dev          \
    && docker-php-ext-configure gd --with-freetype --with-jpeg      \
    && docker-php-ext-install -j$(nproc) gd                         \
    && docker-php-ext-configure zip                                 \
    && docker-php-ext-install -j$(nproc) zip                        \
    && docker-php-ext-configure pdo_mysql  --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install -j$(nproc) pdo_mysql                  \
    && pecl install xdebug-3.1.5                                    \
    && docker-php-ext-enable xdebug

RUN /bin/sh /tmp/composer_install.sh                                \
    && cd /var/www/html                                             \
    && composer install

EXPOSE 9033
