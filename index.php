<?php

/**
 * Initialize everything, Core Database and manage display
 */

error_reporting(E_ALL ^ E_NOTICE);


// DEVELOPMENT SETTINGS
ini_set("memory_limit",'2048M');
ini_set("max_execution_time", '60');

session_start();

require_once('vendor/autoload.php');

$core = new \Quantum\Core();
$core->execute();