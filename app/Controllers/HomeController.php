<?php

namespace App\Controllers;

use App\Models\User;
use System\Http\Request;

class HomeController
{
    public function index()
    {
        $a = Request::get('a');
        dump($a);
        
        view('home');
    }
}