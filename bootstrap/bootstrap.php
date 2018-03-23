<?php

use Phalcon\Mvc\Micro;

// Create Micro app instance.
$app = new Micro();

// Get constants file.
require_once __DIR__ . '/constants.php';

// Get vendor libraries.
require_once BASE_PATH . '/vendor/autoload.php';

// Get all configs.
$config = require_once BASE_PATH . '/bootstrap/config.php';

// Set error reporting.
ini_set('display_errors', $config->app->debug ? true : false);
error_reporting($config->app->debug ? E_ALL : 0);

// Register loader.
require_once BASE_PATH . '/bootstrap/loader.php';

// Get dependencies.
require_once BASE_PATH . '/bootstrap/dependencies.php';

// Get middlewares.
require_once BASE_PATH . '/bootstrap/middlewares.php';

// Get routes.
require_once BASE_PATH . "/bootstrap/routes.php";

return $app;
