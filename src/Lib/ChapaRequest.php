<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class ChapaRequest implements JsonSerializable
{
    public $id;
    public $amount;
    public $currency;
    public $tx_ref;
    public $mobile;
    public $callback_url;
    public $meta;

    public $direct;

    public function __construct(
        $amount,
        $tx_ref,
        $mobile,
        $callback_url,
        $meta,
        $direct = false,
        $currency = "ETB",
    ) {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->tx_ref = $tx_ref;
        $this->mobile = $mobile;
        $this->callback_url = $callback_url;
        $this->meta = $meta;
        $this->direct = $direct;


    }

    public function jsonSerialize()
    {
        if($this->direct)
        return [
            'amount' => $this->amount,
            'currency' => $this->currency,
            'tx_ref' => $this->tx_ref,
            'mobile' => $this->mobile,
            'callback_url' => $this->callback_url,
            'meta' => $this->meta
        ];
        return [
            'amount' => $this->amount,
            'currency' => $this->currency,
            'tx_ref' => $this->tx_ref,
            'mobile' => $this->mobile,
            'callback_url' => $this->callback_url,
            'meta' => $this->meta
        ];
    }
}
