#!/bin/bash
set -e

# Laravel Setup
echo "🚀 Running deployment tasks..."

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
php artisan storage:link || true

echo "✅ Deployment tasks complete."
