# ==========================================
# Phase 1: Dependency Assembly (Build)
# ==========================================
FROM php:8.2-fpm-alpine as builder

# High-Velocity Extension Installer & Base Tools
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    intl \
    zip

# Node.js for Vite Asset Compilation
RUN apk add --no-cache nodejs npm

# Global Logic: Composer Initialization
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Logic: Transferring Application Core (Except ignored files)
COPY . .

# Execution: Production Lifecycle Build
# Note: Use --no-scripts to avoid artisan commands if DB is missing
RUN composer install --no-dev --optimize-autoloader --no-progress --no-interaction --no-scripts && \
    npm install && \
    npm run build && \
    rm -rf node_modules

# ==========================================
# Phase 2: Production-Grade Runtime (Final)
# ==========================================
FROM php:8.2-fpm-alpine

# Industrial System Dependencies (Minimal Runtime Only)
RUN apk add --no-cache \
    libpng \
    libxml2 \
    zip \
    icu-libs \
    libzip \
    oniguruma \
    ca-certificates

# Copy PHP Extensions from Builder for Speed
COPY --from=builder /usr/local/lib/php/extensions /usr/local/lib/php/extensions
COPY --from=builder /usr/local/etc/php/conf.d /usr/local/etc/php/conf.d

WORKDIR /var/www

# Protocol: Copy Optimized Build (vendor + public/build included)
COPY --from=builder /var/www /var/www

# Registry: Identity Synchronization (Permissions)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Production Hardening
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Boot Protocol
EXPOSE 9000

# Health Management
HEALTHCHECK --interval=30s --timeout=3s \
  CMD php-fpm -t || exit 1

CMD ["php-fpm"]
