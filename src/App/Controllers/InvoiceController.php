<?php 
namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
// use App\Attributes\Route;
use App\View;

class InvoiceController{
    #[Get('/invoices')]
    public function index(): string{
        return View::make('invoices/index');
    }
    #[Get('/invoices/create')]
    public function create(): string{
        return View::make('invoices/create');
    }
    #[Post('/invoices/create')]
    public function store(){
        var_dump($_POST['shit']);
    }
    #[Get('/invoices/edit')]
    public function edit(){
        var_dump($_POST['shit']);
    }
    #[Put('/invoices/update')]
    public function update(){
        var_dump($_POST['shit']);
    }
}