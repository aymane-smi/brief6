FROM php:7.4-apache
RUN a2enmod rewrite && service apache2 restart
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www/html