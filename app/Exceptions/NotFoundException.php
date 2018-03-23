<?php

namespace App\Exceptions;

use App\Exceptions\Exception;

class NotFoundException extends Exception
{
    protected $message = "Given route was not found or does not exist.";
    protected $code = 1000000003;
}
