<?php

namespace App\Controllers;

class Attendance extends BaseController
{
    private $private_data;

    public function __construct()
    {
        $private_data['module_name'] = 'Tables';
        
    }

    private function get_attendance() 
    {
        $this->private_data['attendance'] = $this->db->table('attendance')
        ->select('*')
        ->join('employee', 'emp_id = id')
        ->orderBy('date')
        ->limit(25)
        ->get()
        ->getResult();
    }
    


    public function index()
    {   

        $this->private_data['table_head'] = [
            'Name', 'Date', 'Time', 'Status'
        ];
        $this->get_attendance();

        echo view('header', $this->data);
        echo view('modules/attendance/view', $this->private_data);
        echo view('footer');
    }


   
}
