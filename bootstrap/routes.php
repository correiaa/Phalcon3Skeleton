<?php

use Phalcon\Config\Adapter\Grouped;

// Load route files
$routesPath = glob("{" . BASE_PATH . "/routes/*.php}", GLOB_BRACE);

return new Grouped($routesPath);