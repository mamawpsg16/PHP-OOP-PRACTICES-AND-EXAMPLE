<?php
namespace App\InterfacePractice;

// declare(strict_types=1);

class CollectionAgency implements DebtCollectorInterface, AnotherInterface{
    public function __construct(){

    }
    public function collect(float $owedMoney):float{
        $guaranteed = $owedMoney * 0.5;
        /** mt_rand(min_integer,max_integer) */
        return mt_rand($guaranteed,$owedMoney);
    }
    public function foo(){

    }
}