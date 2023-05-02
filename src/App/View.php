<?php
declare(strict_types=1);
namespace App;
use App\ErrorHandling\Exception\ViewNotFoundException;
class View{
    public function __construct(protected string $view, protected array $params = []){

    }

    public static function make(string $view, array $params = []):static{
        return new static($view,$params);
    }

    public function render():string{
        $file_path = VIEW_PATH.'/'.$this->view .'.php';
        if(!file_exists($file_path)){
            return throw new ViewNotFoundException();
        }
        
        ob_start();
        // var_dump($this->params['invoice']);
        if($this->params){
            foreach($this->params as $key => $value){
                ${$key} = $value;
            }
        }
        include_once VIEW_PATH.'/'.$this->view .'.php';

        return (string)ob_get_clean();
    }

    public function __toString():string{
        return $this->render();
    }
}

