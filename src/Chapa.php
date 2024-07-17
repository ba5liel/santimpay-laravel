<?php

namespace SantimPay\SantimPay;

use SantimPay\SantimPay\Lib\Core\SantimPayCheckout;
use SantimPay\SantimPay\Lib\Core\SantimPayDirectPay;
use GuzzleHttp\Client;
use SantimPay\SantimPay\Lib\Core\ChapaDirectPay;

class Chapa
{
    public $http_client;
    public $secret_key;

    public $DEFAULT_HOST = 'https://api.chapa.co';
    public $DEFAULT_TEST_HOST = 'https://api.chapa.co';
    public const API_VERSION = '/v1';
    public static $PACKAGE_VERSION = '1.0.0';
    public $DEFAULT_TIMEOUT = 1000 * 60 * 2;
    public $checkout;
    public $directPay;

    public function __construct($secret_key, $test = false)
    {
        $this->secret_key = $secret_key;

        $this->http_client = new Client([
            'base_uri' => $test? $this->DEFAULT_TEST_HOST : $this->DEFAULT_HOST,
            'headers' => [
                "Content-Type" => "application/json; charset=UTF-8",
                "Accepts" => "application/json",
                "Authorization" => "Bearer {$this->secret_key}"
            ],
        ]);
        // $this->checkout = new SantimPayCheckout($this->http_client, $secret_key);
        $this->directPay = new ChapaDirectPay($this->http_client);
    }
}
