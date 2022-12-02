Vagrant.configure("2") do |config|
  config.vm.box = "generic/debian11"
  
  config.vm.network "forwarded_port", host: 3306, guest: 3306, id: "mariadb"
  config.vm.network "forwarded_port", host: 8033, guest: 8033, id: "www"

  config.vm.synced_folder "./", "/shared", owner: "vagrant",  group: "vagrant", mount_options: ["dmode=775", "fmode=664"]

  config.vm.provision "shell", inline: <<-SHELL
    TZ=Europe/Moscow
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
    
    cp -pf /shared/provision/vagrant_bashrc ~vagrant/.bashrc
    cp -pf /shared/provision/.bash_aliases ~vagrant/.bash_aliases
    cp -pf /shared/provision/.selected_editor ~vagrant/.selected_editor
    cp -pf /shared/provision/.vimrc ~vagrant/.vimrc
    cp -pfr /shared/app ~vagrant/app/
    echo "User vagrant config ok..."
    
    apt-get update
    apt-get -y upgrade
    apt-get -y install vim
    apt-get -y install mc
    apt-get -y install curl
    apt-get -y install gnupg2
    apt-get -y install apt-transport-https
    apt-get -y install ca-certificates
    apt-get -y install software-properties-common
    echo "Basic packages install is finished..."
    
    mkdir -p /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/debian/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
    chmod a+r /etc/apt/keyrings/docker.gpg
    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian \
      $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null
    apt-get update && apt-get install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin && usermod -aG docker vagrant
    
    docker run hello-world
  SHELL
end
