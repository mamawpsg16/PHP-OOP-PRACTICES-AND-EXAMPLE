<?php
namespace App\Traits;


trait CapuccinoTrait{
     /** COMPOSING TRAITS FROM OTHER TRAITS */
    //  use LatteTrait;
    // public function makeCapuccino(){
    //     echo static::class .' is making Capuccino'.PHP_EOL;
    // }
    private function makeCapuccino(){
        echo static::class .' is making Capuccino'.PHP_EOL;
    }

    // public function makeLatte(){
    //     echo static::class .' is making (Fake Latte)'.PHP_EOL;
    // }
}