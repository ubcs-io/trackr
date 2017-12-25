#!/usr/bin/env bash
# THIS FILE IS USED TO CONFIGURE SETTINGS FOR YOUR VM
# IT IS BAD TO CHANGE THIS FILE WHILE YOUR VM IS RUNNING

# path to you host machines hosts file
# Windows 10 default : /c/Windows/System32/drivers/etc/hosts
# Mac OSX default: /private/etc/hosts
hosts_file="/private/etc/hosts"

# This is the your VM's hostname
hostname="lamp-1"

# This is the static IP that will be used for your VM
# This ip wil overwrite existing hosts using this IP in your hosts file
static_ip="192.168.50.69"

# Shared/Synced Folders
# Each of the specified folders in the host_directories array
# will be mapped to their corresponding index in guest_directories
# host directories can be a path relative to this project directory
# guest directories ,ust be specified with an absolute path
host_folders[0]="/Users/RomanRheingans/documents/projects/trackr/html"
guest_folders[0]="/var/www/html/www.trackr-dev.com/public_html"


# APACHE2 SETTINGS

# Apache root directory
apache_root="/var/www/html"

# These are the domain names that your hosts file will direct to the above IP
# Add aliases of an existing site with a space seperated list in an existing index
# Add a new index for a new site
domains[0]="www.trackr-dev.com trackr-dev.com"

# Admin email address
admin_address="admin@trackr-dev.com"


# MYSQL

# Your MySQL root password
mysql_password="userpassword"