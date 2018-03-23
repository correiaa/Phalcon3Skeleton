<?php

use Phalcon\Mvc\Micro\Collection;

// IndexController
$IndexController = new Collection();
$IndexController->setHandler("App\Controllers\IndexController", true);
// Index routes
$IndexController->get("/index", "indexAction");
$app->mount($IndexController);
