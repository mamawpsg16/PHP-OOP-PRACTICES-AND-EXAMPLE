<?php
declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\PaymentMethod;
class PaymentService{
    public function pay(PaymentMethodInterface $paymentMethod){
        return $paymentMethod->makePayment();
    }
}
