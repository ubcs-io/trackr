# Automatic setup of a local VM LAMP stack

--Windows 10 and Mac OSX supported

If you are in Windows 10 Environment you will need to execute all scripts after opening `bash` in your shell.

© 2017 John Hutcheson, The Research Group

## Requirements

* Windows 10/ Mac OSX

* Vagrant

* VirtualBox

## First Steps

You will need to install the latest compatible version of [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

You will need to install Vagrant following the steps on this [page](https://www.vagrantup.com/intro/getting-started/install.html).

This setup will require write access to you computers hosts file in order to configure hosts. Please make sure this is not a read-only file.

Next you will need to set up your configuration file, found at `config/vm_config.sh`

### Configuration Settings:

 - `hosts_file`: This should be set to the location of you host machines hosts file. You will need to make sure that you have permissions to write to and edit this file.

 - `hostname`: This will be the hostname for the guest machine.

 - `static_ip`: This is the IP that will be used associated with your VM

 - `host_folders[] & guest_folders[]`: These arrays are set for the shared folders between your host and guest machine. each index in host_folders[] will be associated with the corresponding index in guest_folders[]

 - `apache_root`: The root directory setting for apache, where new sites will be stored.

 - `domains[]`: An array of domains that apache will configure as seperate sites on startup. Site aliases can be added to a single index as a space separated list.

 - `admin_address`: The admin email address that will be used for your virtual hosts

 - `mysql_password`: MySQL root user password

### Global PHP Settings:

There is a PHP.ini file found at `config/prov_files/PHP.ini` that will be mounted as the PHP configuration file for you VM. Go ahead and make changes as need to this file for your project.

## Starting Your Machine

There is no need to `Vagrant up` as the setup script will take care of this.

Once both Vagrant & VirtualBox are installed and your config file is set up the way you want it, our next step is to run `script/start`. You may be prompted for you host machines user password. The machine should boot and you should see a lot of output concerning the provisioning of your machine. Notably some of the output is red, even though nothing is wrong. Just ignore it... unless it looks REALLY bad.

Once done the setup script should inform you it is finished. You should then be able to point your browser at any of the domains you set in the config file and see the php info page.

## Stopping your machine

There is no need for `Vagrant destroy`, as that is handled in the shutdown script.

To shutdown your box run `script/shutdown`. If hosts associated with the boxes static IP are found you will be prompted to remove them from the hosts file.
