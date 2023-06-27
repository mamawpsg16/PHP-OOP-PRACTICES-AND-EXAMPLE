<?php

declare(strict_types=1);

namespace App\InterfaceSegrationPrinciple;

class Penguin implements SpeakableInterface, WalkableInterface {
    public function speak(){
        return 'Penguin IS SPEAKING';
    }
  
    public function walk(){
        return 'Penguin IS WALKING';
        
    }
}