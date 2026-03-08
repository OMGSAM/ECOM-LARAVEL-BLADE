FROM php:8.2-fpm

WORKDIR /var/www/html

# Installer extensions PHP
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev \
    nginx \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml

# Copier le code
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && php composer.phar install --no-dev --optimize-autoloader

# Permissions Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copier config Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Exposer le port que Railway utilisera
EXPOSE 8080

# Script pour lancer Nginx + PHP-FPM
COPY start.sh /app/start.sh
RUN chmod +x /app/start.sh
CMD ["/app/start.sh"]
