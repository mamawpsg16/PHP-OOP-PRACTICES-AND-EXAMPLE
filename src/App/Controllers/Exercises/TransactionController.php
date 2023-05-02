<?php
declare(strict_types=1);

namespace App\Controllers\Exercises;

use App\View;
use App\Models\Transaction;
// require_once  dirname(dirname(__DIR__)).'/Helpers/format.php';

class TransactionController{

    public function __construct(){

    }

    public function index(){
        // var_dump(formatDate('2022-01-01'));
        $transaction_model = new Transaction();
        
        return View::make('transactions/index',['transactions' => $transaction_model->getData()]);
    }
    
    public function create(){
        return View::make('transactions/create');
    }

    public function store(){
    if(isset($_FILES['receipt']) && is_uploaded_file($_FILES['receipt']['tmp_name'])) {
        // get the temporary file name of the uploaded CSV file
        $tmp_file = $_FILES['receipt']['tmp_name'];
        // open the CSV file for reading
        if (($handle = fopen($tmp_file, "r")) !== FALSE) {
            fgetcsv($handle);
            $data = [];
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // push each row of data into the $data variable
                $data[] = [
                            'date'               => date('Y-m-d H:i:s',strtotime($row[0])),
                            'check_number'       => $row[1],
                            'transaction_number' => $row[2],
                            'amount'             => str_replace([',','$'],'',$row[3]),
                        ];
            }
            fclose($handle);

            $transaction_model = new Transaction();
            $transactions = $transaction_model->save($data);

            // return the array of data
            // return $data;
        } else {
            // return an error message if the CSV file cannot be opened
            return "Error opening CSV file";
        }
        } else {
        // return an error message if no CSV file was uploaded
        return "No CSV file uploaded";
        }
        
        return View::make('transactions/index');
    }

}