<?php

declare(strict_types = 1);

namespace App\Services;

use App\InterfacePractice\PaymentGatewayInterface;

class PaddleGatewayService implements PaymentGatewayInterface
{
    public function charge(array $customer, float $amount, float $tax): bool
    {
        echo 'WOW GRAPE';

        return  true;
    }
}