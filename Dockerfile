# use the official PHP image as base image
FROM php:7.4-apache
# copy the Composer PHAR from the Composer image into the PHP image
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY mysites.conf /etc/apache2/sites-enabled/000-default.conf
# Run composer as root
# ENV COMPOSER_ALLOW_SUPERUSER 1
# show that both Composer and PHP run as expected
RUN composer --version && php -v
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
RUN apt-get update && apt-get upgrade -y

# Make directories browseable
# COPY 0000-Default.conf /etc/apache2/sites/0000-Default.conf
