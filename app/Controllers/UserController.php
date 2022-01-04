<?php

namespace App\Controllers;

use System\View;
use App\Models\User;

class UserController
{
    public function index()
    {
        $user = new User();
        $users = $user->all();

        View::render('user/index', ["users" => $users]);
    }
}
