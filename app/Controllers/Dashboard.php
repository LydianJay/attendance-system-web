<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    private $private_data;

    public function __construct()
    {
        
    }

    private function get_statistics() 
    {
        $this->private_data['count'] 
        = $this->db->table('employee')
        ->selectCount('id')
        ->get()
        ->getResult()[0];

        $this->private_data['check_in'] 
        = $this->db->table('attendance')
        ->where('type', '1')
        ->get()
        ->getResult();

        $this->private_data['check_out']
        = $this->db->table('attendance')
        ->where('type', '2')
        ->get()
        ->getResult();

        $this->private_data['checkIns'] = $this->db->table('attendance')
        ->select('date, time') // Assuming your columns are named 'date' and 'time'
        ->where('type', '1') // Check-ins only
            ->get()
            ->getResultArray();


        $this->private_data['checkOuts'] = $this->db->table('attendance')
        ->select('date, time') // Assuming your columns are named 'date' and 'time'
        ->where('type', '2') // Check-ins only
        ->get()
        ->getResultArray();
    }


    public function index()
    {

        $this->get_statistics();

        echo view('header', $this->data);
        echo view('modules/dashboard/view', $this->private_data);
        echo view('footer');
    }


    
}
