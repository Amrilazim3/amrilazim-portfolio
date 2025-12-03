FROM node:20-alpine as frontend

WORKDIR /app

# Install PHP and Composer for Ziggy package
RUN apk add --no-cache php82 php82-phar php82-mbstring php82-openssl php82-curl composer

COPY package.json package-lock.json composer.json composer.lock ./
RUN npm ci

# Install only the Ziggy package needed for frontend build
RUN composer install --no-dev --no-interaction --ignore-platform-reqs --no-scripts

COPY . .
RUN npm run build

FROM serversideup/php:8.2-fpm-nginx

# Ensure we're running as root for package installation
USER root

# Install additional PHP extensions using the serversideup install script
RUN install-php-extensions imagick intl

WORKDIR /var/www/html

# Copy application code (use numeric UID/GID for webuser - 9999)
COPY --chown=9999:9999 . .

# Copy built assets from frontend stage
COPY --chown=9999:9999 --from=frontend /app/public/build public/build

# Ensure the work directory is owned by webuser
RUN chown -R 9999:9999 /var/www/html

# Switch to webuser for remaining operations
USER 9999

# Install Composer dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Copy startup script to entrypoint.d for serversideup/php hooks
COPY --chmod=755 docker-entrypoint.sh /etc/entrypoint.d/50-laravel-setup.sh

# Switch back to root for proper init
USER root

EXPOSE 80 443
