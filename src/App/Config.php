<?php
namespace App;

/**
 * @property-read ?array $db
 */
class Config{
    protected array $config = [];
    public function __construct(array $env){
        $this->config =   [
            'db' => [
                'DB_HOST'      => $env['DB_HOST'],
                'DB_DATABASE'  => $env['DB_DATABASE'],
                'DB_USER'      => $env['DB_USER'], 
                'DB_PASSWORD'  => $env['DB_PASSWORD'],
                'DB_DRIVER'    => $env['DB_DRIVER'] ?? 'mysql'
            ]
        ];
    }

    public function __get(string $name){
        return $this->config[$name] ?? null;
    }
}

