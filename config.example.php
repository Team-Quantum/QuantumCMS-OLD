<?php

// The URL under which the main site is accessible with trailing slash
$settings['external_path'] = 'http://localhost/';

$settings['recaptcha']['public'] = '';
$settings['recaptcha']['private'] = '';

$settings['in_dev'] = false;                                     # Disable captcha etc

// Database configuration for internal data (failed login log, itemshop, etc)
$settings['internal_database']['type'] = 'sqlite';              # Also possible mysql (see example for server database)
$settings['internal_database']['path'] = 'main.sqlite';         # Can be placed somewhere on the web server (protected directory)

$settings['server_database']['account']['type'] = 'mysql';
$settings['server_database']['account']['server'] = 'localhost';
$settings['server_database']['account']['port'] = 3306;         # Default is 3306
$settings['server_database']['account']['username'] = 'root';
$settings['server_database']['account']['password'] = '';
$settings['server_database']['account']['database'] = 'account';

$settings['server_database']['player']['type'] = 'mysql';
$settings['server_database']['player']['server'] = 'localhost';
$settings['server_database']['player']['port'] = 3306;          # Default is 3306
$settings['server_database']['player']['username'] = 'root';
$settings['server_database']['player']['password'] = '';
$settings['server_database']['player']['database'] = 'player';