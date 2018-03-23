<?php

try {
    $app = require __DIR__ . '/bootstrap/bootstrap.php';
    $app->handle();
} catch (\Exception $e) {
    $response = $app->standardization->formatResponse(["response" => null, "error" => $e]);

    $app->response->setJsonContent($response);
    $app->response->send();
}
