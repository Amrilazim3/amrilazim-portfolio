<?php

return [
    'name' => 'example',

    'default' => 'production',

    'environments' => [
        'production' => [
            'ssh_host'       => '128.199.131.110',
            'ssh_user'       => 'amril',
            'deploy_path'    => '/var/www/amrilazim-portfolio',
            'repository_url' => 'git@github.com:Amrilazim3/amrilazim-portfolio.git',
            'linked_files'   => ['.env'],
            'linked_dirs'    => ['storage/app', 'storage/framework', 'storage/logs'],
            'copied_dirs'    => ['node_modules', 'vendor'],
        ],
    ],
];