<?php

namespace App\Middlewares;

use Phalcon\Mvc\Micro;
use Phalcon\Events\Event;
use Phalcon\Mvc\Micro\MiddlewareInterface;

class RequestMiddleware implements MiddlewareInterface {

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
     * Before the route is executed.
     *
     * @param Phalcon\Events\Event
     * @param Phalcon\Mvc\Micro
     * @return bool
     */
    public function beforeHandleRoute(Event $event, Micro $app)
    {
        $this->validateRequestParams($app);
        $this->validateToken($app);
    }


    /**
     * Validates obligatory, listed params on request.
     *
     * @param Phalcon\Mvc\Micro
     * @return void
     */
    private function validateRequestParams(Micro $app)
    {
        $app->validations->requestParams($app->request->get());
    }

    /**
     * Validates user_token JWT, if any.
     *
     * @param Phalcon\Mvc\Micro
     * @return void
     */
    private function validateToken(Micro $app)
    {
        if ($app->request->get("user_token")) {
            $app->jwt->validateToken($app->request->get("user_token"));
        }
    }
}
