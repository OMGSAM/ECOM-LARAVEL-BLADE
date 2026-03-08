FROM php:8.2-fpm

WORKDIR /app

# Installer extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev pkg-config zlib1g-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml

# Copier tout le projet
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader --ignore-platform-reqs

# Copier .env.example si .env n’existe pas
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Cache Laravel
RUN php artisan config:cache

# Exposer le port 9000 (PHP-FPM)
EXPOSE 9000

# Lancer PHP-FPM
CMD ["php-fpm"]
