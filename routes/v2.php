<?php

use Phalcon\Mvc\Micro\Collection;

// IndexController
$IndexController = new Collection();
$IndexController->setHandler("App\Controllers\IndexController", true);
$IndexController->setPrefix("/v2");
// Index routes
$IndexController->get("/index", "indexActionV2");
$app->mount($IndexController);
