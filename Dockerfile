FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev netcat-openbsd \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml

COPY . .

RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader --ignore-platform-reqs

RUN php artisan config:clear

COPY start.sh /app/start.sh
RUN chmod +x /app/start.sh

# Démarrer Laravel
CMD ["/app/start.sh"]
