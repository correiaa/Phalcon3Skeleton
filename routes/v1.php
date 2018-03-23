<?php

use Phalcon\Mvc\Micro\Collection;

// IndexController
$IndexController = new Collection();
$IndexController->setHandler("App\Controllers\IndexController", true);
$IndexController->setPrefix("/v1");
// Index routes
$IndexController->get("/index", "indexActionV1");
$app->mount($IndexController);
