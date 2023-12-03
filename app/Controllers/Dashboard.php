<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
          'title'  => "Dashboard | E-Library"
        ];
        return view('user', $data);
    }
}