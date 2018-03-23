<?php

namespace App\Services;

use App\Exceptions\MissingParametersException;
use App\Exceptions\InvalidEmailException;

class Validations
{
    /**
     * Validate obligatory, listed params on request.
     *
     * @param array $data
     * @var $data[token] requiered
     * @var $data[foo] requiered
     * @var $data[bar] requiered
     * @return void
     */
    public function requestParams($params)
    {
        $message = "Missing parameters: ";
        $missingParams = "";
        $validate = [
            "token",
            "foo",
            "bar"
        ];

        foreach ($validate as $k => $v) {
            if (!array_key_exists($v, $params) || empty($params[$v])) {
                $missingParams .= $v . ", ";
            }
        }

        if (!empty($missingParams)) {
            $missingParams = substr($missingParams, 0, -2);
            throw new MissingParametersException($message . $missingParams);
        }
    }

    /**
     * Validates given obligatory params are not empty or null.
     * Returns a concatenated string of missing parameters on exception.
     *
     * @param array
     * @return void
     */
    public function obligatoryParams($obligatoryParams)
    {
        $message = "Missing parameters: ";
        $missingParams = "";

        foreach ($obligatoryParams as $k => $v) {
            if (is_null($v) || $v !== '0' && empty($v)) {
                $missingParams .= $k . ", ";
            }
        }

        if (!empty($missingParams)) {
            $missingParams = substr($missingParams, 0, -2);
            throw new MissingParametersException($message . $missingParams);
        }
    }

    /**
     * This method helps verify the mail pattern is valid, so you can then proceed
     * the validation certifies the following email pattern: ^[a-zA-Z0-9_\+-]+(\.[a-zA-Z0-9_\+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.([a-zA-Z0-9-]{1,})$
     * 
     * @param string
     * @return void
     */
    public function validEmail($email)
    {
        if (empty($email) || !(preg_match("/^[a-zA-Z0-9_\+-]+(\.[a-zA-Z0-9_\+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.([a-zA-Z0-9-]{1,})$/", $email)) || preg_match("/\s/", $email)) {
            throw new InvalidEmailException();
        }
    }
}
