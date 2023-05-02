<?php
declare(strict_types = 1);
namespace App;
class Toaster{
    protected array $slices;
    // protected array $slices =[];
    /** PRIVATE METHOD PROPERTY STATIC CANT REASSIGN NEW VALUE IN THE INHERITANCE CLASS  */
    protected int $size;
    // protected int $size = 2;

    public function __construct(){
        $this->slices = [];
        $this->size = 2;
    }

    public function addSlice(string $slice): void{
        if(count($this->slices) < $this->size){
            $this->slices[] = $slice;
        }
    }


    public function toast(){
        foreach($this->slices as $key => $slice){
            echo ($key + 1).' : Toasting '. $slice. '<br/>';
        }
    }
}