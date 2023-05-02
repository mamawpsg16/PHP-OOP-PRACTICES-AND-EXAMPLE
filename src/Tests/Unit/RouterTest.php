<?php
declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\SuperGlobal\Router\Route;
use App\ErrorHandling\Exception\RouteNotFoundException;



class RouterTest extends TestCase{

    /** 
     * to test a specific method use ./vendor/bin/phpunit --filter "methodname" 
     */

     /**
      * to  test specific files ./vendor/bin/phpunit Tests\Unit\Services\InvoiceServiceTest.php
      */
  
    private Route $router;
    /** CALLED BEFORE EACH TEST IS RUN */
    protected function setUp():void{
        parent::setUp();

        $this->router = new Route();
    }
    /** @test */
    public function it_registeres_a_route():void{

        //given that we have a route class/object

        //when we call a register method
        $this->router->register('get','/users',['controller','index']);

        //expected output
        $expected = [
            'get' => [
                '/users' => ['controller', 'index']
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected,$this->router->routes());
    }
     /** @test */
    public function it_registeres_a_get_route():void{
        //given that we have a route class/object

        //when we call a register method
        $this->router->get('/usersget',['controllerget','index']);

        //expected output
        $expected = [
            'get' => [
                '/usersget' => ['controllerget', 'index']
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected,$this->router->routes());
    }
    /** @test */
    public function it_registeres_a_post_route():void{
        //given that we have a route class/object

        //when we call a register method
        $this->router->post('/userspost',['controllerpost','store']);

        //expected output
        $expected = [
            'post' => [
                '/userspost' => ['controllerpost', 'store']
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected,$this->router->routes());
    }
    /** @test */
    public function there_is_no_routes_when_router_is_created():void{

        $this->assertEmpty((new Route())->routes());
    }
    /** @test
     * @dataProvider \Tests\DataProvider\RouterDataProvider::routeNotFoundCases
     */
    public function it_throws_route_not_found(string $requestUri, string $requestMethod):void{
        $users = new class(){
            public function delete():bool{
                return true;
            }
        };

        $this->router->post('/users',[$users::class,'store']);
        $this->router->get('/users',['User','index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }
    /** @test */
    public function it_resolves_route_from_a_callback():void{
        $this->router->get('/users',fn() => [1,2,3]);

        $this->assertEquals([1, 2, 3], $this->router->resolve('/users','get'));
    }

    public function it_resolves_route():void{
        $users = new class(){
            public function index():array{
                return [1,2,3];
            }
        };
        
        $this->router->get('/users',[$users::class, 'index']);
        $this->assertSame([1, 2, 3], $this->router->resolve('/users','get'));
    }

}