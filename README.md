Курс: "PHP Basic 2022"

Студент: Д.С. Понятов

Домашняя работа по уроку 19 "Сессии и cookie".

Домашнее задание выполнено на основе виртуальной машины Vagrant+docker.

После первого подъёма виртуальной машины автоматически запускается проект docker-compose с контейнерами веб-сервера nginx и движком PHP-FPM 8 версии.

После запуска docker-контейнеров становится доступным сайт http://localhost:8033/.

Проект docker-compose на guest-машине находится в директории /shared/docker.

В репозитории код сайта находится в директории /site/www/html/.

В папке screenshots находятся скриншоты страницы фотогалереи.

В случае ошибок установки системных библиотек и/или docker в ходе выполнения provision-скрипта следует потом после входа в shell вручную выполнить сценарии установки /shared/user_config/basic_soft_install.bash и/или /shared/user_config/docker_install.bash.

В случае несрабатывания установки зависимостей composer install в ходе запуска docker-compose-проекта следует после входа в shell перейти в директорию docker-compose-проекта и выполнить вручную команду docker compose exec php composer install.

Cледует учесть то обстоятельство, что загрузка образа из VagrantCloud из-за санкций возможна только при работе через VPN (возможно потребуется также отключить антивирус). Также возможен вариант ручной предварительной загрузки файла образа и последующей его локальной установки командой vagrant box add и редактирование параметра config.vm.box в Vagrantfile.
