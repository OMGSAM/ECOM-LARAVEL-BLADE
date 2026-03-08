FROM php:8.2

WORKDIR /app

# Installer dépendances PHP
RUN apt-get update && apt-get install -y git unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Copier composer.json + composer.lock en premier
COPY composer.json ./

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader

# Copier le reste du projet
COPY . .

# Laravel cache
RUN php artisan config:cache

# Démarrage serveur
CMD php artisan serve --host=0.0.0.0 --port=8000
