#!/usr/bin/env bash

echo "Sourcing Config File"
source /vagrant/config/vm_config.sh
if [ ! "$static_ip" ]
then
  exit 1
fi

echo "Begin Prvoisioning"

sudo mkdir /vagrant/config/prov_files/logs

echo "Updating apt"
sudo apt-get -qq update &> /vagrant/config/prov_files/logs/startup_log.log

echo "Installing Expect"
sudo apt-get -qq install expect &> /vagrant/config/prov_files/logs/startup_log.log

echo "Installing curl"
sudo apt-get -qq install curl -y &> /vagrant/config/prov_files/logs/startup_log.log

echo "Installing sed"
sudo apt-get -qq install sed &> /vagrant/config/prov_files/logs/startup_log.log

echo "Installing apache2"
sudo apt-get -qq install -y apache2 &> /vagrant/config/prov_files/logs/startup_log.log
sudo apache2ctl configtest

echo "CURRENT FIREWALL SETTINGS"
sudo ufw app list
sudo ufw app info "Apache Full"

echo "Installing MySQL"
pass1="mysql-server mysql-server/root_password password $mysql_password"
pass2="mysql-server mysql-server/root_password_again password $mysql_password"
debconf-set-selections <<< $pass1
debconf-set-selections <<< $pass2
sudo apt-get -qq install -y mysql-server &> /vagrant/config/prov_files/logs/startup_log.log

# Create the database and load the backup files for dev
echo "Creating Database"
echo "CREATE DATABASE trackr_record" | sudo mysql -u root -p"$mysql_password"

echo "Backfilling data"
sudo mysql -u root -p"$mysql_password" trackr_record < /vagrant/config/prov_files/trackr.sql


echo "Installing PHP7"
sudo apt-add-repository ppa:ondrej/php &> /vagrant/config/prov_files/logs/startup_log.log
sudo apt-get -qq update &> /vagrant/config/prov_files/logs/startup_log.log
sudo apt-get -qq install php7.0 -y &> /vagrant/config/prov_files/logs/startup_log.log
sudo apt-get -qq install php-curl -y &> /vagrant/config/prov_files/logs/startup_log.log
sudo apt-get -qq install php7.0-mysql -y &> /vagrant/config/prov_files/logs/startup_log.log

echo "Replacing/Reworking configuration files"
sudo cp /vagrant/config/prov_files/dir.conf /etc/apache2/mods-enabled/dir.conf
sudo cp /vagrant/config/prov_files/php.ini  /etc/php/7.0/apache2/php.ini
#sudo rm /var/www/html/index.html
#sudo cp /vagrant/config/prov_files/index.php /var/www/html

echo "Configuring VirtualHosts.."
for domain in "${domains[@]}"
do
  echo
  
  IFS=' ' read -r -a sites <<< "$domain"

  echo "Creating site directory for ${sites[0]}"
  site_root="$apache_root/${sites[0]}/public_html"
  sudo mkdir -p "$site_root"
  echo "$site_root"
  echo

  echo "Constructing VirtualHost file for ${sites[0]}"
  sudo cp /vagrant/config/prov_files/vhost_template.sh "${sites[0]}".conf

  echo "Setting ServerAdmin: $admin_address"
  sed -i "s/ServerAdmin.*/ServerAdmin $admin_address/" "${sites[0]}".conf

  echo "Setting ServerName: ${sites[0]}"
  sed -i "s/ServerName.*/ServerName ${sites[0]}/" "${sites[0]}".conf

  if [ ${sites[1]} ]
  then
    echo "Setting ServerAlias: ${sites[*]:1}"
    sed -i "s/ServerAlias.*/ServerAlias ${sites[*]:1}/" "${sites[0]}".conf
  else
    sed -i "/ServerAlias.*/d" "${sites[0]}".conf
  fi

  echo "Setting DocumentRoot: $site_root"
  sed -i "s^DocumentRoot.*^DocumentRoot $site_root^" "${sites[0]}".conf

  sudo mv "${sites[0]}".conf /etc/apache2/sites-available/"${sites[0]}".conf

  #sudo cp /vagrant/config/prov_files/index.php "$site_root"

  sudo a2ensite "${sites[0]}".conf

  echo
done

echo "Enable mod rewrite"
sudo a2enmod rewrite

echo "Restarting Apache2 Service"
sudo service apache2 restart

echo "MySQL Root Password: $mysql_password"
