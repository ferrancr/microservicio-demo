# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty32"
  config.vm.provision "shell", path: "provision/vagrant_boot.sh"
  config.vm.synced_folder "./html/", "/var/www/microservicio/html", create: true, group: "www-data", owner: "www-data"
  config.vm.synced_folder "./framework/", "/var/www/microservicio/framework", create: true, group: "vagrant", owner: "vagrant"
  config.vm.network "private_network", ip: "10.1.1.2"
  # Tras la instalacion se instala el slim en el subdirectorio framewoek.
  config.vm.provision "framework-Slim-PHP" , type: "shell" do |s|
        s.path = "provision/vagrant_framework.sh"
        s.privileged = false
  end
end
