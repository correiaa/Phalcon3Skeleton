<?php

namespace App\Exceptions;

use App\Exceptions\Exception;

class MissingParametersException extends Exception
{
    protected $message = "Missing Parameters:";
    protected $code = 1000000002;
}
