FROM php:5.6-apache

MAINTAINER Fernando Mariano <fernando.mar16@gmail.com>

RUN apt-get update && apt-get install -y libmcrypt-dev libicu-dev libssl-dev git libpq-dev zlib1g-dev libzip-dev curl

# Install PHP Extensions
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install mcrypt
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-configure intl && docker-php-ext-install intl


# Install xdebug
RUN pecl install xdebug-2.5.5
RUN docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
