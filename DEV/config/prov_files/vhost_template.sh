<VirtualHost *:80>
    ServerAdmin admin@gmail.com
    ServerName www.example.com
    ServerAlias example.com x-ample.com
    DocumentRoot /var/www/html/www.example.com/public_html
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
