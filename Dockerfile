# Executive-Grade PHP 8.2 FPM Runtime Matrix
FROM php:8.2-fpm-alpine

# Industrial System Dependencies
RUN apk add --no-cache \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    linux-headers \
    git

# Protocol: PHP Extension Orchestration
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    intl \
    zip

# Global Logic: Composer Initialization
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Environment Initialization
WORKDIR /var/www

# Logic: Transferring Application Core
COPY . .

# Registry: Identity Synchronization (Permissions)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Boot Protocol
EXPOSE 9000
CMD ["php-fpm"]
