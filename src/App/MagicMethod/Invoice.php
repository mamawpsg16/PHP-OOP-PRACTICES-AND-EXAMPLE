<?php
namespace App\MagicMethod;


class Invoice{
    // protected float $amount;
    protected array $data = [];

    // public function __construct(float $amount){
    //     $this->amount = $amount;
    // }
    /** CHECK IF PROPERTY IF EXISTS IF NOT THEN DYNAMICALLY CREATE IT OR RETURN SOMETHING */
    // public function __get(string $name){
    //     if(in_array($name, $this->data)){
    //         return $this->data[$name];
    //     }else{
    //         return $this->data[] = $name;
    //     }
    //     // if(property_exists($this, $name )){
    //     //     return $this->name;
    //     // }
    // }
    // public function __set(string $name, $value){
    //     // var_dump($name,$value);
    //     $this->data[] = $value;
    // }

    // public function __isset(string $name): bool {
    //     var_dump('ISSET');
    //     return in_array($name,$this->data);
    // }
    
    // public function __unset(string $name):void{
    //     var_dump('UNSET');
    //     unset($this->data[$name]);
    // }

    protected function process(float $amount,$description){
        var_dump($amount,$description,'PROCESS');
    }

    public function __call($name, $arguments ){
        if(method_exists($this, $name)){
            call_user_func_array([$this,$name],$arguments);
        }
        var_dump($name,$arguments);
    }
    public static function __callStatic($method, $args){
        var_dump('static',$method,$args);
    }
}