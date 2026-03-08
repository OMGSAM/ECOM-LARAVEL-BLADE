FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
git unzip libzip-dev libcurl4-openssl-dev libonig-dev libxml2-dev \
&& docker-php-ext-install pdo pdo_mysql zip mbstring curl bcmath xml

COPY . .

# install composer
RUN curl -sS https://getcomposer.org/installer | php

RUN php composer.phar install --no-dev --optimize-autoloader --ignore-platform-reqs


#RUN php artisan key:generate

# clear cache
RUN php artisan config:clear

CMD php artisan serve --host=0.0.0.0 --port=$PORT
