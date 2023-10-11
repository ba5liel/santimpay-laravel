<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class SantimPayCheckoutSession implements JsonSerializable
{
    public $id;
    public $transcation;
    public $totalAmount;
    public $test;
    public $uuid;
    public $created_at;
    public $update_at;

    public function __construct($id, $transcation, $totalAmount, $test, $uuid, $created_at, $update_at)
    {
        $this->id = $id;
        $this->transaction = $transcation;
        $this->totalAmount = $totalAmount;
        $this->test = $test;
        $this->uuid = $uuid;
        $this->created_at = $created_at;
        $this->update_at = $update_at;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "transaction" => $this->transaction,
            "totalAmount" => $this->totalAmount,
            "test" => $this->test,
            "uuid" => $this->uuid,
            "created_at" => $this->created_at,
            "update_at" => $this->update_at,
        ];
    }

    public static function fromJson(array $json)
    {
        return new SantimPayCheckoutSession($json["id"], isset($json["transaction"]) ? SantimPayTransaction::fromJson($json["transaction"]) : null, $json["totalAmount"], $json["test"], $json["uuid"], $json["createdAt"], $json["updatedAt"]);
    }
}
