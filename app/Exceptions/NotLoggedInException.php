<?php

namespace App\Exceptions;

use App\Exceptions\Exception;

class NotLoggedInException extends Exception
{
    protected $message = "Not logged in.";
    protected $code = 1000000000;
}