<?php

declare(strict_types=1);

namespace App\DependencyInversionPrincipleSolid;

interface PaymentMethodInterface{
    public function makePayment();
}