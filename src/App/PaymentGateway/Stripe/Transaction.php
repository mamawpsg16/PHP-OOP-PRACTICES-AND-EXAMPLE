<?php 
namespace App\PaymentGateway\Stripe;

class Transaction{
    /** INSTEAD OF THIS PROPERTY PROMOTION */
        // public string $name;

        // public string $email;

        // public string $birth_date;

        // public function __construct(
        //     string $name, 
        //     string $email, 
        //     string $birth_date
        // ) {
        //     $this->name = $name;
        //     $this->email = $email;
        //     $this->birth_date = $birth_date;
        // }
    
    /** IT WILL BE THIS PROPERTY PROMOTION APPLIED */
    public function __construct(public string $name, public string $email, public string $birth_date) {
        echo 'WTF';
    }

    public function getName(){
        return $this->name;
    }
}