FROM php:8.2

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

COPY . .

RUN curl -sS https://getcomposer.org/installer | php

RUN php composer.phar install --no-dev --optimize-autoloader

CMD php artisan serve --host=0.0.0.0 --port=8000
