#!/bin/sh
# attendre que MySQL soit prêt avant de démarrer Laravel

echo "Waiting for MySQL..."
while ! nc -z $DB_HOST $DB_PORT; do
  sleep 2
done

echo "MySQL is up, starting Laravel..."
php artisan serve --host=0.0.0.0 --port=$PORT
