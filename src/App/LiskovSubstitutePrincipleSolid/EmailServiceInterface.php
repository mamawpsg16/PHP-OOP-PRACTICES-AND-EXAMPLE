<?php

declare(strict_types=1);

namespace App\LiskovSubstitutePrincipleSolid;

interface EmailServiceInterface{
    public function sendEmail(string $to, string $subject, string $message);
}