#!/bin/bash
# start.sh

# Lancer les migrations (optionnel)
php artisan migrate --force

# Clear cache
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Démarrer le serveur Laravel pour Railway
php artisan serve --host=0.0.0.0 --port=8000
