FROM node:20-alpine as frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
RUN npm run build

FROM serversideup/php:8.2-fpm-nginx

# Install additional dependencies if needed (ImageMagick, etc.)
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        php8.2-imagick \
        php8.2-intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Switch to webuser to manage application files
USER webuser

WORKDIR /var/www/html

# Copy application code
COPY --chown=webuser:webuser . .

# Copy built assets from frontend stage
COPY --chown=webuser:webuser --from=frontend /app/public/build public/build
COPY --chown=webuser:webuser --from=frontend /app/public/manifest.json public/manifest.json

# Install Composer dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Ensure permissions
RUN chmod +x docker-entrypoint.sh

ENTRYPOINT ["/var/www/html/docker-entrypoint.sh"]

EXPOSE 80 443
