<?php
namespace App\ErrorHandling\Exception;

class RouteNotFoundException extends \Exception{
    protected $message = '404 Page not found';
}