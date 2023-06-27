<?php

declare(strict_types=1);

namespace App\LiskovSubstitutePrincipleSolid;

class EmailService{

    public function sendMessage($emailService){
        $emailService->sendEmail($to, $subject, $message);
    }
}

$emailService = new EmailService;
$emailService->sendMessage(new AbcEmailService); 