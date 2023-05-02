<?php
namespace App\Traits;

class Invoice{
    use Mail;

    public function __construct(public float $amount, public string $description){
    }
    
    public function process(){
        echo 'Process Invoice';
        $this->sendEmail();
        return true;

    }
}