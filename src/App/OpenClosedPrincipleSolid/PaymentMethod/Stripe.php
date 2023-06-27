<?php
declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\PaymentMethod;

class Stripe implements PaymentMethodInterface{
    public function makePayment(){
        return 'Stripe';
    }
}
