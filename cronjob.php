<?php

error_reporting(E_ALL ^ E_NOTICE);

session_start();

require_once('vendor/autoload.php');

$core = new \Quantum\Core();
$cronjobs = new \Quantum\Cronjobs\CronJobs($core);