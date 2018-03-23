<?php

namespace App\Services;

use Phalcon\Mvc\Micro;
use App\Services\Enum;

class Standardization
{
    private $request;
    private $response;

    public function __construct(Micro $app)
    {
        $this->request = $app->request;
        $this->response = $app->response;
    }

    /**
     * Parses response into an standard format.
     * 
     * @param mixed
     * @param exception
     * 
     * @return void
     */
    public function formatResponse($returnedValue)
    {
        $response = [
            "entry" => $this->request->get(),
            "status" => 200,
            "response" => $returnedValue['response'],
            "errors" => [
                "error" => [
                    "message" => "",
                    "code" => 0,
                    "exception" => ""
                ]
            ]
        ];

        // Check for errors to parse.
        if (empty($returnedValue['error'])) {
            unset($response['errors']);
        } else {
            unset($response['response']);
            $this->formatError($response, $returnedValue['error']);
        }

        // Unset Phalcon's "_url" request, auto-injected, param.
        unset($response['entry']['_url']);

        return $response;
    }

    /**
     * Parses the given exception into an standard format error.
     * 
     * @param reference
     * @param exception
     * @return void
     */
    private function formatError(&$response, $e)
    {
        if ($e instanceof \App\Exceptions\JWTInvalidSignatureException || $e instanceof \App\Exceptions\JWTPastDueException) {
            // If user is not logged in, return "Authorization required".
            $this->response->setStatusCode(401, "Authorization required");
        } elseif ($e instanceof \App\Exceptions\NotFoundException) {
            // For non matching routes, return "Not Found".
            $this->response->setStatusCode(404, "Not Found");
        } elseif ($e instanceof \Exception) {
            // For generic exceptions return a (probably) "Bad Request".
            $this->response->setStatusCode(400, "Bad Request");
        } else {
            // For any other issues return a (probably) "Server Error".
            $this->response->setStatusCode(500, "Server Error");
        }

        $response['status'] = $this->response->getStatusCode();
        $response['errors']['error']['message'] = $e->getMessage();
        $response['errors']['error']['code'] = Enum::getName($e->getCode());
        $response['errors']['error']['exception'] = base64_encode($e->getFile() . ' ' . $e->getLine());
    }
}
