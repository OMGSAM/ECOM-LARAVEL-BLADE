FROM php:8.2

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y git unzip

# installer composer
RUN curl -sS https://getcomposer.org/installer | php

# installer dépendances
RUN php composer.phar install --no-dev --optimize-autoloader

# cache laravel
RUN php artisan config:cache

CMD php artisan serve --host=0.0.0.0 --port=8000
