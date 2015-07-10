<?php

return [
    # The PATH under which the main site is accessible after domain with trailing slash
    # Example: example.com/homepage --> base_path = /homepage/
    'base_path' => '/',

    # Only for development purposes
    # Disables e.g. Captcha for testing purposes
    'in_dev' => true,

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

    # Site only database (internal)
    # This will be put in a protected directory automatically
    # while you install this cms, please don't change this!
    'internal_database' => [
        'type' => 'sqlite',
        'path' => 'main.sqlite'
    ],

    #Server database info
    'server_database' => [
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
    ]
];