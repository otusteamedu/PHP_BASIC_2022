FROM php:8.1-fpm-bullseye
COPY composer_install.sh /tmp/
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini && \
    apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y      \
        wget                \
        unzip               \
        libfreetype6-dev    \
        libjpeg62-turbo-dev \
        libpng-dev          \
        libzip-dev          \
        libzstd-dev         \
        libicu-dev          \
        libpq-dev           \
    && docker-php-ext-configure gd --with-freetype --with-jpeg  \
    && docker-php-ext-install -j$(nproc) gd                     \
    && docker-php-ext-configure zip                             \
    && docker-php-ext-install -j$(nproc) zip                    \
    && docker-php-ext-configure bcmath                          \
    && docker-php-ext-install -j$(nproc) bcmath                 \
    && docker-php-ext-configure calendar                        \
    && docker-php-ext-install -j$(nproc) calendar               \
    && docker-php-ext-configure intl                            \
    && docker-php-ext-install -j$(nproc) intl                   \
    && docker-php-ext-configure pdo_pgsql                       \
    && docker-php-ext-install -j$(nproc) pdo_pgsql              \
    && pecl install igbinary-3.2.7                              \
    && pecl install redis-5.3.7                                 \
    && pecl install xdebug-3.1.5                                \
    && docker-php-ext-enable igbinary redis xdebug              \
    && /bin/sh /tmp/composer_install.sh
