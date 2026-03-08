FROM php:8.2

WORKDIR /app

# Installer extensions PHP nécessaires AVANT Composer
RUN apt-get update && apt-get install -y git unzip libzip-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl

# Copier seulement composer.json (pas de composer.lock si tu l'as supprimé)
COPY composer.json ./

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php

# Installer dépendances Laravel
RUN php composer.phar install --no-dev --optimize-autoloader

# Copier le reste du projet
COPY . .

# Laravel cache
RUN php artisan config:cache

# Start serveur
CMD php artisan serve --host=0.0.0.0 --port=8000
