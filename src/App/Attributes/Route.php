<?php
namespace App\Attributes;

use Attribute;
use App\InterfacePractice\RouteInterface;


#[Attribute]
class Route implements RouteInterface{
    public function __construct(public string $path,public string $method = 'get'){

    }
}