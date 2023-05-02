<?php
namespace App\ErrorHandling\Exception\Container;

use Psr\Container\NotFoundExceptionInterface;


class NotFoundException extends \Exception implements NotFoundExceptionInterface{

}