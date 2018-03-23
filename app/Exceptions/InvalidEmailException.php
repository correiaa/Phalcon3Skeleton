<?php

namespace App\Exceptions;

use App\Exceptions\Exception;

class InvalidEmailException extends Exception
{
    protected $message = "Invalid mail format.";
    protected $code = 1000000001;
}