<?php
namespace App\Traits;

trait LatteTrait{
    /** STATIC PROPERTY OR METHODS ARE NOT SHARED IN UNDERLYING CLASSES USED THE TRAIT */
    /** NOT ALLOW TO REDEFINE PROPERTY IN USED CLASSES UNLESS ITS ALL THE SAME */
    // protected string $milk_type = 'cow milk';
    public string $milk_type = 'cow milk';
    public static int $x = 1;
    public function makeLatte(){
        /** static:class = __CLASS__ */
        echo __CLASS__ .' is making Latte with '.$this->milk_type.PHP_EOL;
    }

    public static function foo(){
        echo 'FooBar';
    }

    // abstract public function getMilkType():string;
    public function setMilkType(string $milk_type):static{
        // if(property_exists($this,'milkType')){
            $this->milk_type = $milk_type;
        // }
        return $this;
    }
}