#!/bin/bash

# Démarrer Nginx
service nginx start

# Démarrer PHP-FPM en foreground pour que le conteneur reste actif
php-fpm
