# FROM php:7.4-apache
FROM php:8.1-apache

ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/

RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libzip-dev \
    libpng-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli zip mbstring && \
		pecl install xdebug && \
    docker-php-ext-enable xdebug

RUN  a2enmod rewrite
