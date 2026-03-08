FROM php:8.2-cli

WORKDIR /app

# Installer packages système nécessaires
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev pkg-config zlib1g-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml

# Copier tout le projet d’un coup
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php

# Installer dépendances Laravel
RUN php composer.phar install --no-dev --optimize-autoloader --ignore-platform-reqs

# Artisan cache
RUN php artisan config:cache

# Démarrer serveur
CMD php artisan serve --host=0.0.0.0 --port=8000
