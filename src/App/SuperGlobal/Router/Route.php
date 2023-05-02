<?php
declare(strict_types=1);
namespace App\SuperGlobal\Router;
use App\Container;
use ReflectionClass;
use App\Attributes\Route as RouteAttribute;
use App\ErrorHandling\Exception\RouteNotFoundException;

class Route{
    private array $routes = [];

    public function __construct(private Container $container){
        
    }

    public function registerRouteWithAttribute(array $controllers){
        foreach($controllers as $controller){
            $class = new ReflectionClass($controller);
            // var_dump($class->getMethods(),$class->getName());
            // var_dump($class->getMethods());
            foreach($class->getMethods() as $method){
                $attributes  = $method->getAttributes(RouteAttribute::class, \ReflectionAttribute::IS_INSTANCEOF);
                foreach($attributes as $attribute){
                    $route = $attribute->newInstance();
                    // var_dump($route->path,$route->method);
                    $this->register($route->method, $route->path, [$controller, $method->getName()]);
                }
            }
            // $this->register()
        }
    }
    public function register(string $request_method, string $route, callable|array $action):self{
        $this->routes[$request_method][$route] = $action;

        return $this;
    }
    public function get(string $route, callable|array $action):self{
        return $this->register('get',$route,$action);
    }
    public function post(string $route, callable|array $action):self{
        return $this->register('post',$route,$action);
    }

    public function routes():array{
        return $this->routes;
    }

    public function resolve(string $requestUri, string $request_method){
        // var_dump($this->routes,$requestUri,$request_method);
        $route = explode('?',$requestUri)[0];
        // var_dump($this->routes);
        $action = $this->routes[$request_method][$route] ?? null;
        if(!$action){   
            throw new RouteNotFoundException();
        }

      
        if(is_callable($action)){
            // var_dump(call_user_func($action)); 
            
            return call_user_func($action);
        }

        if(is_array($action)){
            // var_dump($action);
            [$class, $method] =  $action;
            
            if(class_exists($class)){
                // var_dump(class_exists($class));
                $class = $this->container->get($class);
                if(method_exists($class,$method)){
                    return call_user_func_array([$class,$method],[]);
                } 
            }
        }

        throw new RouteNotFoundException();
    }

    // public function showRoutes(){
    //     return $this->routes;
    // }
}