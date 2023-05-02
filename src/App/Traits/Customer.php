<?php
namespace App\Traits;

class Customer {
    use Mail;
    public function updateProfile(){
        echo 'Profile updated '.PHP_EOL;
        $this->sendEmail() .PHP_EOL;
    }
}