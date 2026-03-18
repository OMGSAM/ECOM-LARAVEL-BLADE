FROM php:8.1-fpm

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www

# Copier fichiers
COPY . .

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Permissions Laravel
RUN chmod -R 775 storage bootstrap/cache

# Générer APP_KEY si absent
RUN php artisan key:generate || true

# Exposer port Railway
EXPOSE 8000

# Lancer Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
