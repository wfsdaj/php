<?php

namespace App\Controllers;

use App\Models\User;
use System\Http\Request;

class HomeController
{
    public function index()
    {
        view('home');
    }
}