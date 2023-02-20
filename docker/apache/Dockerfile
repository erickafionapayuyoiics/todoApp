FROM php:8.1-apache

COPY ./conf/*.conf /etc/apache2/sites-enabled/

RUN apt-get update \
  && apt-get install -y libzip-dev zlib1g-dev libpq-dev mariadb-client libmagick++-dev libmagickwand-dev libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev unzip \
  && docker-php-ext-install zip pdo_mysql mysqli exif \
  && docker-php-ext-enable mysqli

COPY --from=composer:2.4.1 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html

RUN a2enmod rewrite
