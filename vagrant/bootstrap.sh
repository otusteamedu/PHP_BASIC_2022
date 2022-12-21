#!/usr/bin/env bash

# Variables path
php_config_file="/etc/php5/apache2/php.ini"
xdebug_config_file="/etc/php5/mods-available/xdebug.ini"
mysql_config_file="/etc/mysql/my.cnf"
apache_config_file="/etc/apache2/apache2.conf"
host_document_root="/home/vagrant"
apache_document_root="/var/www/html"
apache_ports_config_file="/etc/apache2/ports.conf"
project_folder_name='public'

# Variables env
DBNAME=vagrant
DBUSER=vagrant
DBPASSWD=vagrant

echo "--- Начало установки ---"

echo "--- Обновление списка пакетов ---"
apt-get -qq upd ate

echo "--- Установка базовых пакетов ---"
apt-get -y install vim curl build-essential python-software-properties git

echo "--- Обновление списка пакетов ---"
apt-get upd ate

echo "--- Установка Apache2 ---"
apt-get install -y apache2

echo "--- Установка MySql ---"
echo "mysql-server mysql-server/root_password password ${DBPASSWD}" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again password ${DBPASSWD}" | debconf-set-selections
echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | debconf-set-selections
echo "phpmyadmin phpmyadmin/app-password-confirm password ${DBPASSWD}" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass password ${DBPASSWD}" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass password ${DBPASSWD}" | debconf-se t-selections
echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none" | debconf-se t-selections
apt-get -y install mysql-server-5.5 mysql-client phpmyadmin

mysql -uroot -p${DBPASSWD} -e "CRE ATE   DATABASE ${DBNAME}"
mysql -uroot -p${DBPASSWD} -e "grant all privileges on $DBNAME.* to '${DBUSER}'@'localhost' identified by '${DBPASSWD}'"

echo "--- Установка репозиториев ---"
add-apt-repository ppa:ondrej/php5

#uncomment to install NodeJS
#add-apt-repository ppa:chris-lea/node.js

apt-get -qq update

echo "--- Установка PHP ---"
apt-get install -y php5 libapache2-mod-php5 php5-curl php5-gd php5-mcrypt php5-mysql php-apc

echo "--- Установка и конфигурация xDebug ---"
apt-get install -y php5-xdebug

cat << EOF | sudo tee -a ${xdebug_config_file}
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

echo "--- Включение mod-rewrite ---"
a2enmod rewrite

echo "--- Установка root папки---"
sudo rm -rf ${apache_document_root}
sudo ln -fs ${host_document_root}/${project_folder_name} ${apache_document_root}

echo "--- Настройка php.ini и apache2.conf ---"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" ${php_config_file}
sed -i "s/display_errors = .*/display_errors = On/" ${php_config_file}

#uncomment to work with Boris
#echo "--- Работа с Boris---"
#sed -i "s/disable_functions = .*//" /etc/php5/cli/php.ini

sudo sed -i 's/AllowOverride None/AllowOverride All/g' ${apache_config_file}

a2enconf phpmyadmin

echo "--- Перезагрузка Apache2 ---"
service apache2 restart

echo "--- Перезагрузка mysql ---"
service mysql restart

#echo "--- Установка composer ---"
#uncomment to install coomposer
#curl --silent https://getcomposer.org/installer | php
#mv composer.phar /usr/local/bin/composer

#echo "--- Установка NodeJS и NPM ---"
#uncomment to install NodeJS NPM
#apt-get -y install nodejs
#curl --silent https://npmjs.org/install.sh | sh

#echo "--- Установка Gulp, Bower ---"
#uncomment to install Gulp and Bower
#npm install -g gulp bower

#echo "--- Обновление компонентов проекта ---"
#uncomment to update packages
#cd /vagrant
#sudo -u vagrant -H sh -c "composer install"
#cd /vagrant/client
#sudo -u vagrant -H sh -c "npm install"
#sudo -u vagrant -H sh -c "bower install -s"
#sudo -u vagrant -H sh -c "gulp"