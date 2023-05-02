<?php
namespace App\InterfacePractice;

interface PaymentGatewayInterface{
    public function charge(array $customer, float $amount, float $tax): bool;
   
}