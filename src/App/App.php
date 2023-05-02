<?php

namespace App;

use App\DB;
use App\Container;
use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\SalesTaxService;
use App\SuperGlobal\Router\Route;
use App\Services\PaddleGatewayService;
use App\Services\PaymentGatewayService;
use App\InterfacePractice\PaymentGatewayInterface;

class App{

    private static DB $db;
    // public static Container $container;
    // protected Container $container;
    public function __construct(protected Container $container, protected Route $router, protected array $request, protected Config $config){
        static::$db = new DB($config->db ?? []);
        // static::$container = new Container();
        // $this->container->set(PaymentGatewayInterface::class,PaymentGatewayService::class);
        $this->container->set(PaymentGatewayInterface::class,PaddleGatewayService::class);
        // static::$container->set(InvoiceService::class, fn(Container $c)=> new InvoiceService($c->get(SalesTaxService::class), $c->get(PaymentGatewayService::class), $c->get(EmailService::class)));
        // static::$container->set(SalesTaxService::class, fn() => new SalesTaxService());
        // static::$container->set(EmailService::class, fn() => new EmailService());
        // static::$container->set(PaymentGatewayService::class, fn() => new PaymentGatewayService());
    }

    public static function db(): DB{
        return static::$db;
    }


    public function run(){
        // var_dump($this->router->routes());
        try{
            // echo 'shit 2 ';
            echo $this->router->resolve($this->request['uri'],$this->request['request_method']);
        }catch(\App\ErrorHandling\Exception\RouteNotFoundException){
            // header('HTTP/1.1 404 Page Not Found');
            echo 'shit 1 ';
            http_response_code(404);
            echo View::make('error/404');
        }
    }
}