<?php

namespace App\Middlewares;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;
use App\Services\Enum;

class ResponseMiddleware implements MiddlewareInterface {

    /**
     * Calls the middleware
     *
     * @param Phalcon\Mvc\Micro
     * @return void
     */
    public function call(Micro $app)
    {
        $response = $app->standardization->formatResponse($app->getReturnedValue());

        $app->response->setJsonContent($response);
        $app->response->send();
    }
}
