<?php
namespace App\Iterate;
 
// class InvoiceCollection implements \Iterator{
class Collection implements \IteratorAggregate{
    // public int $key= 0;
    public function __construct(public array $items){

    }

    public function getIterator(): \Traversable{
        return new \ArrayIterator($this->items);
    }

}