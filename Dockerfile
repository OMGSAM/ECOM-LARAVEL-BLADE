# Dockerfile
FROM php:8.1-cli

# Définir le répertoire de travail
WORKDIR /app

# Installer dépendances PHP et système pour Laravel
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev \
    libpng-dev libjpeg-dev libfreetype6-dev libicu-dev zlib1g-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml gd intl

# Copier le code Laravel
COPY . .

# Installer Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Exposer le port que Railway définit automatiquement
EXPOSE 8000

# Démarrer Laravel directement, le port est récupéré via $PORT par Railway
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
