<?php

namespace SantimPay\SantimPay\Lib;

class SantimPayOptions
{
    public $sandbox;

    public function __construct($sandbox)
    {
        $this->sandbox = $sandbox;
    }
}
