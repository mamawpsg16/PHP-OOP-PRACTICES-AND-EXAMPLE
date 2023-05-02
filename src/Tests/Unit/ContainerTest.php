<?php
declare(strict_types=1);

namespace Tests\Unit;
use App\Container;
use PHPUnit\Framework\TestCase;
use App\Services\PaddleGatewayService;


class ContainerTest extends TestCase{
    /** @test */
    public function testCanBindConcreteClassToEntriesArray(){

        // $container = new Container();
        // $container->get(PaddleGatewayService::class);
        // var_dump($container->entries());
        // $expected = [
        //     'App\InterfacePractice\PaymentGatewayInterface' =>  'App\Services\PaddleGatewayService'
        // ];

        // //then we assert route was registered
        // $this->assertEquals($expected,$container->entries());
    }
}