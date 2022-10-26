Курс: "PHP Basic 2022"

Студент: Д.С. Понятов

Домашняя работа по уроку 17 "Фотогалерея".

Домашнее задание выполнено на основе виртуальной машины Vagrant+docker.

После первого подъёма виртуальной машины автоматически запускается проект docker-compose с контейнерами веб-сервера nginx и движком PHP-FPM 8 версии.

После запуска docker-контейнеров становятся доступными сайты http://localhost:8033/.

Проект docker-compose на guest-машине находится в директории /home/vagrant/docker.

В репозитории код сайта находится в директории /shared/docker/site/www/html/.

В папке screenshots находятся скриншоты страницы фотогалереи.


Cледует учесть то обстоятельство, что загрузка образа из VagrantCloud из-за санкций возможна только при работе через VPN (возможно потребуется также отключить антивирус). Также возможен вариант ручной предварительной загрузки файла образа и последующей его локальной установки командой vagrant box add и редактирование параметра config.vm.box в Vagrantfile.
