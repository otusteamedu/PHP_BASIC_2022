#!/bin/bash

# Перенос файлов проекта web-сайта из разделяемого раздела типа vboxfs в /var/www
# Данный перенос требуется по причине ошибок в чтении web-сервером nginx файлов статического контента, если они находятся на виртуальном разделе типа vboxfs

cp -rn /shared/www/htdocs/* /var/www/