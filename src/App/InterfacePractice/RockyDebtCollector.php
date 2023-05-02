<?php
namespace App\InterfacePractice;

class RockyDebtCollector implements DebtCollectorInterface{
    public function __construct(){

    }
    public function collect(float $owedMoney):float{
        return $owedMoney * 0.65;
    }
}