<?php 
namespace App\AbstractPractice;

use App\InterfacePractice\RenderableInterface;

/** 
 * 
 * Abstract Classes

* - means "here is a pattern for your class, and some code that can start you off". The designer of the abstract class can mark 
* some methods as needing to be provided by the extending class (abstract), or as final, which means the class can't override them.

* An abstract class can provide some functionality and leave the rest for derived class.
* The derived class may or may not override the concrete functions defined in the base class.
* A child class extended from an abstract class should logically be related.
 * 
 */
abstract class Field implements RenderableInterface{
    public function __construct(protected string $name){

    }

}