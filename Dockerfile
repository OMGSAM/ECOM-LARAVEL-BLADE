# Dockerfile
FROM php:8.2-fpm

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installer les dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev \
    libpng-dev libjpeg-dev libfreetype6-dev libicu-dev zlib1g-dev nginx \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml gd intl

# Copier le code Laravel
COPY . .

# Installer Composer globalement
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Copier la config Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Copier start.sh et rendre exécutable
COPY start.sh /app/start.sh
RUN chmod +x /app/start.sh

# Exposer le port que Railway va utiliser
EXPOSE 8080

# Lancer le conteneur
CMD ["/app/start.sh"]
