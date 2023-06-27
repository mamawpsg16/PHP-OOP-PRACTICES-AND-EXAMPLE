<?php

declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\Shape;



class Circle implements ShapeInterface{

    public function __construct(public $radius){
        
    }

    public function area(){
        return $this->radius * $this->radius ;
    }
}