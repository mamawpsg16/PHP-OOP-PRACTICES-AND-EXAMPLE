<?php
namespace App\ErrorHandling\Exception;

class ViewNotFoundException extends \Exception{
    protected $message = 'View not found';
}