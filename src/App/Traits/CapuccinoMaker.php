<?php
namespace App\Traits;

class CapuccinoMaker extends CoffeeMaker{
   
    /** CHANGE TRAIT VISIBILITY */
    use CapuccinoTrait{  
        CapuccinoTrait::makeCapuccino as public;
    }

    // public function setMilkType():string{
    //     return 'capuccino-milk';
    // }

//    public function makeCapuccino(){
//         echo static::class .' is making Capuccino Updated'.PHP_EOL;
//    }
}