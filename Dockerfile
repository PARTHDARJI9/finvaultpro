# Executive-Grade Laravel 12 Runtime Terminal
# ==========================================
# Phase 1: Dependency Assembly (Build)
# ==========================================
FROM php:8.2-alpine as dependencies

# Global Logic: Composer Initialization
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Industrial System Dependencies
# Node.js for Vite, Git for potential composer requirements
RUN apk add --no-cache nodejs npm git

WORKDIR /var/www

# Logic: Transferring Application Core
COPY . .

# Execution: Production Lifecycle Build
# Using --no-dev and --no-scripts for a lean production build
RUN composer install --no-dev --optimize-autoloader --no-progress --no-interaction --no-scripts && \
    npm install && \
    npm run build

# ==========================================
# Phase 2: Production-Grade Runtime (Final)
# ==========================================
# Using FrankenPHP 1.1 with PHP 8.2 (Cloud-Native PHP Server)
FROM dunglas/frankenphp:1.1-php8.2-alpine

# Registering Infrastructure Metadata
LABEL maintainer="FinVaultPro Engineering"
LABEL description="Premium Laravel 12 Executive Terminal"

# Industrial System Dependencies
# Only runtime essentials (install-php-extensions handles extension dependencies)
RUN apk add --no-cache \
    libpng \
    libxml2 \
    zip \
    icu-libs \
    libzip \
    oniguruma \
    ca-certificates \
    curl

# High-Velocity Extension Installer & Extension Orchestration
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

# Environment Initialization
WORKDIR /var/www

# Protocol: Copy Optimized Build and Dependencies
# This includes the compiled front-end assets (public/build) and vendor folder
COPY --from=dependencies /var/www /var/www

# Registry: Identity Synchronization (Permissions)
# Ensures storage and cache are writable by the web user
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Production Hardening
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Render & Cloud Configuration
# FrankenPHP automatically picks up PUBLIC_ROOT and SERVER_NAME
ENV PORT=80
ENV SERVER_NAME=:80
ENV PUBLIC_ROOT=/var/www/public

# Health Management Protocol
HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
  CMD curl -f http://localhost:80/ || exit 1

# Boot Protocol
# FrankenPHP runs the PHP server natively on the specified port
EXPOSE 80

CMD ["frankenphp", "php-server", "--root", "/var/www/public"]
