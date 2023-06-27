<?php

declare(strict_types=1);

namespace App\LiskovSubstitutePrincipleSolid;

class AbcEmailService implements EmailServiceInterface {
    public function sendEmail($to, $subject, $message){

    }
}