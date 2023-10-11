<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class SantimPayTransaction implements JsonSerializable
{
    // TODO: transactionStatus: string; change to enum
    // TODO: paymentType: string; change to enum


    public $id;
    public $transaction_id;
    public $payment_type;
    public $transaction_status;
    public $created_at;
    public $updated_at;

    public function __construct($id, $transaction_id, $payment_type, $transaction_status, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->transaction_id = $transaction_id;
        $this->payment_type = $payment_type;
        $this->transaction_status = $transaction_status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "transactionId" => $this->transaction_id,
            "paymentType" => $this->payment_type,
            "transactionStatus" => $this->transaction_status,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }

    public static function fromJson($data)
    {
        return new SantimPayTransaction($data["id"], $data["transactionId"], $data["paymentType"], $data["transactionStatus"], $data["createdAt"], $data["updatedAt"]);
    }
}
