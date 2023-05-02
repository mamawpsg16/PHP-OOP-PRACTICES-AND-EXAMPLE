<?php
declare(strict_types = 1);
namespace App;
class FancyOven{

    //COMPOSITION
    public function __construct(private ToasterPro $toaster){

    }
    public function fry(){

    }

    public function toast(){
        $this->toaster->toast();
    }
    public function  toastBagel(){
        $this->toaster->toastBagel();

    }
}