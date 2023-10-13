<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class SantimPayCheckoutRequest implements JsonSerializable
{
    public $id;
    public $amount;
    public $paymentReason;
    public $successRedirectUrl;
    public $failureRedirectUrl;
    public $notifyUrl;
    public $cancelRedirectUrl;
    public $direct;

    public function __construct(
        $id,
        $amount,
        $paymentReason,
        $successRedirectUrl,
        $failureRedirectUrl,
        $notifyUrl,
        $cancelRedirectUrl,
        $direct = false
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->paymentReason = $paymentReason;
        $this->successRedirectUrl = $successRedirectUrl;
        $this->failureRedirectUrl = $failureRedirectUrl;
        $this->notifyUrl = $notifyUrl;
        $this->cancelRedirectUrl = $cancelRedirectUrl;
        $this->direct = $direct;
    }

    public function jsonSerialize()
    {
        if($this->direct)
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'reason' => $this->paymentReason,
            'notifyUrl' => $this->notifyUrl,
        ];
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'reason' => $this->paymentReason,
            'successRedirectUrl' => $this->successRedirectUrl,
            'failureRedirectUrl' => $this->failureRedirectUrl,
            'notifyUrl' => $this->notifyUrl,
            'cancelRedirectUrl' => $this->cancelRedirectUrl,
        ];
    }
}
