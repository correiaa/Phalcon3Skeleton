<?php

namespace App\Middlewares;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;
use App\Exceptions\NotFoundException;

class NotFoundMiddleware implements MiddlewareInterface {

    /**
     * Calls the middleware
     *
     * @param Phalcon\Mvc\Micro
     * @return bool
     */
    public function call(Micro $app)
    {
        return true;
    }

    /**
     * Given route was not found.
     *
     * @param Phalcon\Mvc\Micro
     * @return void
     */
    public function beforeNotFound()
    {
        throw new NotFoundException();
    }
}
