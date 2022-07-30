FROM php:8

RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl curl libonig-dev zip libzip-dev
RUN pecl install xdebug mcrypt
RUN docker-php-ext-install pdo_mysql mbstring zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
