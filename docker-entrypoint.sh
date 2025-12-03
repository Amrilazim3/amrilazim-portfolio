#!/bin/bash
set -e

# Set proper permissions if needed (usually handled by image, but good for mounted volumes)
# chown -R webuser:webuser /var/www/html/storage

# Laravel Setup
echo "🚀 running deployment tasks..."

if [ "$APP_ENV" = "production" ]; then
    echo "Caching configuration..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan event:cache
fi

echo "Running migrations..."
php artisan migrate --force

echo "Linking storage..."
php artisan storage:link

echo "✅ Deployment tasks complete."

# Hand off to the S6 overlay init system to start Nginx and PHP-FPM
exec /init
