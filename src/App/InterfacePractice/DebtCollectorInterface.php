<?php
namespace App\InterfacePractice;

// declare(strict_types=1);

interface DebtCollectorInterface{
    /** ALL METHOD IN INTERFACE MUST BE PUBLIC */
    /** YOU CANT DECLARE PROPERTIES IN INTERFACE */

    /** YOU CANT OVERRIDE CONSTANTS IN INTERFACE UNLIKE IN INHERITANCE */

    /**
     * 
     * Interface
     *  - means "here is a pattern for your class, but you have to write all the code yourself".
     *  Any methods and properties declared in the interface must be provided by the class that implements the interface
     * 
     *  interface cannot contain any functionality. It only contains definitions of the methods.
     *  The derived class MUST provide code for all the methods defined in the interface.

     *  Completely different and non-related classes can be logically grouped together using an interface.
     * 
  
     * 
     * 
     */
    public const MY_CONSTANT = 1;
    public function __construct();
    public function collect(float $owedMoney):float;
}