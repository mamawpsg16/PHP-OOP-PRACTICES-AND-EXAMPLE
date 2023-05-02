<?php
namespace App\ErrorHandling;

class Customer{
    public function __construct(private array $billing_info = [1]){

    }

    public function getBillingInfo(): array {
        return $this->billing_info;
    }
}