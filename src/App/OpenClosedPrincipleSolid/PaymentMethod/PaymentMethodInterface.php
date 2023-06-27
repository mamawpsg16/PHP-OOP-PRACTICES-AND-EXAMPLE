<?php

declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\PaymentMethod;

interface PaymentMethodInterface{
    public function makePayment();
}