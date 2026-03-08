FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev pkg-config zlib1g-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml

COPY . .

# installer composer
RUN curl -sS https://getcomposer.org/installer | php

RUN php composer.phar install --no-dev --optimize-autoloader --ignore-platform-reqs

RUN if [ ! -f .env ]; then cp .env.example .env; fi

RUN php artisan key:generate

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=$PORT
