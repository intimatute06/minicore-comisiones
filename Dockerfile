
FROM php:8.3-apache


RUN apt-get update && apt-get install -y git unzip


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite


ENV PORT=80
RUN sed -i 's/Listen 80/Listen ${PORT}/' /etc/apache2/ports.conf
RUN sed -i 's/:80>/:${PORT}>/' /etc/apache2/sites-available/000-default.conf


WORKDIR /var/www/html
COPY . .


RUN composer install --no-dev --optimize-autoloader --no-interaction


CMD touch database/database.sqlite && php artisan migrate:fresh --seed --force && chown -R www-data:www-data storage bootstrap/cache database && apache2-foreground