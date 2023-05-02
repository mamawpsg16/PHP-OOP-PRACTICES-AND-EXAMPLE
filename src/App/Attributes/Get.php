<?php
namespace App\Attributes;

use Attribute;
use App\Attributes\Route;


#[Attribute]
class Get extends Route{
    public function __construct(public string $path){
        parent::__construct($path, 'get');
    }
}