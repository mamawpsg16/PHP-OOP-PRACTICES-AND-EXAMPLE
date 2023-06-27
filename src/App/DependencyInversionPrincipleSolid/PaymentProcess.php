<?php

declare(strict_types=1);

namespace App\DependencyInversionPrincipleSolid;

class PaymentProcess{
    public function __construct(protected PaymentMethodInterface $payment_method){

    }

    public function pay(){
        return $this->payment_method->makePayment();
    }
}