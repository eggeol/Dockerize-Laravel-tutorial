FROM php:8.4-fpm-alpine

RUN apk add --no-cache unzip libpq curl \
    && docker-php-ext-install pdo pdo_mysql bcmath

WORKDIR /var/www

COPY . .

COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]