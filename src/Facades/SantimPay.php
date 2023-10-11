<?php

namespace SantimPay\SantimPay\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SantimPay\SantimPay\SantimPay
 */
class SantimPay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'santimPay';
    }
}
