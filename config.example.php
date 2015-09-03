<?php

return [
    # Page Information
    'info' => [
        'pageTitle' => 'Team Quantum',
        'slogan' => 'Quantum CMS <3',
    ],

    # The PATH under which the main site is accessible after domain with trailing slash
    # Example: example.com/homepage --> base_path = /homepage/
    'base_path' => '/',

    # Only for development purposes
    # Disables e.g. Captcha for testing purposes
    'in_dev' => false,

    # ReCaptcha Support
    # enabled is a boolean (true/false)
    # public key is the site key
    # private key is the secret key
    'recaptcha' => [
        'enabled' => true,
        'public' => '',
        'private' => '',
    ],

    # Site Captcha Lib
    # if u use ReCaptcha, disable this
    'captchalib' => [
        'enabled' => false
        // TODO: Create own Captcha lib
    ],

    # News System
    # choose your board and configure the newspage
    'news' => [
        'path' => '../../board/',  # path to your board from the news page with trailing slash
        'type' => [
            'version' => 'internal', # use: 'wbb3', 'wbb4', 'internal'
            'internal' => 'board' # leave this empty if you use an external board | use: 'board', 'internal', ''
        ],
        'boardid' => '', # the Board from where the news should be loaded
        'messages' => '5'
    ],

    # Site only database (internal)
    # This will be put in a protected directory automatically
    # while you install this cms, please don't change this!
    'internal_database' => [
        'type' => 'sqlite',
        'path' => 'storage/db.sqlite'
    ],

    #Server database info
    'server_database' => [
        # Database information for the server that runs online
        'production' => [
            # Account Database Information
            'account' => [
                'type' => 'mysql',
                'server' => 'localhost',
                'username' => 'user',
                'password' => 'pass',
                'database' => 'account',
                'port' => 3306,
            ],
            'player' => [
                # Player Database Information
                'type' => 'mysql',
                'server' => 'localhost',
                'username' => 'user',
                'password' => 'pass',
                'database' => 'player',
                'port' => 3306,
            ],
            'board' => [
                # Board Database Information (if you use an external board like wbb3)
                'type' => 'mysql',
                'server' => 'localhost',
                'username' => 'user',
                'password' => 'pass',
                'database' => 'wcf',
                'port' => 3306,
            ],
        ],
        # Database info for your local machine. Use only in_dev = true
        'dev' => [
            'account' => [
                'type' => 'mysql',
                'server' => 'localhost',
                'username' => 'user',
                'password' => 'pass',
                'database' => 'account',
                'port' => 3306,
            ],
            'player' => [
                'type' => 'mysql',
                'server' => 'localhost',
                'username' => 'user',
                'password' => 'pass',
                'database' => 'player',
                'port' => 3306,
            ],
        ]
    ]
];