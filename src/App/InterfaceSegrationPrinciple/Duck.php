<?php

declare(strict_types=1);

namespace App\InterfaceSegrationPrinciple;

class Duck implements  SpeakableInterface, WalkableInterface , FlyableInterface {
    public function speak(){
        return 'DUCK IS SPEAKING';
    }
    public function fly(){
        return 'DUCK IS FLYING';
        
    }
    public function walk(){
        return 'DUCK IS WALKING';
        
    }
}