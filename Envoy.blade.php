@import('exolnet/laravel-envoy')

@task('deploy:link:files')
    @foreach ($linkedFiles as $file)
        @php
            [$from, $file] = explode(":", $file);
        @endphp

        mkdir -p `dirname "{{ $sharedPath }}/{{ $from }}"`

        if [ -f "{{ $releasePath }}/{{ $file }}" ]; then
            if [ ! -f "{{ $sharedPath }}/{{ $from }}" ]; then
                cp "{{ $releasePath }}/{{ $from }}" "{{ $sharedPath }}/{{ $from }}"
            fi

            rm -f "{{ $releasePath }}/{{ $file }}"
        fi

        if [ ! -f "{{ $sharedPath }}/{{ $from }}" ]; then
            touch "{{ $sharedPath }}/{{ $from }}"
        fi

        mkdir -p `dirname "{{ $releasePath }}/{{ $file }}"`

        ln -srfn "{{ $sharedPath }}/{{ $from }}" "{{ $releasePath }}/{{ $file }}"
    @endforeach
@endtask

@macro('deploy:no-npm')
    assert:commit
    deploy:starting
        deploy:check
        deploy:backup
    deploy:started
    deploy:provisioning
        deploy:fetch
        deploy:release
        deploy:git
        deploy:link
        deploy:copy
        deploy:composer
    deploy:provisioned
    deploy:building
    deploy:built
    deploy:publishing
        deploy:symlink
        deploy:publish
        deploy:cronjobs
    deploy:published
    deploy:finishing
        deploy:cleanup
    deploy:finished
@endmacro

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