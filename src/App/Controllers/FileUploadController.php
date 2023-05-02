<?php
namespace App\Controllers;

class FileUploadController{
    public function index(){
        return '<form method="post" action="/upload" enctype="multipart/form-data">
        <input type="file" name="receipt" multiple/>
        <button type="submit">Upload</button>
        </form>';
    }

    public function store(){
        // var_dump($_FILES);

        // foreach($_FILES as $file){
            
        // }
        
        /** move file from tmp to local or anywhere*/
        $file_path = STORAGE_PATH.'/'.$_FILES['receipt']['name'];
        // var_dump($file_path,STORAGE_PATH);
        // return false;
        move_uploaded_file($_FILES['receipt']['tmp_name'],$file_path);
        header('Location:/');
        exit;
        // var_dump(pathinfo($file_path));
    }
}