<?php
namespace App\Service;

// use App\InterfacePractice\CollectionAgency;
use App\InterfacePractice\DebtCollectorInterface;

class DebtCollectionService{
    public function collectDebt(DebtCollectorInterface $collector){
        // var_dump($collector instanceof RockyDebtCollector);
        $owed_amount = mt_rand(100,1000);

        $collected_amount = $collector->collect($owed_amount);

        echo 'Collected $'.$collected_amount.'out of $'.$owed_amount .PHP_EOL;
    }
}