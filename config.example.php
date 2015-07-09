<?php

return [
    # The URL under which the main site is accessible with trailing slash
    'base_path' => '/',

    # Only for development purposes
    'in_dev' => true,

    'recaptcha' => [
        'public' => '',
        'private' => '',
    ],

    # Site only database
    'internal_database' => [
        'type' => 'sqlite',
        'path' => 'main.sqlite'
    ],

    #Server database info
    'server_database' => [
        'account' => [
            'type' => 'mysql',
            'server' => 'localhost',
            'username' => 'homestead',
            'password' => 'secret',
            'database' => 'account',
            'port' => 3306,
        ],
        'player' => [
            'type' => 'mysql',
            'server' => 'localhost',
            'username' => 'homestead',
            'password' => 'secret',
            'database' => 'player',
            'port' => 3306,
        ],
    ]
];