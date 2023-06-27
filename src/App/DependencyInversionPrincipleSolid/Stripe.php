<?php 
namespace App\DependencyInversionPrincipleSolid;

class Stripe implements PaymentMethodInterface {

    public function makePayment(){
        return 'Stripe';
    }
}