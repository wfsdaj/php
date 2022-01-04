<?php

namespace App\Controllers;

use App\Models\User;
use System\View;

class HomeController
{
    public function index()
    {
        $user = new User();
        $users = $user->all();

        // 加载视图
        View::render('home', ["users" => $users]);
    }
}