<?php

use MyApp\Core\Routes;
use MyApp\Config\Config;

if (!session_id()) {
    session_start();
}

// require_once '../src/core/Autoload.php';
// require_once '../src/config/default.php';

require_once '../vendor/autoload.php';
Config::load();

$routes = new Routes;
$routes->run();
