<?php

namespace App\Controllers;

class Table extends BaseController
{
    private $private_data;

    public function __construct() 
    {
        $private_data['module_name'] = 'Tables';
    }

    private function _insertAttendance($id, $type) 
    {
        $d = [
            'emp_id' => $id,
            'time' => date('h:i'),
            'date' => date('m-d-Y'),
            'type' => $type,
        ];
        $this->db->table('attendance')->insert($d);
    }


    public function index()
    {

        echo view('header', $this->data);
        echo view('footer');
    }


    public function insert()
    {
        // $this->request->getPost();
        $json = $this->request->getJSON();


        $this->_insertAttendance($json->id, $json->type);
        return $this->response->setJSON(['status' => 'okay']);
    }
}
