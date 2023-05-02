<?php
namespace App\ErrorHandling\Exception;

/** CUSTOM EXCEPTION CLASS */
class MissingBillingException extends \Exception{
            protected $message = 'Missing billing information';
}