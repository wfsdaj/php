<?php

namespace App\Controllers;

use App\Models\User;
use System\Http\Request;
use System\Support\Hash;

class HomeController
{
    public function index()
    {
        view('home');
    }
}