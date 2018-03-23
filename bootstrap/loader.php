<?php

use Phalcon\Loader;

$loader = new Loader();
$loader->registerDirs(
    [
        $config->app->controllersDir,
        $config->app->modelsDir,
        $config->app->servicesDir,
        $config->app->exceptionsDir,
        $config->app->middlewaresDir,
    ]
);
$loader->registerNamespaces(
    [
        "App\\Controllers" => $config->app->controllersDir,
        "App\\Models" => $config->app->modelsDir,
        "App\\Services" => $config->app->servicesDir,
        "App\\Exceptions" => $config->app->exceptionsDir,
        "App\\Middlewares" => $config->app->middlewaresDir,
    ]
);

$loader->register();
