<?php

namespace SantimPay\SantimPay\Lib\Exception;

use League\Flysystem\ConnectionErrorException;
use Throwable;

class SantimPayNetworkException extends ConnectionErrorException
{
    // Redefine the exception so message isn't optional
    public function __construct(Throwable $previous = null)
    {
        // make sure everything is assigned properly
        parent::__construct("NetworkException", 0, $previous);
    }

    // custom string representation of object
    public function __toString()
    {
        return __CLASS__ . ": NetworkException\n";
    }
}
