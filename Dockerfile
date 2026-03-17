FROM php:8.1-cli

WORKDIR /app

# Installer extensions
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev \
    libpng-dev libjpeg-dev libfreetype6-dev libicu-dev zlib1g-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml gd intl

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier code
COPY . .

# Logs debug build
RUN echo "Installing dependencies..." \
    && composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Générer APP_KEY si manquant
RUN php artisan key:generate || true

# Cache config
RUN php artisan config:cache || true
RUN php artisan route:cache || true

# Expose port
EXPOSE 8000

# START avec logs
CMD echo "🚀 Starting Laravel..." && \
    echo "PORT = $PORT" && \
    php -d display_errors=1 artisan serve --host=0.0.0.0 --port=${PORT:-8000}
