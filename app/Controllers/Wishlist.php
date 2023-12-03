<?php

namespace App\Controllers;

class Wishlist extends BaseController
{
    public function index()
    {
        $data = [
          'title'  => "Wishlist | E-Library"
        ];
        return view('buku/wishlist', $data);
    }
}