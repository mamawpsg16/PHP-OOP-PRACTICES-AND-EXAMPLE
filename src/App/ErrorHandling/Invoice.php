<?php
namespace App\ErrorHandling;
use App\ErrorHandling\Exception\MissingBillingException;
class Invoice{
    public function __construct(public Customer $customer){

    }

    public function process(float $amount): void {
        if($amount <0 ){
            // throw new \Exception("Amount must be greater than 0");
            throw new \InvalidArgumentException("Amount must be greater than 0");
        }
        
        if(empty($this->customer->getBillingInfo())){
            /** CUSTOM EXCEPTION */
            throw new MissingBillingException();
        }
        echo 'Processing $'.$amount.' invoice -';

        sleep(1);

        echo 'OK'. '<br/>';
    }
}