<?php
declare(strict_types=1);

namespace App\Models;

use App\View;

class Transaction  extends \App\Model{

    public function getData(){
        $transactions = $this->db->prepare('SELECT * FROM transactions');
        $transactions->execute();
        $data = $transactions->fetchAll();

        return $data;
    }


    public function save(array $data) : void{
        // var_dump(date('Y-m-d H:i:s',strtotime($data[0]['date'])));
        // $data[0]['date']);
        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare(
                'INSERT INTO transactions (check_number, transaction_number, amount, date) VALUES(:check_number, :transaction_number, :amount, :date)'
            );

            foreach ($data as $receipt) {
                $stmt->bindParam(':check_number', $receipt['check_number']);
                $stmt->bindParam(':transaction_number', $receipt['transaction_number']);
                $stmt->bindParam(':amount', $receipt['amount']);
                $stmt->bindParam(':date',$receipt['date']);
                $stmt->execute();
            }

        }catch(\Throwable $e){
            // echo 'FUCK';
            if($this->db->inTransaction()){
                $this->db->rollback();
            }
        }
    }

    public function create($email, $name, $is_active = 1){
        $stmt = $this->db->prepare(
            'INSERT INTO users (email,full_name,is_active, created_at) VALUES(?, ?, ?, ?)'
        );

        $stmt->execute([$email,$name,$is_active,date('Y-m-d H:i:s')]);

        return (int) $this->db->lastInsertId();
    }
}