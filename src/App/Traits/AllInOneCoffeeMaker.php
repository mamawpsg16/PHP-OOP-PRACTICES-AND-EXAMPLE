<?php
namespace App\Traits;

class AllInOneCoffeeMaker extends CoffeeMaker{
    // use CapuccinoTrait{
    //     CapuccinoTrait::makeLatte as makeFakeLatte;
    // }
    // use LatteTrait{
    //     /* CONFLICT RESULOTION IF THERES A SAME NAME IN TRAITS 
    //      THEN JUST USE INSTEAD OF TO MAKE USE OF A CERTAIN METHOD IN A SPECIFIED TRAIT
    //     */
    //     LatteTrait::makeLatte insteadof CapuccinoTrait;
    // }
    // private string $milk_type = 'all-in-one-milk';

    use CapuccinoTrait{  
        CapuccinoTrait::makeCapuccino as public;
    }
    use LatteTrait;
    // public function getMilkType():string{
    //     return 'all-in-one-milk';
    // }
    // public function foo(){
    //     $this->makeCapuccino();
    // }
}