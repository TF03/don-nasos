# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"
Vagrant.require_version ">= 1.7.2"

# OPTIONS
require 'yaml'
options = YAML.load_file File.join(File.dirname(__FILE__), 'vagrant.yaml')

#detect environment variables
host_os = RbConfig::CONFIG['host_os']
vagrant_command = ARGV[0]

if vagrant_command == "up"
  # check and install required Vagrant plugins
  required_plugins = %w( vagrant-vbguest vagrant-hostsupdater )
  required_plugins.each do |plugin|
    if Vagrant.has_plugin? plugin
      # system "echo OK: #{plugin} already installed."
    else
      system "echo Required plugin isn't installed: #{plugin} ..."
      system "vagrant plugin install #{plugin}"
    end
  end

  # install nfs-kernel-server in Linux to support synced_folder via nfs
  if host_os =~ /linux/
    system "sudo apt-get install nfs-kernel-server nfs-common rpcbind ifupdown"
  end
end

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.boot_timeout = options['vm']['boot_timeout']
  config.vm.box = options['vm']['box']

  if options['vm']['box_url'] && options['vm']['box_url'].strip.empty? == false
    config.vm.box_url = options['vm']['box_url']
  end

  config.vm.box_check_update = options['vm']['check_update']
  config.vm.network "private_network", ip: options['network']['private_ip']

  if options['network']['http_port']
    config.vm.network "forwarded_port", guest: 80, host: options['network']['http_port'], auto_correct: true
  end

  if (options['host']['aliases'] && options['host']['aliases'].empty? == false)
    config.vm.post_up_message = "Your machine is up and running \n\r Navigate to http://#{options['host']['aliases'] * ', http://'}"
  end

  # share synced_folder via nfs for Mac nd Linux
  if host_os =~ /linux/
    config.vm.synced_folder options['sync']['synced_folder'], options['sync']['vagrant_folder'], type: "nfs", mount_options:['nolock,vers=3,udp,noatime,actimeo=1']

    if (options['sync']['second_synced_folder'] &&
      options['sync']['second_vagrant_folder'] &&
      options['sync']['second_synced_folder'].strip.empty? == false &&
      options['sync']['second_vagrant_folder'].strip.empty? == false)
      config.vm.synced_folder options['sync']['second_synced_folder'], options['sync']['second_vagrant_folder'], type: "nfs", mount_options:['nolock,vers=3,udp,noatime,actimeo=1']
    end
  else
    config.vm.synced_folder options['sync']['synced_folder'], options['sync']['vagrant_folder'], owner: "www-data", group: "www-data"

    if (options['sync']['second_synced_folder'] &&
      options['sync']['second_vagrant_folder'] &&
      options['sync']['second_synced_folder'].strip.empty? == false &&
      options['sync']['second_vagrant_folder'].strip.empty? == false)
      config.vm.synced_folder options['sync']['second_synced_folder'], options['sync']['second_vagrant_folder'], owner: "www-data", group: "www-data"
    end
  end

  # PLUGINS
  # Set entries in hosts file
  # https://github.com/cogitatio/vagrant-hostsupdater
  config.vm.hostname = options['host']['name']
  config.hostsupdater.remove_on_suspend = true
  if (options['host']['aliases'] && options['host']['aliases'].empty? == false)
    config.hostsupdater.aliases = options['host']['aliases']
  end

  memory = options['vm']['memory']
  cpus = options['vm']['cpus']
  # auto - Use all CPU cores and 1/4 system memory
  if options['vm']['memory'] == 'auto'
    # Give VM 1/4 system memory
    if host_os =~ /darwin/
      # sysctl returns Bytes and we need to convert to MB
      memory = `sysctl -n hw.memsize`.to_i / 1024 / 1024 / 4
    elsif host_os =~ /linux/
      # meminfo shows KB and we need to convert to MB
      memory = `grep 'MemTotal' /proc/meminfo | sed -e 's/MemTotal://' -e 's/ kB//'`.to_i / 1024 / 4
    else # sorry Windows folks, I can't help you
      memory = 2048
    end
  end
  if options['vm']['cpus'] == 'auto'
    # Give VM access to all cpu cores on the host
    if host_os =~ /darwin/
      cpus = `sysctl -n hw.ncpu`.to_i
    elsif host_os =~ /linux/
      cpus = `nproc`.to_i
    else # sorry Windows folks, I can't help you
      cpus = 2
    end
  end

  # Configure some Virtual Box params
  config.vm.provider "virtualbox" do |vb|
    vb.name = options['vm']['name']
    vb.cpus = cpus
    vb.memory = memory
    vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
    vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    vb.customize ["modifyvm", :id, "--cpuexecutioncap", options['vm']['cpuexecutioncap']]
    vb.customize ['modifyvm', :id, '--cableconnected1', 'on']
  end

  # PROVISIONING
  # Ansible
  # To use Ansible provisioning you should have Ansible installed on your host machine
  # see here http://docs.ansible.com/intro_installation.html#installing-the-control-machine
  config.vm.provision "ansible" do |ansible|
    ansible.limit = "all"
    ansible.playbook = options['ansible']['playbook']
    ansible.inventory_path = options['ansible']['inventory_path']
    # set to 'vvvv' for debug output in case of problems or leave it false
    #ansible.verbose = 'vvvv'
    ansible.host_key_checking = false
  end
end
