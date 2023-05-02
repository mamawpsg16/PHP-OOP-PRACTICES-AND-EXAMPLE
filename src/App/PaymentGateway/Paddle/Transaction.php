<?php 

namespace App\PaymentGateway\Paddle;
use App\Enums\Status;
class Transaction{
   
    private string $status;
    public static $count = 0;
    private $amount = 0;
    public function __construct(){
        self::$count +=1;
        // echo 'Transaction Paddle';
        /** ACCESS PRIVATE CONSTANT IN OWN CLASS */
        // var_dump(Self::STATUS_PENDING);
        // var_dump(Transaction::STATUS_PENDING);

        //  $this->setStatus(Status::PENDING);
    }

    public function getAmount(): float{
        return $this->amount;
    }

    public function setAmount(float $amount){
        $this->amount = $amount;
    }

    /** self = current class */
    // public function setStatus(string $status): self{
    //     if(!isset(Status::ALL_STATUS[$status])){
    //         throw new \InvalidArgumentException('Invalid Status');
    //     }
    //     $this->status = $status;

    //     /** RETURN $THIS FOR METHOD CHAINING */
    //     return $this;
    // }
}