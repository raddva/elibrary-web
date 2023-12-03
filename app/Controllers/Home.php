<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if ($this->session->has('userIsLogin')) {
            return redirect()->to('/user');
        }
        $data = [
            'title' => "E-Library"
        ];
        return view('user/landing_page', $data);
    }
}
