# Executive-Grade Laravel 12 Unified Docker Matrix (Single-Stage for Build Speed)
FROM php:8.2-fpm-alpine

# Global Logic: Environment Variables
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV COMPOSER_ALLOW_SUPERUSER=1

# Industrial System Dependencies
# Node.js for Vite, PHP build tools, and production essentials
RUN apk add --no-cache \
    curl \
    git \
    libpng-dev \    
    libxml2-dev \
    zip \
    unzip \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    nodejs \
    npm \
    libavif-dev \
    libwebp-dev \
    libjpeg-turbo-dev \
    freetype-dev

# Extensions: Core Protocol Orchestration
# Installing directly (no multi-stage) to ensure all shared libraries are linked
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-avif && \
    docker-php-ext-install \
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

WORKDIR /var/www

# Logic: Transferring Application Core
COPY . .

# Execution: Production Lifecycle Build
# Using --no-dev and --no-scripts for maximum stability
RUN composer install --no-dev --optimize-autoloader --no-progress --no-interaction --no-scripts && \
    npm install && \
    npm run build && \
    rm -rf node_modules

# Registry: Identity Synchronization (Permissions)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Production Hardening
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Boot Protocol: Adaptive HTTP Gateway
# We use 'php artisan serve' on port 80 to guarantee immediate HTTP visibility for Render's port scan
# Render will map port 80 to the public URL.
EXPOSE 80

# The CMD uses 'php artisan serve' to ensure it listens for HTTP traffic on port 80
# We use --host 0.0.0.0 to listen on all interfaces and --port 80 for Render compatibility.
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
