<?php
namespace App\Models;

class SignUp extends \App\Model{
    public function __construct(protected User $user_model,protected Invoice $invoice_model){
        parent::__construct();
    }

    public function register(array $user_details, array $invoice_details):int{
        try{
            $this->db->beginTransaction();
            $user_id = $this->user_model->create($user_details['email'], $user_details['fullname']);
            $invoice_id = $this->invoice_model->create($user_id, $invoice_details['amount']);
            
            $this->db->commit();
        }catch(\Throwable $e){
            // echo 'FUCK';
            if($this->db->inTransaction()){
                $this->db->rollback();
            }
        }
        $invoice_id  = $invoice_id ?? null;
        return (int) $invoice_id;
    }
}