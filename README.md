https://otus.ru/lessons/php-basic/?utm_source=github&utm_medium=free&utm_campaign=otus
https://otus.ru/lessons/php-basic/?utm_source=github&utm_medium=free&utm_campaign=otus

## Setup

1. Create container

```
docker-compose up --build -d
```

2. Locate the php-fpm containter's [name]

```
docker ps | grep php-fpm
```

3. Install composer dependencies

```
docker exec -it [name]-php-fpm-1 bash
cd /var/www/app
composer install
```
