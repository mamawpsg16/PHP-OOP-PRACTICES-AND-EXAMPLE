<?php

declare(strict_types=1);
namespace App;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use App\ErrorHandling\Exception\Container\NotFoundException;
use App\ErrorHandling\Exception\Container\ContainerException;

class Container implements ContainerInterface{

    private array $entries = [];
    public function get(string $id){
        if($this->has($id)){
            // throw new NotFoundException('Class "'.$id. '" has no binding');
            $entry = $this->entries[$id];
            if(is_callable($entry)){
                return $entry($this);
            }
            $id = $entry;
        }

        return $this->resolve($id);
        
    }

    public function resolve(string $id){
        // 1.Inspect the class that we are trying to get from the container
        $reflection_class = new \ReflectionClass($id);
        if(!$reflection_class->isInstantiable()){
            throw new ContainerException('Class "'.$id.'" is not instantiable');
        }
        // 2. Inspect the constructor of the class
        
        $constructor = $reflection_class->getConstructor();
        if(!$constructor){
            return new $id;
        }
        
        // 3. Inspect the constructor parameters of the class ( dependencies )
        $parameters = $constructor->getParameters();

        if(!$parameters){
            return new $id;
        }

        // 4. If the constructor parameter is a class then try to resolve  that class using the container
        $dependencies = array_map(function(\ReflectionParameter $parameter) use($id){
            $name = $parameter->getName();
            $type = $parameter->getType();
            // var_dump($type->getName());

            if(!$type){
                throw new ContainerException('Failed to resolve class "'.$id.'" because param "'. $name.'" is missing a type hint');
            }

            if($type instanceof \ReflectionUnionType){
                throw new ContainerException('Failed to resolve class "'.$id.'" because of union type for param "'. $name.'" is missing a type hint');
            }

            if($type instanceof \ReflectionNamedType && !$type->isBuiltin()){
                return $this->get($type->getName());
            }

            throw new ContainerException('Failed to resolve class "'.$id.'" because of invalid param "'. $name.'"');


        }, $parameters);
        
        return $reflection_class->newInstanceArgs($dependencies);
    }

    public function has(string $id):bool{
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete){
        // var_dump($concrete);
        $this->entries[$id] = $concrete;
    }

    public function entries():array{
        return $this->entries;
    }

}