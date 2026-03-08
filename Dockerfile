# Base PHP
FROM php:8.2

WORKDIR /app

# Installer dépendances PHP
RUN apt-get update && apt-get install -y git unzip libzip-dev
RUN docker-php-ext-install pdo pdo_mysql zip

# Copier seulement composer.json et composer.lock d'abord
COPY composer.json composer.lock ./

# Installer Composer et dépendances
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader

# Copier le reste du projet
COPY . .

# Cache Laravel
RUN php artisan config:cache

# Démarrer le serveur
CMD php artisan serve --host=0.0.0.0 --port=8000
