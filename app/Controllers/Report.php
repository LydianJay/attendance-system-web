<?php

namespace App\Controllers;

class Report extends BaseController
{
    private $private_data;

    public function __construct()
    {
        $private_data['module_name'] = 'report';
    }

   


    public function index()
    {

        echo view('header', $this->data);
        echo view('modules/report/view');
        echo view('footer');
    }


}
