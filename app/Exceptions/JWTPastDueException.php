<?php

namespace App\Exceptions;

use App\Exceptions\Exception;

class JWTPastDueException extends Exception
{
    protected $message = "The JWT Token submitted is past due.";
    protected $code = 1100000001;
}