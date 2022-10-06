#!/bin/bash

# Вспомогательный сценарий установки базовых пакетов (например, на случай возможных сбоев в работе provision-скрипта в Vagrantfile)
sudo apt-get update
sudo apt-get -y upgrade

sudo apt-get -y install vim
sudo apt-get -y install mc
sudo apt-get -y install curl
sudo apt-get -y install gnupg2
sudo apt-get -y install apt-transport-https
sudo apt-get -y install ca-certificates
sudo apt-get -y install software-properties-common

echo "Basic soft install is finished."
