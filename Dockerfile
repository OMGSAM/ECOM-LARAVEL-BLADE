FROM php:8.2-cli

WORKDIR /app

# Installer les extensions PHP et netcat
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev netcat-openbsd \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml

COPY . .

# Installer composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader --ignore-platform-reqs

# Clear cache Laravel
RUN php artisan config:clear

# Copier le script start.sh
COPY start.sh /app/start.sh
RUN chmod +x /app/start.sh

# Démarrer Laravel via start.sh
CMD ["/app/start.sh"]
