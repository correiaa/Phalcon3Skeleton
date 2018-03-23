<?php

use Phalcon\Config\Adapter\Grouped;

// Load configuration files
$configPath = glob("{" . BASE_PATH . "/config/*.php," . BASE_PATH . "/config/" . ENVIRONMENT . "/*.php}", GLOB_BRACE);

return new Grouped($configPath);
