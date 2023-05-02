<?php
namespace App\Attributes;

use Attribute;
use App\Attributes\Route;


#[Attribute]
class Post extends Route{
    public function __construct(public string $path){
        parent::__construct($path, 'post');
    }
}