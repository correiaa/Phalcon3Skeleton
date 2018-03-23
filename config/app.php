<?php

return [
    "app" => [
        'debug' => true,
        'timezone' => 'UTC',
        'locale' => 'es',
        'fallbackLocale' => 'en',
        'controllersDir' => APP_PATH . '/Controllers/',
        'modelsDir' => APP_PATH . '/Models/',
        'servicesDir' => APP_PATH . '/Services/',
        'exceptionsDir' => APP_PATH . '/Exceptions/',
        'middlewaresDir' => APP_PATH . '/Middlewares/',
        'logsDir' => BASE_PATH . '/logs/',
    ]
];
