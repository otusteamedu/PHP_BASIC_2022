FROM php:8.1-fpm-bullseye
COPY php.ini /usr/local/etc/php/php.ini
COPY zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY composer_install.sh /tmp/
RUN apt-get update &&     \
    apt-get upgrade -y && \
    apt-get install -y    \
        wget              \
        unzip             \
        libzip-dev        \
        libzstd-dev       \
    && docker-php-ext-configure zip          \
    && docker-php-ext-install -j$(nproc) zip \
    && pecl install xdebug-3.1.5             \
    && docker-php-ext-enable xdebug          \
    && /bin/sh /tmp/composer_install.sh      \
    && composer global require --dev "squizlabs/php_codesniffer=*"

EXPOSE 9033