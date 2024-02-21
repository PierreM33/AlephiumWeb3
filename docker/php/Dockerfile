# Dockerfile

# Utilisez une image PHP adaptée à votre application Symfony
FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    zlib1g-dev g++ git libicu-dev zip libzip-dev zip

RUN docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu -y \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/symfony_docker

# Installez Symfony CLI à l'aide de wget
RUN apt-get install -y wget \
    && wget https://get.symfony.com/cli/installer -O - | bash

# Créez un lien symbolique pour Symfony CLI dans /usr/local/bin
RUN ln -s /root/.symfony/bin/symfony /usr/local/bin/symfony

# Installez Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
