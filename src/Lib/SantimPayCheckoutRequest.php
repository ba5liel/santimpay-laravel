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

    public function __construct(
        $id,
        $amount,
        $paymentReason,
        $successRedirectUrl,
        $failureRedirectUrl,
        $notifyUrl,
        $cancelRedirectUrl
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->paymentReason = $paymentReason;
        $this->successRedirectUrl = $successRedirectUrl;
        $this->failureRedirectUrl = $failureRedirectUrl;
        $this->notifyUrl = $notifyUrl;
        $this->cancelRedirectUrl = $cancelRedirectUrl;
    }

    public function jsonSerialize()
    {
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
