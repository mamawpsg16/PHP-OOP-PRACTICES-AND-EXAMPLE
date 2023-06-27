<?php
declare(strict_types =1);
namespace App\OpenClosedPrincipleSolid\PaymentMethod;

class CashOnDelivery implements PaymentMethodInterface{

        public function makePayment(){
            return 'Cash On Delivery';
        }
}
