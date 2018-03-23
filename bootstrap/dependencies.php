<?php

use Phalcon\Di\FactoryDefault;
use App\Services\LoggerWrapper;
use App\Services\Profiler;
use App\Services\Standardization;
use App\Services\Validations;
use App\Services\JWT;
use GuzzleHttp\Client;

// Create a DI.
$di = new FactoryDefault();

// Set config.
$di->set("config", function() use ($config) {
    return $config;
}, true);

// Set LoggerWrapper service.
$di->setShared("logger", function() use ($config) {
    return new LoggerWrapper($config->app->logsDir . ENVIRONMENT . ".log");
});

// Set Profiler service.
$di->set("profiler", function() use ($app) {
    return new Profiler(boolval($app->request->get("profile")));
});

// Set Standardization service.
$di->set("standardization", function() use ($app) {
    return new Standardization($app);
}, true);

// Set Validations service.
$di->set("validations", function() {
    return new Validations();
}, true);

// Set lcobucci/jwt.
$di->set("jwt", function() use ($config) {
    return new JWT($config->jwt);
}, true);

// Set guzzlehttp/guzzle.
$di->set("guzzleClient", function() {
    return new Client();
}, true);

// Inject dependencies.
$app->setDI($di);
