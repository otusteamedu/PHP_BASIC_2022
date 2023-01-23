https://otus.ru/lessons/php-basic/?utm_source=github&utm_medium=free&utm_campaign=otus

## Setup

1. Fill the config settings in App/config/config.ini.example according to your own and save the file as config.ini

2. Create container

```
docker-compose up --build -d
```

3. Locate the php-fpm containter's [name]

```
docker ps | grep php-fpm
```

4. Install composer dependencies

```
docker exec -it [name]-php-fpm-1 bash
cd /var/www/app
composer install
```
