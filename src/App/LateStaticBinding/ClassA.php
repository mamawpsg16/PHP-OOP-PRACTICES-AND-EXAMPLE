<?php
namespace App\LateStaticBinding;

class ClassA{
    protected static $name = 'A';

    public static function getName():string{
        // var_dump(get_class($this));
        // var_dump(self::class);
        var_dump(get_called_class());
        /** self = early binding */
        /** this = late  binding */
        /** static = late  binding */
        return static::$name . PHP_EOL ;
    }

    public static function make(){
        return new static();
        // return new self();
        // return new self();
    }
}