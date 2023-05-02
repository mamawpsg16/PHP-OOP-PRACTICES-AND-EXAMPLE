<?php 
namespace App\Controllers;
use App\App;
use App\View;
use App\Container;
use App\Models\User;
use App\Models\SignUp;
use App\Services\InvoiceService;
use App\Attributes\Route;

class HomeController{

    public function __construct(private InvoiceService $invoiceService)
    {
    }

    #[Route('/')]
    public function index(): string{
        // var_dump($_GET);
        // var_dump($_POST);
        // /** COMBINE OF POST AND GET */
        // var_dump($_REQUEST);        
        $this->invoiceService->process([], 24);
     

        $db = App::db();
        $email = 'shitdoaea@gamail.com';
        $fullname = 'Janfawe Doe';
        $is_active = 1;
        $created_at = date('Y-m-d H:i:s');
        $amount = 500;
        $user_id = null;
        // $query = 'SELECT * FROM users WHERE email = ?';
        // $query = 'INSERT INTO users(email,full_name,is_active, created_at) VALUES(?,?,?,?)';
        $user_model = new User();
        $invoice_model = new \App\Models\Invoice();

        $invoice_id  = (new SignUp($user_model, $invoice_model))->register(
                [
                    'email'    => $email, 
                    'fullname' => $fullname
                ],
                [
                    'amount'  => $amount
                ]
            );

        $invoice = $invoice_model->find($invoice_id);
        // var_dump($invoice_model->find($invoice_id)['amount']);

        // return View::make('index',['invoice'=> $invoice]);

        return View::make('index');
        // return View::make('index', ['invoice' => $invoice, 'shit' => 'dogshit']);
        // try{
        //     $db->beginTransaction();

        //     // $new_user     = 'INSERT INTO users (email,full_name,is_active, created_at) VALUES(:email, :full_name, :is_active, :created_at)';
        //     // $user_invoice = 'INSERT INTO invoices (user_id,amount) VALUES(:user_id, :amount)';
            

        //     // echo $query .'<br/>';
        //     $user_id = $user_model->create($email, $fullname);
        //     $invoice_id = $invoice_model->create($user_id, $amount);
            
        //     // $new_user_stmt = $db->prepare($new_user);
        //     // $user_invoice_stmt = $db->prepare($user_invoice);

        //     // $new_user_stmt->bindParam('email',$email);
        //     // $new_user_stmt->bindParam('full_name',$fullname);
        //     // $new_user_stmt->bindParam('is_active',$is_active);
        //     // $new_user_stmt->bindParam('created_at',$created_at);
        //     // $new_user_stmt->execute();

        //     // $user_id = (int) $db->lastInsertId();

        //     // $user_invoice_stmt->bindParam('user_id',$user_id);
        //     // $user_invoice_stmt->bindParam('amount',$amount);

        //     // $user_invoice_stmt->execute();
        //     $db->commit();
        // }catch(\Throwable $e){
        //     if($db->inTransaction()){
        //         $db->rollback();
        //     }
        // }
        // $stmt->execute(['email' => $email,'full_name'=> $fullname,'is_active' => $is_active,'created_at' => $created_at]);
        // var_dump($stmt->fetchAll());
        // $user = $db->query('SELECT * FROM users WHERE id = "'.$user_id.'"')->fetch();
        // $user_details = $db->prepare('SELECT i.id as invoice_id, i.amount, i.user_id, u.full_name FROM invoices as i INNER JOIN users as u ON i.user_id = u.id  WHERE email LIKE ?');
        
        // $user_details->execute(['%'. $email .'%']);
        // // $user_details->execute([':email'=>$email]);
        // echo '<pre>';
        // var_dump($user_details->fetch());
        // echo '</pre>';
        // foreach( $db->query($query)->fetchAll() as $user){
        //     echo '<pre>';
        //         // var_dump($user);
        //     echo '<pre/>';
        // }
       
    }
} 