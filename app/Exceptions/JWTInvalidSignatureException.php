<?php

namespace App\Exceptions;

use App\Exceptions\Exception;

class JWTInvalidSignatureException extends Exception
{
    protected $message = "The JWT token submitted has an invalid Signature.";
    protected $code = 1100000000;
}