<?php
declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\PaymentMethod;

class Paypal implements PaymentMethodInterface{
    public function makePayment(){
        return 'Paypal';
    }
}
