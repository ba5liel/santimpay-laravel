<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class ChapaMetaResponse implements JsonSerializable
{
    public $message;
    public $status;
    public $ref_id;
    public $payment_status;

    public function __construct($message, $status, $ref_id, $payment_status)
    {
        $this->message = $message;
        $this->status = $status;
        $this->ref_id = $ref_id;
        $this->payment_status = $payment_status;
    }

    public function jsonSerialize()
    {
        return [
            'message' => $this->message,
            'status' => $this->status,
            'ref_id' => $this->ref_id,
            'payment_status' => $this->payment_status,
        ];
    }
}
