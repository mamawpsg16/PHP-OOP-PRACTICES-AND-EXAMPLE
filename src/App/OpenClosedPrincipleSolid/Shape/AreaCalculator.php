<?php

declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\Shape;

class AreaCalculator{
    public function calculateArea(array $shapes){
        $area = 0;

        // foreach($shapes as $shape){
        //     if($shape instanceof Rectangle){

        //         $area += $shape->width * $shape->height;
        //     }else{
        //         $area += $shape->radius * $shape->radius;

        //     }
        // }

        foreach($shapes as $shape){
            if(in_array("App\OpenClosedPrincipleSolid\Shape\ShapeInterface", class_implements(get_class($shape)))){
                $area += $shape->area();
            }else{
                throw new \Exception(get_class($shape).' Should implement ShapeInterface!');
            }
        }

        return $area;
    }
}