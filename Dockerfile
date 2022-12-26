FROM php:7.4-apache
RUN a2enmod rewrite && service apache2 restart
WORKDIR /var/www/html