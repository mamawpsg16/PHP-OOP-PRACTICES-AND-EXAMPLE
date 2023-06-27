<?php

declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\Shape;



class Rectangle implements ShapeInterface{

    public function __construct(public $height, public $width) {
        
    }

    public function area() {
        return ($this->width * $this->height);
    }
}
