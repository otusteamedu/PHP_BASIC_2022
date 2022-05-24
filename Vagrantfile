# -*- mode: ruby -*-
# vi: set ft=ruby :

$bootstrap = <<-SHELL
        apt-get -y update
        apt-get -y upgrade
        apt-get -y install software-properties-common
        add-apt-repository ppa:ondrej/php -y
        apt-get -y install php8.1-fpm php8.1-pdo php8.1-mysql php8.1-mbstring php8.1-xml php8.1-cli
        apt-get -y install nginx
        apt-get -y install mysql-server mysql-client
        sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf
        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
        php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
        php composer-setup.php
        php -r "unlink('composer-setup.php');"
        mv composer.phar /usr/local/bin/composer
        mkdir -p /var/www/app
        service mysql restart
SHELL


Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/focal64"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 3306, host: 3306
  config.vm.network "private_network", ip: "192.168.33.100"
  config.vm.synced_folder "www/", "/var/www/app"
  config.vm.synced_folder "nginx_conf/", "/etc/nginx/conf.d"

  config.vm.provision "shell", inline: $bootstrap
end