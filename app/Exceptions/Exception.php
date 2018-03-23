<?php

namespace App\Exceptions;

class Exception extends \Exception
{
    protected $httpStatus = 500;

    public function getHttpStatus()
    {
        return $this->httpStatus;
    }
}
