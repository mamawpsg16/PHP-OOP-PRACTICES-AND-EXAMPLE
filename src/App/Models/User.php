<?php
declare(strict_types=1);
namespace App\Models;


class User extends \App\Model{

    public function create($email, $name, $is_active = 1){
        $stmt = $this->db->prepare(
            'INSERT INTO users (email,full_name,is_active, created_at) VALUES(?, ?, ?, ?)'
        );

        $stmt->execute([$email,$name,$is_active,date('Y-m-d H:i:s')]);

        return (int) $this->db->lastInsertId();
    }
    
}