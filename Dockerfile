FROM php:8-fpm
RUN apt-get update && docker-php-ext-install pdo_mysql && apt -y install unzip

# copy composer from compser image
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer


