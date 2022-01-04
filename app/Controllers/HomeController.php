<?php

namespace App\Controllers;

use App\Models\User;
use System\Http\Request;

class HomeController
{
    public function index()
    {
        // var_dump(Request::get('a'));
        view('home');
    }
}