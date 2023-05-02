<?php
declare(strict_types = 1);
namespace App;
class ToasterPro extends Toaster{
    public int $size = 4;

    public function __construct(){

        parent::__construct();
        $this->size = 4;
    }

    // final keyword before class or method prevents class inheritance and method overriding
    public function toastBagel(){
        foreach($this->slices as $key => $slice){
            echo ($key + 1).' : Toasting '. $slice. 'wuth bagels','<br/>';
        }
    }
}