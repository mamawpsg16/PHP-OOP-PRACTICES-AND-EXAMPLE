<?php

declare(strict_types=1);
namespace App\Controllers;


class GeneratorController{
    public function index(){
        $numbers = $this->lazyRange(1,5);
        foreach($numbers as $key => $value){
            echo 'key '.$key .'value =>'.$value .'<br/>';
        }
    }

    public function lazyRange(int $start, int $end):\Generator{
        for($i = $start; $i <= $end; $i++){
            yield $i * 2 => $i;
        }
    }
}