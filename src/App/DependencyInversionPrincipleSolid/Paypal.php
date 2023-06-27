<?php 
namespace App\DependencyInversionPrincipleSolid;

class Paypal implements PaymentMethodInterface {

    public function makePayment(){
        return 'Paypal';
    }
}