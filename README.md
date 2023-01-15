https://otus.ru/lessons/php-basic/?utm_source=github&utm_medium=free&utm_campaign=otus
## Setup

Create container

```
docker-compose up --build -d
```

Locate the php-fpm containter's [name]

```
docker ps | grep php-fpm
```

Install composer dependencies

```
docker exec -it [name]-php-fpm-1 bash
cd /var/www/app
composer install
```
