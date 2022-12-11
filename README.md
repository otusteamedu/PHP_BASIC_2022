Курс: "PHP Basic 2022"

Студент: Д.С. Понятов

Домашняя работа пл теме "MVC"

Код веб-проложения находится в директории app. Проект docker-compose - в директории docker.

В системном файле hosts предварительно необходимо внести запись о доменном имени сайта: 
127.0.0.1 tasktracker.localdomain

После запуска docker-compose-проекта необходимо выполнить установку зависимостей из composer.json: 
docker compose exec php composer install

Сайт должен быть доступен по адресу http://tasktracker.localdomain:8033/
