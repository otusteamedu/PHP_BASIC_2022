Курс: "PHP Basic 2022"

Студент: Д.С. Понятов

Домашняя работа по уроку 14 "Функции".

Домашнее задание выполнено на основе виртуальной машины Vagrant+docker.

После первого подъёма виртуальной машины автоматически запускается проект docker-compose с контейнерами веб-сервера nginx и движком PHP-FPM 8 версии. Проект находится в директории /home/vagrant/docker.
После запуска docker-контейнеров становятся доступными сайты http://localhost:8033/. Код функций находится в директории src.
Cледует учесть то обстоятельство, что загрузка образа из VagrantCloud из-за санкций возможна только при работе через VPN (возможно потребуется также отключить антивирус). Также возможен вариант ручной предварительной загрузки файла образа и последующей его локальной установки командой vagrant box add и редактирование параметра config.vm.box в Vagrantfile.

В папке screenshots можно посмотреть скриншоты с результатами выполнения пунктов ДЗ.