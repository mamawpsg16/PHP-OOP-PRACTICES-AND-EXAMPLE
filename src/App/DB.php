<?php
namespace App;

use PDO;

class DB{
    private PDO $pdo;
    public function __construct(array $config){
        $dsn      =  $config['DB_DRIVER'].':host='.$config['DB_HOST'].';dbname='.$config['DB_DATABASE'].'';
        $username =  $config['DB_USER'];
        $password =  $config['DB_PASSWORD'];
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        try {
            // set PDO attributes and perform database operations
            // $db = new PDO($dsn, $username, $password,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);

            $this->pdo = new PDO($dsn, $username, $password,$options);
        //    echo $_ENV['DB_USER'];
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function __call($method, $args){
        return call_user_func_array([$this->pdo,$method], $args);
    }
}