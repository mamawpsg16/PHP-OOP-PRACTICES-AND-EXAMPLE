<?php
declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\ExportFormat;

use App\Models\User;

class SalesReport{
    public $users = array();
    private $user_details =[
        [
            'name'=> 'Kevin Mensah',
            'age' => 19,
            'created_at' =>'2023-06-27'
        ],
        [
            'name'=> 'Rojenson Lugo',
            'age' => 18,
            'created_at' =>'2023-06-26'
        ],
        [
            'name'=> 'Ricardo Gubat',
            'age' => 24,
            'created_at' =>'2023-06-28'
        ],

    ];
    public function between($start, $end){
        var_dump($this->user_details);
        foreach ($this->user_details as $user) {
            $createdAt = strtotime($user['created_at']);
            $startTimestamp = strtotime($start);
            $endTimestamp = strtotime($end);
        
            if ($createdAt >= $startTimestamp && $createdAt <= $endTimestamp) {
                $this->users[] = $user;
            }
        }
        // $this->users = User::whereBetween('created_at',[$start,$end])->get();

        var_dump($this->users);
        return $this;
    }

    public function export(SalesReportFormatInterface $format){
        return $format->export($this->users);
    }
}