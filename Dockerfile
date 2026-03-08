 

# Copier uniquement composer.json et composer.lock d'abord
COPY composer.json composer.lock ./

# Installer les dépendances
RUN php composer.phar install --no-dev --optimize-autoloader

# Copier le reste de l'app
COPY . .
