@import('exolnet/laravel-envoy')

@task('deploy:publish')
    cd "{{ $releasePath }}"

    php artisan down

    php artisan config:cache
    php artisan event:cache
    php artisan route:cache
    php artisan view:cache

    php artisan storage:link

    php artisan migrate --force

    php artisan up
@endtask