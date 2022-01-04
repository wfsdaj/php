<?php

namespace App\Controllers;

use App\Models\User;
use System\View;
use System\Log;

class HomeController
{
    public function index()
    {
        $user = new User();
        $users = $user->all();

        $log = new Log();
        $log->alert('3');

        // 加载视图
        View::render('home', ["users" => $users]);
    }
}