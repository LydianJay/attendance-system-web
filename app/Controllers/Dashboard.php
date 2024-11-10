<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {

        echo view('header', $this->data);
        echo view('footer', $this->data);
    }
}
