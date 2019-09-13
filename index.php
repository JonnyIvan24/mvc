<?php

require_once 'libs/dataBase.php';
require_once 'libs/controllerBase.php';
require_once 'libs/viewBase.php';
require_once 'libs/modelBase.php';
require_once 'config/config.php';
// require_once 'libs/app.php';

// In case one is using PHP 5.4's built-in server
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

// Include the Router class
// @note: it's recommended to just use the composer autoloader when working with other packages too
require_once __DIR__ . '/vendor/autoload.php';
// Create a Router
$router = new \Bramus\Router\Router();

// declaración de rutas
require_once 'libs/routes.php';

// Thunderbirds are go!
$router->run();

// $app = new App();

?>