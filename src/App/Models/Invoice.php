<?php
declare(strict_types=1);
namespace App\Models;


class Invoice extends \App\Model{

    public function create(int $user_id, float|int $amount){
        $stmt = $this->db->prepare('INSERT INTO invoices (user_id,amount) VALUES(?, ?)');

        $stmt->execute([$user_id,$amount]);

        return (int) $this->db->lastInsertId();
    }

    public function find(int $id): array{
        $stmt = $this->db->prepare('SELECT i.id, i.amount, u.full_name FROM invoices as i LEFT JOIN users as u ON i.user_id = u.id WHERE i.id = ?');

        $stmt->execute([$id]);

        $invoice = $stmt->fetch();
        return $invoice ? $invoice : [];
    }
    
}